<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _35_jod extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_35_jod_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_35_jod?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_35_jod?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_35_jod';
            $config['first_url'] = base_url() . '_35_jod';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_35_jod_model->total_rows($q);
        $_35_jod = $this->_35_jod_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_35_jod_data' => $_35_jod,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_35_jod/t35_jod_list', $data);
    }

    public function read($id)
    {
        $row = $this->_35_jod_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idjod' => $row->idjod,
				'idjo' => $row->idjo,
				'idarmada' => $row->idarmada,
				'no_cont' => $row->no_cont,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('_35_jod/t35_jod_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_35_jod'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_35_jod/create_action'),
			'idjod' => set_value('idjod'),
			'idjo' => set_value('idjo'),
			'idarmada' => set_value('idarmada'),
			'no_cont' => set_value('no_cont'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
		);
        $this->load->view('_35_jod/t35_jod_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idjo' => $this->input->post('idjo',TRUE),
				'idarmada' => $this->input->post('idarmada',TRUE),
				'no_cont' => $this->input->post('no_cont',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_35_jod_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_35_jod'));
        }
    }

    public function update($id)
    {
        $row = $this->_35_jod_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_35_jod/update_action'),
				'idjod' => set_value('idjod', $row->idjod),
				'idjo' => set_value('idjo', $row->idjo),
				'idarmada' => set_value('idarmada', $row->idarmada),
				'no_cont' => set_value('no_cont', $row->no_cont),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
			);
            $this->load->view('_35_jod/t35_jod_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_35_jod'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idjod', TRUE));
        } else {
            $data = array(
				'idjo' => $this->input->post('idjo',TRUE),
				'idarmada' => $this->input->post('idarmada',TRUE),
				'no_cont' => $this->input->post('no_cont',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_35_jod_model->update($this->input->post('idjod', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_35_jod'));
        }
    }

    public function delete($id)
    {
        $row = $this->_35_jod_model->get_by_id($id);

        if ($row) {
            $this->_35_jod_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_35_jod'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_35_jod'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');
		$this->form_validation->set_rules('idarmada', 'idarmada', 'trim|required');
		$this->form_validation->set_rules('no_cont', 'no cont', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idjod', 'idjod', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t35_jod.xls";
        $judul = "t35_jod";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idjo");
		xlsWriteLabel($tablehead, $kolomhead++, "Idarmada");
		xlsWriteLabel($tablehead, $kolomhead++, "No Cont");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->_35_jod_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idjo);
			xlsWriteNumber($tablebody, $kolombody++, $data->idarmada);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_cont);
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
        header("Content-Disposition: attachment;Filename=t35_jod.doc");
        $data = array(
            't35_jod_data' => $this->_35_jod_model->get_all(),
            'start' => 0
        );
        $this->load->view('_35_jod/t35_jod_doc',$data);
    }

}

/* End of file _35_jod.php */
/* Location: ./application/controllers/_35_jod.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-05 17:46:12 */
/* http://harviacode.com */