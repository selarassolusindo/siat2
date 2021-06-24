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
		$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('_31_csheet/t31_csheet_list');
    }

    public function json() {
        // POST data
        $postData = $this->input->post();
        header('Content-Type: application/json');
        echo $this->_31_csheet_model->json($postData);
    }

    public function read($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcsheet' => $row->idcsheet,
				'nocsheet' => $row->nocsheet,
				'tglcsheet' => $row->tglcsheet,
				'idjo' => $row->idjo,
				'totalcsheet' => $row->totalcsheet,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('_31_csheet/t31_csheet_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheet'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_31_csheet/create_action'),
			'idcsheet' => set_value('idcsheet'),
			'nocsheet' => set_value('nocsheet'),
			'tglcsheet' => set_value('tglcsheet'),
			'idjo' => set_value('idjo'),
			'totalcsheet' => set_value('totalcsheet'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('_31_csheet/t31_csheet_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nocsheet' => $this->input->post('nocsheet',TRUE),
				'tglcsheet' => $this->input->post('tglcsheet',TRUE),
				'idjo' => $this->input->post('idjo',TRUE),
				'totalcsheet' => $this->input->post('totalcsheet',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_31_csheet_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_31_csheet'));
        }
    }

    public function update($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_31_csheet/update_action'),
				'idcsheet' => set_value('idcsheet', $row->idcsheet),
				'nocsheet' => set_value('nocsheet', $row->nocsheet),
				'tglcsheet' => set_value('tglcsheet', $row->tglcsheet),
				'idjo' => set_value('idjo', $row->idjo),
				'totalcsheet' => set_value('totalcsheet', $row->totalcsheet),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('_31_csheet/t31_csheet_form', $data);
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
				'nocsheet' => $this->input->post('nocsheet',TRUE),
				'tglcsheet' => $this->input->post('tglcsheet',TRUE),
				'idjo' => $this->input->post('idjo',TRUE),
				'totalcsheet' => $this->input->post('totalcsheet',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_31_csheet_model->update($this->input->post('idcsheet', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_31_csheet'));
        }
    }

    public function delete($id)
    {
        $row = $this->_31_csheet_model->get_by_id($id);

        if ($row) {
            $this->_31_csheet_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_31_csheet'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheet'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('nocsheet', 'nocsheet', 'trim|required');
		$this->form_validation->set_rules('tglcsheet', 'tglcsheet', 'trim|required');
		$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');
		$this->form_validation->set_rules('totalcsheet', 'totalcsheet', 'trim|required|numeric');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nocsheet");
		xlsWriteLabel($tablehead, $kolomhead++, "Tglcsheet");
		xlsWriteLabel($tablehead, $kolomhead++, "Idjo");
		xlsWriteLabel($tablehead, $kolomhead++, "Totalcsheet");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->_31_csheet_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nocsheet);
			xlsWriteLabel($tablebody, $kolombody++, $data->tglcsheet);
			xlsWriteNumber($tablebody, $kolombody++, $data->idjo);
			xlsWriteNumber($tablebody, $kolombody++, $data->totalcsheet);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-25 02:27:57 */
/* http://harviacode.com */