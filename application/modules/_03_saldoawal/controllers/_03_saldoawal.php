<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _03_saldoawal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_03_saldoawal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_03_saldoawal/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_03_saldoawal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_03_saldoawal/index.html';
            $config['first_url'] = base_url() . '_03_saldoawal/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_03_saldoawal_model->total_rows($q);
        $_03_saldoawal = $this->_03_saldoawal_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_03_saldoawal_data' => $_03_saldoawal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_03_saldoawal/t03_saldoawal_list', $data);
        $data['_view'] = '_03_saldoawal/t03_saldoawal_list';
        $data['_caption'] = 'Saldo Awal';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_03_saldoawal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idsa' => $row->idsa,
		'idakun' => $row->idakun,
		'Debit' => $row->Debit,
		'Kredit' => $row->Kredit,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            // $this->load->view('_03_saldoawal/t03_saldoawal_read', $data);
            $data['_view'] = '_03_saldoawal/t03_saldoawal_read';
            $data['_caption'] = 'Saldo Awal';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_03_saldoawal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_03_saldoawal/create_action'),
	    'idsa' => set_value('idsa'),
	    'idakun' => set_value('idakun'),
	    'Debit' => set_value('Debit'),
	    'Kredit' => set_value('Kredit'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('_03_saldoawal/t03_saldoawal_form', $data);
        $data['_view'] = '_03_saldoawal/t03_saldoawal_form';
        $data['_caption'] = 'Saldo Awal';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idakun' => $this->input->post('idakun',TRUE),
		'Debit' => $this->input->post('Debit',TRUE),
		'Kredit' => $this->input->post('Kredit',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_03_saldoawal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_03_saldoawal'));
        }
    }

    public function update($id)
    {
        $row = $this->_03_saldoawal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_03_saldoawal/update_action'),
		'idsa' => set_value('idsa', $row->idsa),
		'idakun' => set_value('idakun', $row->idakun),
		'Debit' => set_value('Debit', $row->Debit),
		'Kredit' => set_value('Kredit', $row->Kredit),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('_03_saldoawal/t03_saldoawal_form', $data);
            $data['_view'] = '_03_saldoawal/t03_saldoawal_form';
            $data['_caption'] = 'Saldo Awal';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_03_saldoawal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsa', TRUE));
        } else {
            $data = array(
		'idakun' => $this->input->post('idakun',TRUE),
		'Debit' => $this->input->post('Debit',TRUE),
		'Kredit' => $this->input->post('Kredit',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_03_saldoawal_model->update($this->input->post('idsa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_03_saldoawal'));
        }
    }

    public function delete($id)
    {
        $row = $this->_03_saldoawal_model->get_by_id($id);

        if ($row) {
            $this->_03_saldoawal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_03_saldoawal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_03_saldoawal'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('Debit', 'debit', 'trim|required|numeric');
	$this->form_validation->set_rules('Kredit', 'kredit', 'trim|required|numeric');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idsa', 'idsa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t03_saldoawal.xls";
        $judul = "t03_saldoawal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idakun");
	xlsWriteLabel($tablehead, $kolomhead++, "Debit");
	xlsWriteLabel($tablehead, $kolomhead++, "Kredit");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_03_saldoawal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Debit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Kredit);
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
        header("Content-Disposition: attachment;Filename=t03_saldoawal.doc");

        $data = array(
            't03_saldoawal_data' => $this->_03_saldoawal_model->get_all(),
            'start' => 0
        );

        $this->load->view('_03_saldoawal/t03_saldoawal_doc',$data);
    }

}

/* End of file _03_saldoawal.php */
/* Location: ./application/controllers/_03_saldoawal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-17 15:34:03 */
/* http://harviacode.com */
