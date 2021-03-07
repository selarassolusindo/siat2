<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _31_csheet extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_31_csheet_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_31_csheet/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_31_csheet/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_31_csheet/index.html';
            $config['first_url'] = base_url() . '_31_csheet/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_31_csheet_model->total_rows($q);
        $_31_csheet = $this->_31_csheet_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_31_csheet_data' => $_31_csheet,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_31_csheet/t31_csheet_list', $data);
        $data['_view'] = '_31_csheet/t31_csheet_list';
        $data['_caption'] = 'Cost Sheet';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idcsheet' => $row->idcsheet,
		'NoCSheet' => $row->NoCSheet,
		'TglCSheet' => $row->TglCSheet,
		'idjo' => $row->idjo,
		'Total' => $row->Total,
        'NoJO' => $row->NoJO,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );

        /**
         * ambil data dari tabel detail
         */
        $data['detail'] =
            $this->db
                ->select('t32_csheetd.*, Nama')
                ->from('t32_csheetd')
                ->where('idcsheet', $id)
                ->join('t11_cost', 't32_csheetd.idcost = t11_cost.idcost')
                ->get()->result()
                ;

            // $this->load->view('_31_csheet/t31_csheet_read', $data);
            $data['_view'] = '_31_csheet/t31_csheet_read';
            $data['_caption'] = 'Cost Sheet';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheet'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_31_csheet/create_action'),
	    'idcsheet' => set_value('idcsheet'),
	    'NoCSheet' => set_value('NoCSheet'),
	    'TglCSheet' => set_value('TglCSheet'),
	    'idjo' => set_value('idjo'),
	    'Total' => set_value('Total'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('_31_csheet/t31_csheet_form', $data);
        $data['_view'] = '_31_csheet/t31_csheet_form';
        $data['_caption'] = 'Cost Sheet';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'NoCSheet' => $this->input->post('NoCSheet',TRUE),
        		'TglCSheet' => $this->input->post('TglCSheet',TRUE),
        		'idjo' => $this->input->post('idjo',TRUE),
        		'Total' => $this->input->post('Total',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
    	    );

            /**
             * simpan data ke tabel master
             */
            $this->_31_csheet_model->insert($data);

            /**
             * simpan id master terbaru
             */
            $insert_id = $this->db->insert_id();

            /**
             * simpan data ke tabel detail
             */
            $data = $this->input->post();
            foreach ($data['idcost'] as $key => $item) {
                $detail = [
                    'idcsheet' => $insert_id,
                    'idcost' => $item,
                    'Jumlah' => $data['jumlah'][$key]
                ];
                $this->db->insert('t32_csheetd', $detail);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_31_csheet'));
        }
    }

    public function update($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_31_csheet/update_action'),
        		'idcsheet' => set_value('idcsheet', $row->idcsheet),
        		'NoCSheet' => set_value('NoCSheet', $row->NoCSheet),
        		'TglCSheet' => set_value('TglCSheet', $row->TglCSheet),
        		'idjo' => set_value('idjo', $row->idjo),
        		'Total' => set_value('Total', $row->Total),
        		// 'created_at' => set_value('created_at', $row->created_at),
        		// 'updated_at' => set_value('updated_at', $row->updated_at),
            );

            /**
             * ambil data dari tabel detail
             */
            $data['detail'] =
                $this->db
                    ->select('t32_csheetd.*, Nama')
                    ->from('t32_csheetd')
                    ->where('idcsheet', $id)
                    ->join('t11_cost', 't32_csheetd.idcost = t11_cost.idcost')
                    ->get()->result()
                    ;
            // $this->load->view('_31_csheet/t31_csheet_form', $data);
            $data['_view'] = '_31_csheet/t31_csheet_form';
            $data['_caption'] = 'Cost Sheet';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheet'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcsheet', TRUE));
        } else {
            $data = array(
        		'NoCSheet' => $this->input->post('NoCSheet',TRUE),
        		'TglCSheet' => $this->input->post('TglCSheet',TRUE),
        		'idjo' => $this->input->post('idjo',TRUE),
        		'Total' => $this->input->post('Total',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
            );

            /**
             * update data di tabel master
             */
            $this->_31_csheet_model->update($this->input->post('idcsheet', TRUE), $data);

            /**
             * simpan id data yang akan diupdate dari tabel master
             */
            $id = $this->input->post('idcsheet', TRUE);

            /**
             * hapus dulu data lama di tabel detail
             */
            $this->db->where('idcsheet', $id);
			$this->db->delete('t32_csheetd');

            /**
             * simpan data di tabel detail
             */
             $data = $this->input->post();
             foreach ($data['idcost'] as $key => $item) {
  				$detail = [
  					'idcsheet' => $id,
  					'idcost' => $item,
  					'Jumlah' => $data['jumlah'][$key]
  				];
  				$this->db->insert('t32_csheetd',$detail);
  			}

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_31_csheet'));
        }
    }

    public function delete($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);

        if ($row) {
            /**
             * hapus data di tabel master
             */
            $this->_31_csheet_model->delete($id);

            /**
             * hapus data di tabel detail
             */
            $this->db->where('idcsheet',$id);
     		$this->db->delete('t32_csheetd');

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_31_csheet'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheet'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('NoCSheet', 'nocsheet', 'trim|required');
	$this->form_validation->set_rules('TglCSheet', 'tglcsheet', 'trim|required');
	$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');
	$this->form_validation->set_rules('Total', 'total', 'trim|required|numeric');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idcsheet', 'idcsheet', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t31_csheet.xls";
        $judul = "t31_csheet";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NoCSheet");
	xlsWriteLabel($tablehead, $kolomhead++, "TglCSheet");
	xlsWriteLabel($tablehead, $kolomhead++, "Idjo");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_31_csheet_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NoCSheet);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TglCSheet);
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
        header("Content-Disposition: attachment;Filename=t31_csheet.doc");

        $data = array(
            't31_csheet_data' => $this->_31_csheet_model->get_all(),
            'start' => 0
        );

        $this->load->view('_31_csheet/t31_csheet_doc',$data);
    }

}

/* End of file _31_csheet.php */
/* Location: ./application/controllers/_31_csheet.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-28 08:23:02 */
/* http://harviacode.com */
