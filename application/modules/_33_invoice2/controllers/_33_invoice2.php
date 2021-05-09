<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _33_invoice2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_33_invoice2_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
        $this->load->model('_05_customer/_05_customer_model');
        $this->load->model('_30_jo/_30_jo_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_33_invoice2?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_33_invoice2?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_33_invoice2';
            $config['first_url'] = base_url() . '_33_invoice2';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_33_invoice2_model->total_rows($q);
        $_33_invoice2 = $this->_33_invoice2_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_33_invoice2_data' => $_33_invoice2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(22),
        );
        // $this->load->view('_33_invoice2/t33_invoice_list', $data);
        $data['_view'] = '_33_invoice2/t33_invoice_list';
        $data['_caption'] = 'Invoice';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_33_invoice2_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idinvoice' => $row->idinvoice,
				'NoInvoice' => $row->NoInvoice,
				'TglInvoice' => $row->TglInvoice,
				'idjo' => $row->idjo,
				'Total' => $row->Total,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('_33_invoice2/t33_invoice_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice2'));
        }
    }

    public function create($idcustomer, $idjo)
    {
        /**
         * ambil data customer untuk combo
         */
        $dataCustomer = $this->_05_customer_model->get_all();

        /**
         * ambil data JO untuk combo
         */
        $dataJO = $this->_30_jo_model->getDataByIdCustomer($idcustomer);
        $rowJO = $this->_30_jo_model->get_by_id($idjo);
        $noJO = "";
        if ($rowJO) {
            $noJO = $rowJO->NoJO;
        }

        /**
         * check data nomor invoice berdasarkan JO, apabila sudah pernah ada maka ditambahi kode setelah huruf A
         * apabila belum pernah ada invoice dengan JO yang terpilih maka diberi kode huruf A
         */
        $row = $this->_33_invoice2_model->getDataByIdJO($idjo);
        /**
         * $row akan menghasilkan data apabila sudah pernah ada data invoice dengan no jo terpilih
         * bila sudah pernah ada, maka nomor invoice adalah nomor JO ditambah B, begitu seterusnya
         * bila belum pernah ada, maka nomor invoice adalah nomor JO ditambah A
         */

        /**
         * menentukan kode suffix untuk nomor invoice
         */
        $nextSuffix = "A";
        if ($row) {
            $nextSuffix = chr(ord(substr($row->NoInvoice, -1)) + 1);
        }

        /**
         * last minute
         */
        $noInvoice = "";
        if ($noJO != "") {
            $noInvoice = $noJO . $nextSuffix;
        }

        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_33_invoice2/create_action'),
			'idinvoice' => set_value('idinvoice'),
			'NoInvoice' => set_value('NoInvoice', $noInvoice),
			'TglInvoice' => set_value('TglInvoice'),
			'idjo' => set_value('idjo', $idjo),
			'Total' => set_value('Total'),
			// 'created_at' => set_value('created_at'),
			// 'updated_at' => set_value('updated_at'),
            'dataCustomer' => $dataCustomer,
            'idcustomer' => $idcustomer,
            'dataJO' => $dataJO,
            'nextSuffix' => $nextSuffix,
		);
        // $this->load->view('_33_invoice2/t33_invoice_form', $data);
        $data['_view'] = '_33_invoice2/t33_invoice_form';
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
				'TglInvoice' => dateMysql($this->input->post('TglInvoice',TRUE)),
				'idjo' => $this->input->post('idjo',TRUE),
				'Total' => $this->input->post('Total',TRUE),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_33_invoice2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_33_invoice2'));
        }
    }

    public function update($id)
    {
        $row = $this->_33_invoice2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_33_invoice2/update_action'),
				'idinvoice' => set_value('idinvoice', $row->idinvoice),
				'NoInvoice' => set_value('NoInvoice', $row->NoInvoice),
				'TglInvoice' => set_value('TglInvoice', $row->TglInvoice),
				'idjo' => set_value('idjo', $row->idjo),
				'Total' => set_value('Total', $row->Total),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            // $this->load->view('_33_invoice2/t33_invoice_form', $data);
            $data['_view'] = '_33_invoice2/t33_invoice_form';
            $data['_caption'] = 'Invoice';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice2'));
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
				'TglInvoice' => $this->input->post('TglInvoice',TRUE),
				'idjo' => $this->input->post('idjo',TRUE),
				'Total' => $this->input->post('Total',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_33_invoice2_model->update($this->input->post('idinvoice', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_33_invoice2'));
        }
    }

    public function delete($id)
    {
        $row = $this->_33_invoice2_model->get_by_id($id);

        if ($row) {
            $this->_33_invoice2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_33_invoice2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_33_invoice2'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('NoInvoice', 'noinvoice', 'trim|required');
		$this->form_validation->set_rules('TglInvoice', 'tglinvoice', 'trim|required');
		$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');
		$this->form_validation->set_rules('Total', 'total', 'trim|required|numeric');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
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
		foreach ($this->_33_invoice2_model->get_all() as $data) {
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
            't33_invoice_data' => $this->_33_invoice2_model->get_all(),
            'start' => 0
        );
        $this->load->view('_33_invoice2/t33_invoice_doc',$data);
    }

}

/* End of file _33_invoice2.php */
/* Location: ./application/controllers/_33_invoice2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-09 23:45:49 */
/* http://harviacode.com */
