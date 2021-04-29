<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _14_bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_14_bank_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_14_bank?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_14_bank?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_14_bank';
            $config['first_url'] = base_url() . '_14_bank';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_14_bank_model->total_rows($q);
        $_14_bank = $this->_14_bank_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_14_bank_data' => $_14_bank,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(15),
        );
        // $this->load->view('_14_bank/t14_bank_list', $data);
        $data['_view'] = '_14_bank/t14_bank_list';
        $data['_caption'] = 'Bank';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_14_bank_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idbank' => $row->idbank,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
				'NamaRekening' => $row->NamaRekening,
				'Cabang' => $row->Cabang,
				'NomorRekening' => $row->NomorRekening,
				'JenisRekening' => $row->JenisRekening,
			);
            $this->load->view('_14_bank/t14_bank_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_14_bank'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_14_bank/create_action'),
			'idbank' => set_value('idbank'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
			'NamaRekening' => set_value('NamaRekening'),
			'Cabang' => set_value('Cabang'),
			'NomorRekening' => set_value('NomorRekening'),
			'JenisRekening' => set_value('JenisRekening'),
		);
        // $this->load->view('_14_bank/t14_bank_form', $data);
        $data['_view'] = '_14_bank/t14_bank_form';
        $data['_caption'] = 'Bank';
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
				'NamaRekening' => $this->input->post('NamaRekening',TRUE),
				'Cabang' => $this->input->post('Cabang',TRUE),
				'NomorRekening' => $this->input->post('NomorRekening',TRUE),
				'JenisRekening' => $this->input->post('JenisRekening',TRUE),
			);
            $this->_14_bank_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_14_bank'));
        }
    }

    public function update($id)
    {
        $row = $this->_14_bank_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_14_bank/update_action'),
				'idbank' => set_value('idbank', $row->idbank),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
				'NamaRekening' => set_value('NamaRekening', $row->NamaRekening),
				'Cabang' => set_value('Cabang', $row->Cabang),
				'NomorRekening' => set_value('NomorRekening', $row->NomorRekening),
				'JenisRekening' => set_value('JenisRekening', $row->JenisRekening),
			);
            // $this->load->view('_14_bank/t14_bank_form', $data);
            $data['_view'] = '_14_bank/t14_bank_form';
            $data['_caption'] = 'Bank';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_14_bank'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbank', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'NamaRekening' => $this->input->post('NamaRekening',TRUE),
				'Cabang' => $this->input->post('Cabang',TRUE),
				'NomorRekening' => $this->input->post('NomorRekening',TRUE),
				'JenisRekening' => $this->input->post('JenisRekening',TRUE),
			);
            $this->_14_bank_model->update($this->input->post('idbank', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_14_bank'));
        }
    }

    public function delete($id)
    {
        $row = $this->_14_bank_model->get_by_id($id);

        if ($row) {
            $this->_14_bank_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_14_bank'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_14_bank'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('NamaRekening', 'namarekening', 'trim|required');
		$this->form_validation->set_rules('Cabang', 'cabang', 'trim|required');
		$this->form_validation->set_rules('NomorRekening', 'nomorrekening', 'trim|required');
		$this->form_validation->set_rules('JenisRekening', 'jenisrekening', 'trim|required');
		$this->form_validation->set_rules('idbank', 'idbank', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t14_bank.xls";
        $judul = "t14_bank";
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
		xlsWriteLabel($tablehead, $kolomhead++, "NamaRekening");
		xlsWriteLabel($tablehead, $kolomhead++, "Cabang");
		xlsWriteLabel($tablehead, $kolomhead++, "NomorRekening");
		xlsWriteLabel($tablehead, $kolomhead++, "JenisRekening");
		foreach ($this->_14_bank_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->NamaRekening);
			xlsWriteLabel($tablebody, $kolombody++, $data->Cabang);
			xlsWriteLabel($tablebody, $kolombody++, $data->NomorRekening);
			xlsWriteLabel($tablebody, $kolombody++, $data->JenisRekening);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t14_bank.doc");
        $data = array(
            't14_bank_data' => $this->_14_bank_model->get_all(),
            'start' => 0
        );
        $this->load->view('_14_bank/t14_bank_doc',$data);
    }

}

/* End of file _14_bank.php */
/* Location: ./application/controllers/_14_bank.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 02:13:46 */
/* http://harviacode.com */
