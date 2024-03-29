<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _15_driver extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_15_driver_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_15_driver?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_15_driver?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_15_driver';
            $config['first_url'] = base_url() . '_15_driver';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_15_driver_model->total_rows($q);
        $_15_driver = $this->_15_driver_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_15_driver_data' => $_15_driver,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(16),
        );
        // $this->load->view('_15_driver/t15_driver_list', $data);
        $data['_view'] = '_15_driver/t15_driver_list';
        $data['_caption'] = 'Driver';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_15_driver_model->get_by_id($id);
        if ($row) {
            $data = array(
				'iddriver' => $row->iddriver,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
				'Alamat' => $row->Alamat,
				'HP' => $row->HP,
				'KTP' => $row->KTP,
			);
            $this->load->view('_15_driver/t15_driver_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_15_driver'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_15_driver/create_action'),
			'iddriver' => set_value('iddriver'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
			'Alamat' => set_value('Alamat'),
			'HP' => set_value('HP'),
			'KTP' => set_value('KTP'),
		);
        // $this->load->view('_15_driver/t15_driver_form', $data);
        $data['_view'] = '_15_driver/t15_driver_form';
        $data['_caption'] = 'Driver';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'HP' => $this->input->post('HP',TRUE),
				'KTP' => $this->input->post('KTP',TRUE),
			);
            $this->_15_driver_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_15_driver'));
        }
    }

    public function update($id)
    {
        $row = $this->_15_driver_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_15_driver/update_action'),
				'iddriver' => set_value('iddriver', $row->iddriver),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
				'Alamat' => set_value('Alamat', $row->Alamat),
				'HP' => set_value('HP', $row->HP),
				'KTP' => set_value('KTP', $row->KTP),
			);
            // $this->load->view('_15_driver/t15_driver_form', $data);
            $data['_view'] = '_15_driver/t15_driver_form';
            $data['_caption'] = 'Driver';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_15_driver'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('iddriver', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'HP' => $this->input->post('HP',TRUE),
				'KTP' => $this->input->post('KTP',TRUE),
			);
            $this->_15_driver_model->update($this->input->post('iddriver', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_15_driver'));
        }
    }

    public function delete($id)
    {
        $row = $this->_15_driver_model->get_by_id($id);

        if ($row) {
            $this->_15_driver_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_15_driver'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_15_driver'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('HP', 'hp', 'trim|required');
		$this->form_validation->set_rules('KTP', 'ktp', 'trim|required');
		$this->form_validation->set_rules('iddriver', 'iddriver', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t15_driver.xls";
        $judul = "t15_driver";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kode");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "HP");
		xlsWriteLabel($tablehead, $kolomhead++, "KTP");
		foreach ($this->_15_driver_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->Alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->HP);
			xlsWriteLabel($tablebody, $kolombody++, $data->KTP);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t15_driver.doc");
        $data = array(
            't15_driver_data' => $this->_15_driver_model->get_all(),
            'start' => 0
        );
        $this->load->view('_15_driver/t15_driver_doc',$data);
    }

}

/* End of file _15_driver.php */
/* Location: ./application/controllers/_15_driver.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 01:54:16 */
/* http://harviacode.com */
