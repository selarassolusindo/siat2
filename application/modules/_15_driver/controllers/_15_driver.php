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
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_15_driver/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_15_driver/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_15_driver/index.html';
            $config['first_url'] = base_url() . '_15_driver/index.html';
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
		'HP' => $row->HP,
		'KTP' => $row->KTP,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            // $this->load->view('_15_driver/t15_driver_read', $data);
            $data['_view'] = '_15_driver/t15_driver_read';
            $data['_caption'] = 'Driver';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_15_driver'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_15_driver/create_action'),
	    'iddriver' => set_value('iddriver'),
	    'Kode' => set_value('Kode', getNewKode('DR', 'Kode', 't15_driver')),
	    'Nama' => set_value('Nama'),
	    'HP' => set_value('HP'),
	    'KTP' => set_value('KTP'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
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
		'HP' => $this->input->post('HP',TRUE),
		'KTP' => $this->input->post('KTP',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
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
                'button' => 'Update',
                'action' => site_url('_15_driver/update_action'),
		'iddriver' => set_value('iddriver', $row->iddriver),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		'HP' => set_value('HP', $row->HP),
		'KTP' => set_value('KTP', $row->KTP),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
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
		'HP' => $this->input->post('HP',TRUE),
		'KTP' => $this->input->post('KTP',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
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
	$this->form_validation->set_rules('HP', 'hp', 'trim|required');
	$this->form_validation->set_rules('KTP', 'ktp', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "HP");
	xlsWriteLabel($tablehead, $kolomhead++, "KTP");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_15_driver_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->HP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KTP);
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
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-20 12:56:49 */
/* http://harviacode.com */
