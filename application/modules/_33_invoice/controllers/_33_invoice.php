<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _33_invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_33_invoice_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_33_invoice/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_33_invoice/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_33_invoice/index.html';
            $config['first_url'] = base_url() . '_33_invoice/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_33_invoice_model->total_rows($q);
        $_33_invoice = $this->_33_invoice_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_33_invoice_data' => $_33_invoice,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        $data['_view'] = '_33_invoice/t33_invoice_list';
        $data['_caption'] = 'Invoice';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_33_invoice_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idinvoice' => $row->idinvoice,
        		'NoInvoice' => $row->NoInvoice,
        		'TglInvoice' => $row->TglInvoice,
        		'idjo' => $row->idjo,
        		'Total' => $row->Total,
                'NoJO' => $row->NoJO,
                );

            /**
             * ambil data dari tabel detail
             */
            $data['detail'] =
                $this->db
                    ->select('t34_invoiced.*, Nama')
                    ->from('t34_invoiced')
                    ->where('idinvoice', $id)
                    ->join('t10_service', 't34_invoiced.idservice = t10_service.idservice')
                    ->get()->result()
                    ;

            $data['_view'] = '_33_invoice/t33_invoice_read';
            $data['_caption'] = 'Invoice';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice'));
        }
    }

    public function create()
    {
        $this->load->model('_30_jo/_30_jo_model');
        $jo = $this->_30_jo_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('_33_invoice/create_action'),
    	    'idinvoice' => set_value('idinvoice'),
    	    'NoInvoice' => set_value('NoInvoice', getNewInvoice('INV', 'NoInvoice', 't33_invoice')),
    	    'TglInvoice' => set_value('TglInvoice'),
    	    'idjo' => set_value('idjo'),
    	    'Total' => set_value('Total'),
            'jo_data' => $jo,
            );
        $data['_view'] = '_33_invoice/t33_invoice_form';
        $data['_caption'] = 'Invoice';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'NoInvoice' => $this->input->post('NoInvoice',TRUE),
                'TglInvoice' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('TglInvoice', true)))),
        		'idjo' => $this->input->post('idjo',TRUE),
        		'Total' => $this->input->post('Total',TRUE),
                );

            /**
             * simpan data ke tabel master
             */
            $this->_33_invoice_model->insert($data);

            /**
             * simpan id master terbaru
             */
            $insert_id = $this->db->insert_id();

            /**
             * simpan data ke tabel detail
             */
            $totalJumlah = 0;
            $data = $this->input->post();
            foreach ($data['idservice'] as $key => $item) {
                $detail = [
                    'idinvoice' => $insert_id,
                    'idservice' => $item,
                    'Jumlah' => $data['jumlah'][$key]
                    ];
                $totalJumlah += $data['jumlah'][$key];
                $this->db->insert('t34_invoiced', $detail);
            }

            /**
             * update total jumlah ke tabel master
             */
            $data = array(
        		'Total' => $totalJumlah
                );
            $this->_33_invoice_model->update($this->input->post('idinvoice', TRUE), $data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_33_invoice'));
        }
    }

    public function update($id)
    {
        $row = $this->_33_invoice_model->get_by_id($id);

        if ($row) {
            $this->load->model('_30_jo/_30_jo_model');
            $jo = $this->_30_jo_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('_33_invoice/update_action'),
        		'idinvoice' => set_value('idinvoice', $row->idinvoice),
        		'NoInvoice' => set_value('NoInvoice', $row->NoInvoice),
        		'TglInvoice' => set_value('TglInvoice', date_format(date_create($row->TglInvoice), 'd-m-Y')),
        		'idjo' => set_value('idjo', $row->idjo),
        		'Total' => set_value('Total', $row->Total),
                'jo_data' => $jo,
                );

            /**
             * ambil data dari tabel detail
             */
            $data['detail'] =
                $this->db
                    ->select('t34_invoiced.*, Nama')
                    ->from('t34_invoiced')
                    ->where('idinvoice', $id)
                    ->join('t10_service', 't34_invoiced.idservice = t10_service.idservice')
                    ->get()->result()
                    ;

            $data['_view'] = '_33_invoice/t33_invoice_form';
            $data['_caption'] = 'Invoice';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idinvoice', TRUE));
        } else {
            $data = array(
        		'NoInvoice' => $this->input->post('NoInvoice',TRUE),
                'TglInvoice' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('TglInvoice', true)))),
        		'idjo' => $this->input->post('idjo',TRUE),
        		'Total' => $this->input->post('Total',TRUE),
                );

            /**
             * update data di tabel master
             */
            $this->_33_invoice_model->update($this->input->post('idinvoice', TRUE), $data);

            /**
             * simpan id data yang akan diupdate dari tabel master
             */
            $id = $this->input->post('idinvoice', TRUE);

            /**
             * hapus dulu data lama di tabel detail
             */
            $this->db->where('idinvoice', $id);
			$this->db->delete('t34_invoiced');

            /**
             * simpan data di tabel detail
             */
            $totalJumlah = 0;
            $data = $this->input->post();
            foreach ($data['idservice'] as $key => $item) {
  				$detail = [
  					'idinvoice' => $id,
  					'idservice' => $item,
  					'Jumlah' => $data['jumlah'][$key]
                    ];
                $totalJumlah += $data['jumlah'][$key];
  				$this->db->insert('t34_invoiced',$detail);
  			}

            /**
             * update total jumlah ke tabel master
             */
            $data = array(
                'Total' => $totalJumlah
                );
            $this->_33_invoice_model->update($this->input->post('idinvoice', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_33_invoice'));
        }
    }

    public function delete($id)
    {
        $row = $this->_33_invoice_model->get_by_id($id);

        if ($row) {
            /**
             * hapus data di tabel master
             */
            $this->_33_invoice_model->delete($id);

            /**
             * hapus data di tabel detail
             */
            $this->db->where('idinvoice',$id);
     		$this->db->delete('t34_invoiced');

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_33_invoice'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('NoInvoice', 'noinvoice', 'trim|required');
    	$this->form_validation->set_rules('TglInvoice', 'tglinvoice', 'trim|required');
    	$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');
    	$this->form_validation->set_rules('Total', 'total', 'trim|required');
    	$this->form_validation->set_rules('idinvoice', 'idinvoice', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t33_invoice.xls";
        $judul = "t33_invoice";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "NoInvoice");
    	xlsWriteLabel($tablehead, $kolomhead++, "TglInvoice");
    	xlsWriteLabel($tablehead, $kolomhead++, "Idjo");
    	xlsWriteLabel($tablehead, $kolomhead++, "Total");
    	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
    	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

    	foreach ($this->_33_invoice_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->NoInvoice);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->TglInvoice);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->idjo);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->Total);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t33_invoice.doc");

        $data = array(
            't33_invoice_data' => $this->_33_invoice_model->get_all(),
            'start' => 0
        );

        $this->load->view('_33_invoice/t33_invoice_doc',$data);
    }

}

/* End of file _33_invoice.php */
/* Location: ./application/controllers/_33_invoice.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-28 19:45:29 */
/* http://harviacode.com */
