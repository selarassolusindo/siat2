<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _12_lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_12_lokasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_12_lokasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_12_lokasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_12_lokasi/index.html';
            $config['first_url'] = base_url() . '_12_lokasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_12_lokasi_model->total_rows($q);
        $_12_lokasi = $this->_12_lokasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_12_lokasi_data' => $_12_lokasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_12_lokasi/t12_lokasi_list', $data);
        $data['_view'] = '_12_lokasi/t12_lokasi_list';
        $data['_caption'] = 'Lokasi';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_12_lokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idlokasi' => $row->idlokasi,
		'Kode' => $row->Kode,
		'Nama' => $row->Nama,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            // $this->load->view('_12_lokasi/t12_lokasi_read', $data);
            $data['_view'] = '_12_lokasi/t12_lokasi_read';
            $data['_caption'] = 'Lokasi';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_12_lokasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_12_lokasi/create_action'),
	    'idlokasi' => set_value('idlokasi'),
	    'Kode' => set_value('Kode', getNewKode('LK', 'Kode', 't12_lokasi')),
	    'Nama' => set_value('Nama'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('_12_lokasi/t12_lokasi_form', $data);
        $data['_view'] = '_12_lokasi/t12_lokasi_form';
        $data['_caption'] = 'Lokasi';
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
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_12_lokasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_12_lokasi'));
        }
    }

    public function update($id)
    {
        $row = $this->_12_lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_12_lokasi/update_action'),
		'idlokasi' => set_value('idlokasi', $row->idlokasi),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('_12_lokasi/t12_lokasi_form', $data);
            $data['_view'] = '_12_lokasi/t12_lokasi_form';
            $data['_caption'] = 'Lokasi';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_12_lokasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idlokasi', TRUE));
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_12_lokasi_model->update($this->input->post('idlokasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_12_lokasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->_12_lokasi_model->get_by_id($id);

        if ($row) {
            $this->_12_lokasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_12_lokasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_12_lokasi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idlokasi', 'idlokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t12_lokasi.xls";
        $judul = "t12_lokasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_12_lokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
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
        header("Content-Disposition: attachment;Filename=t12_lokasi.doc");

        $data = array(
            't12_lokasi_data' => $this->_12_lokasi_model->get_all(),
            'start' => 0
        );

        $this->load->view('_12_lokasi/t12_lokasi_doc',$data);
    }

}

/* End of file _12_lokasi.php */
/* Location: ./application/controllers/_12_lokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-20 07:11:01 */
/* http://harviacode.com */
