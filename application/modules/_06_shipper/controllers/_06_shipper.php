<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _06_shipper extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_06_shipper_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_06_shipper/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_06_shipper/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_06_shipper/index.html';
            $config['first_url'] = base_url() . '_06_shipper/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_06_shipper_model->total_rows($q);
        $_06_shipper = $this->_06_shipper_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_06_shipper_data' => $_06_shipper,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_06_shipper/t06_shipper_list', $data);
        $data['_view'] = '_06_shipper/t06_shipper_list';
        $data['_caption'] = 'Shipper';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_06_shipper_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idcustomer' => $row->idcustomer,
		'Kode' => $row->Kode,
		'Nama' => $row->Nama,
		'ContactPerson' => $row->ContactPerson,
		'Telepon' => $row->Telepon,
		'Alamat' => $row->Alamat,
		'Kota' => $row->Kota,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            // $this->load->view('_06_shipper/t06_shipper_read', $data);
            $data['_view'] = '_06_shipper/t06_shipper_read';
            $data['_caption'] = 'Shipper';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_06_shipper'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_06_shipper/create_action'),
	    'idcustomer' => set_value('idcustomer'),
	    'Kode' => set_value('Kode'),
	    'Nama' => set_value('Nama'),
	    'ContactPerson' => set_value('ContactPerson'),
	    'Telepon' => set_value('Telepon'),
	    'Alamat' => set_value('Alamat'),
	    'Kota' => set_value('Kota'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('_06_shipper/t06_shipper_form', $data);
        $data['_view'] = '_06_shipper/t06_shipper_form';
        $data['_caption'] = 'Shipper';
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
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_06_shipper_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_06_shipper'));
        }
    }

    public function update($id)
    {
        $row = $this->_06_shipper_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_06_shipper/update_action'),
		'idcustomer' => set_value('idcustomer', $row->idcustomer),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		'ContactPerson' => set_value('ContactPerson', $row->ContactPerson),
		'Telepon' => set_value('Telepon', $row->Telepon),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'Kota' => set_value('Kota', $row->Kota),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('_06_shipper/t06_shipper_form', $data);
            $data['_view'] = '_06_shipper/t06_shipper_form';
            $data['_caption'] = 'Shipper';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_06_shipper'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcustomer', TRUE));
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'ContactPerson' => $this->input->post('ContactPerson',TRUE),
		'Telepon' => $this->input->post('Telepon',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'Kota' => $this->input->post('Kota',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_06_shipper_model->update($this->input->post('idcustomer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_06_shipper'));
        }
    }

    public function delete($id)
    {
        $row = $this->_06_shipper_model->get_by_id($id);

        if ($row) {
            $this->_06_shipper_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_06_shipper'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_06_shipper'));
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
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idcustomer', 'idcustomer', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t06_shipper.xls";
        $judul = "t06_shipper";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_06_shipper_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ContactPerson);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kota);
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
        header("Content-Disposition: attachment;Filename=t06_shipper.doc");

        $data = array(
            't06_shipper_data' => $this->_06_shipper_model->get_all(),
            'start' => 0
        );

        $this->load->view('_06_shipper/t06_shipper_doc',$data);
    }

}

/* End of file _06_shipper.php */
/* Location: ./application/controllers/_06_shipper.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-17 19:37:34 */
/* http://harviacode.com */
