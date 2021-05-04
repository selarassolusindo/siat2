<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _07_vendor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_07_vendor_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_07_vendor?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_07_vendor?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_07_vendor';
            $config['first_url'] = base_url() . '_07_vendor';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_07_vendor_model->total_rows($q);
        $_07_vendor = $this->_07_vendor_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_07_vendor_data' => $_07_vendor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(7),
        );
        // $this->load->view('_07_vendor/t07_vendor_list', $data);
        $data['_view'] = '_07_vendor/t07_vendor_list';
        $data['_caption'] = 'Vendor';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_07_vendor_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idvendor' => $row->idvendor,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
				'ContactPerson' => $row->ContactPerson,
				'Telepon' => $row->Telepon,
				'Alamat' => $row->Alamat,
				'Kota' => $row->Kota,
			);
            $this->load->view('_07_vendor/t07_vendor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_07_vendor'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_07_vendor/create_action'),
			'idvendor' => set_value('idvendor'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
			'ContactPerson' => set_value('ContactPerson'),
			'Telepon' => set_value('Telepon'),
			'Alamat' => set_value('Alamat'),
			'Kota' => set_value('Kota'),
		);
        // $this->load->view('_07_vendor/t07_vendor_form', $data);
        $data['_view'] = '_07_vendor/t07_vendor_form';
        $data['_caption'] = 'Vendor';
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
				'ContactPerson' => $this->input->post('ContactPerson',TRUE),
				'Telepon' => $this->input->post('Telepon',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'Kota' => $this->input->post('Kota',TRUE),
			);
            $this->_07_vendor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_07_vendor'));
        }
    }

    public function update($id)
    {
        $row = $this->_07_vendor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_07_vendor/update_action'),
				'idvendor' => set_value('idvendor', $row->idvendor),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
				'ContactPerson' => set_value('ContactPerson', $row->ContactPerson),
				'Telepon' => set_value('Telepon', $row->Telepon),
				'Alamat' => set_value('Alamat', $row->Alamat),
				'Kota' => set_value('Kota', $row->Kota),
			);
            // $this->load->view('_07_vendor/t07_vendor_form', $data);
            $data['_view'] = '_07_vendor/t07_vendor_form';
            $data['_caption'] = 'Vendor';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_07_vendor'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idvendor', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'ContactPerson' => $this->input->post('ContactPerson',TRUE),
				'Telepon' => $this->input->post('Telepon',TRUE),
				'Alamat' => $this->input->post('Alamat',TRUE),
				'Kota' => $this->input->post('Kota',TRUE),
			);
            $this->_07_vendor_model->update($this->input->post('idvendor', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_07_vendor'));
        }
    }

    public function delete($id)
    {
        $row = $this->_07_vendor_model->get_by_id($id);

        if ($row) {
            $this->_07_vendor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_07_vendor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_07_vendor'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('ContactPerson', 'contactperson', 'trim|required');
		$this->form_validation->set_rules('Telepon', 'telepon', 'trim|required');
		$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('Kota', 'kota', 'trim|required');
		$this->form_validation->set_rules('idvendor', 'idvendor', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t07_vendor.xls";
        $judul = "t07_vendor";
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
		xlsWriteLabel($tablehead, $kolomhead++, "ContactPerson");
		xlsWriteLabel($tablehead, $kolomhead++, "Telepon");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota");
		foreach ($this->_07_vendor_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->ContactPerson);
			xlsWriteLabel($tablebody, $kolombody++, $data->Telepon);
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
        header("Content-Disposition: attachment;Filename=t07_vendor.doc");
        $data = array(
            't07_vendor_data' => $this->_07_vendor_model->get_all(),
            'start' => 0
        );
        $this->load->view('_07_vendor/t07_vendor_doc',$data);
    }

}

/* End of file _07_vendor.php */
/* Location: ./application/controllers/_07_vendor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-04 02:48:18 */
/* http://harviacode.com */
