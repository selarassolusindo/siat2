<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _13_satuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_13_satuan_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_13_satuan?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_13_satuan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_13_satuan';
            $config['first_url'] = base_url() . '_13_satuan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_13_satuan_model->total_rows($q);
        $_13_satuan = $this->_13_satuan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_13_satuan_data' => $_13_satuan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(14),
        );
        // $this->load->view('_13_satuan/t13_satuan_list', $data);
        $data['_view'] = '_13_satuan/t13_satuan_list';
        $data['_caption'] = 'Satuan';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_13_satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idsatuan' => $row->idsatuan,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
				'Tipe' => $row->Tipe,
			);
            $this->load->view('_13_satuan/t13_satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_13_satuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_13_satuan/create_action'),
			'idsatuan' => set_value('idsatuan'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
			'Tipe' => set_value('Tipe'),
		);
        // $this->load->view('_13_satuan/t13_satuan_form', $data);
        $data['_view'] = '_13_satuan/t13_satuan_form';
        $data['_caption'] = 'Satuan';
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
				'Tipe' => $this->input->post('Tipe',TRUE),
			);
            $this->_13_satuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_13_satuan'));
        }
    }

    public function update($id)
    {
        $row = $this->_13_satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_13_satuan/update_action'),
				'idsatuan' => set_value('idsatuan', $row->idsatuan),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
				'Tipe' => set_value('Tipe', $row->Tipe),
			);
            // $this->load->view('_13_satuan/t13_satuan_form', $data);
            $data['_view'] = '_13_satuan/t13_satuan_form';
            $data['_caption'] = 'Satuan';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_13_satuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsatuan', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'Tipe' => $this->input->post('Tipe',TRUE),
			);
            $this->_13_satuan_model->update($this->input->post('idsatuan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_13_satuan'));
        }
    }

    public function delete($id)
    {
        $row = $this->_13_satuan_model->get_by_id($id);

        if ($row) {
            $this->_13_satuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_13_satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_13_satuan'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('Tipe', 'tipe', 'trim|required');
		$this->form_validation->set_rules('idsatuan', 'idsatuan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t13_satuan.xls";
        $judul = "t13_satuan";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Tipe");
		foreach ($this->_13_satuan_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->Tipe);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t13_satuan.doc");
        $data = array(
            't13_satuan_data' => $this->_13_satuan_model->get_all(),
            'start' => 0
        );
        $this->load->view('_13_satuan/t13_satuan_doc',$data);
    }

}

/* End of file _13_satuan.php */
/* Location: ./application/controllers/_13_satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 01:38:21 */
/* http://harviacode.com */
