<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _32_csheetd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_32_csheetd_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_32_csheetd?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_32_csheetd?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_32_csheetd';
            $config['first_url'] = base_url() . '_32_csheetd';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_32_csheetd_model->total_rows($q);
        $_32_csheetd = $this->_32_csheetd_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_32_csheetd_data' => $_32_csheetd,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_32_csheetd/t32_csheetd_list', $data);
    }

    public function read($id)
    {
        $row = $this->_32_csheetd_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcsheetd' => $row->idcsheetd,
				'idcsheet' => $row->idcsheet,
				'idcost' => $row->idcost,
				'Qty' => $row->Qty,
				'idsatuan' => $row->idsatuan,
				'Harga' => $row->Harga,
				'Jumlah' => $row->Jumlah,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('_32_csheetd/t32_csheetd_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_32_csheetd'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_32_csheetd/create_action'),
			'idcsheetd' => set_value('idcsheetd'),
			'idcsheet' => set_value('idcsheet'),
			'idcost' => set_value('idcost'),
			'Qty' => set_value('Qty'),
			'idsatuan' => set_value('idsatuan'),
			'Harga' => set_value('Harga'),
			'Jumlah' => set_value('Jumlah'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('_32_csheetd/t32_csheetd_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idcsheet' => $this->input->post('idcsheet',TRUE),
				'idcost' => $this->input->post('idcost',TRUE),
				'Qty' => $this->input->post('Qty',TRUE),
				'idsatuan' => $this->input->post('idsatuan',TRUE),
				'Harga' => $this->input->post('Harga',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_32_csheetd_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_32_csheetd'));
        }
    }

    public function update($id)
    {
        $row = $this->_32_csheetd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_32_csheetd/update_action'),
				'idcsheetd' => set_value('idcsheetd', $row->idcsheetd),
				'idcsheet' => set_value('idcsheet', $row->idcsheet),
				'idcost' => set_value('idcost', $row->idcost),
				'Qty' => set_value('Qty', $row->Qty),
				'idsatuan' => set_value('idsatuan', $row->idsatuan),
				'Harga' => set_value('Harga', $row->Harga),
				'Jumlah' => set_value('Jumlah', $row->Jumlah),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('_32_csheetd/t32_csheetd_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_32_csheetd'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcsheetd', TRUE));
        } else {
            $data = array(
				'idcsheet' => $this->input->post('idcsheet',TRUE),
				'idcost' => $this->input->post('idcost',TRUE),
				'Qty' => $this->input->post('Qty',TRUE),
				'idsatuan' => $this->input->post('idsatuan',TRUE),
				'Harga' => $this->input->post('Harga',TRUE),
				'Jumlah' => $this->input->post('Jumlah',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_32_csheetd_model->update($this->input->post('idcsheetd', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_32_csheetd'));
        }
    }

    public function delete($id)
    {
        $row = $this->_32_csheetd_model->get_by_id($id);

        if ($row) {
            $this->_32_csheetd_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_32_csheetd'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_32_csheetd'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idcsheet', 'idcsheet', 'trim|required');
		$this->form_validation->set_rules('idcost', 'idcost', 'trim|required');
		$this->form_validation->set_rules('Qty', 'qty', 'trim|required|numeric');
		$this->form_validation->set_rules('idsatuan', 'idsatuan', 'trim|required');
		$this->form_validation->set_rules('Harga', 'harga', 'trim|required|numeric');
		$this->form_validation->set_rules('Jumlah', 'jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idcsheetd', 'idcsheetd', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t32_csheetd.xls";
        $judul = "t32_csheetd";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idcsheet");
		xlsWriteLabel($tablehead, $kolomhead++, "Idcost");
		xlsWriteLabel($tablehead, $kolomhead++, "Qty");
		xlsWriteLabel($tablehead, $kolomhead++, "Idsatuan");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->_32_csheetd_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idcsheet);
			xlsWriteNumber($tablebody, $kolombody++, $data->idcost);
			xlsWriteNumber($tablebody, $kolombody++, $data->Qty);
			xlsWriteNumber($tablebody, $kolombody++, $data->idsatuan);
			xlsWriteNumber($tablebody, $kolombody++, $data->Harga);
			xlsWriteNumber($tablebody, $kolombody++, $data->Jumlah);
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
        header("Content-Disposition: attachment;Filename=t32_csheetd.doc");
        $data = array(
            't32_csheetd_data' => $this->_32_csheetd_model->get_all(),
            'start' => 0
        );
        $this->load->view('_32_csheetd/t32_csheetd_doc',$data);
    }

}

/* End of file _32_csheetd.php */
/* Location: ./application/controllers/_32_csheetd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-07 02:08:33 */
/* http://harviacode.com */