<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _01_company extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_01_company_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_01_company?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_01_company?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_01_company';
            $config['first_url'] = base_url() . '_01_company';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_01_company_model->total_rows($q);
        $_01_company = $this->_01_company_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_01_company_data' => $_01_company,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_01_company/t01_company_list', $data);
        $data['_view'] = '_01_company/t01_company_list';
        $data['_caption'] = 'Company';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_01_company_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcompany' => $row->idcompany,
				'Nama' => $row->Nama,
				'Alamat' => $row->Alamat,
				'Kota' => $row->Kota,
			);
            $this->load->view('_01_company/t01_company_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_01_company'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_01_company/create_action'),
			'idcompany' => set_value('idcompany'),
			'Nama' => set_value('Nama'),
			'Alamat' => set_value('Alamat'),
			'Kota' => set_value('Kota'),
		);
        // $this->load->view('_01_company/t01_company_form', $data);
        $data['_view'] = '_01_company/t01_company_form';
        $data['_caption'] = 'Company';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Nama' => $this->input->post('Nama',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'Kota' => $this->input->post('Kota',TRUE),
			);
            $this->_01_company_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_01_company'));
        }
    }

    public function update($id)
    {
        $row = $this->_01_company_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_01_company/update_action'),
				'idcompany' => set_value('idcompany', $row->idcompany),
				'Nama' => set_value('Nama', $row->Nama),
				'Alamat' => set_value('Alamat', $row->Alamat),
				'Kota' => set_value('Kota', $row->Kota),
			);
            // $this->load->view('_01_company/t01_company_form', $data);
            $data['_view'] = '_01_company/t01_company_form';
            $data['_caption'] = 'Company';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_01_company'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcompany', TRUE));
        } else {
            $data = array(
				'Nama' => $this->input->post('Nama',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'Kota' => $this->input->post('Kota',TRUE),
			);
            $this->_01_company_model->update($this->input->post('idcompany', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_01_company'));
        }
    }

    public function delete($id)
    {
        $row = $this->_01_company_model->get_by_id($id);

        if ($row) {
            $this->_01_company_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_01_company'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_01_company'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('Kota', 'kota', 'trim|required');
		$this->form_validation->set_rules('idcompany', 'idcompany', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t01_company.xls";
        $judul = "t01_company";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota");
		foreach ($this->_01_company_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->Alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kota);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t01_company.doc");
        $data = array(
            't01_company_data' => $this->_01_company_model->get_all(),
            'start' => 0
        );
        $this->load->view('_01_company/t01_company_doc',$data);
    }

}

/* End of file _01_company.php */
/* Location: ./application/controllers/_01_company.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 04:15:45 */
/* http://harviacode.com */
