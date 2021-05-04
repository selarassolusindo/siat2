<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _09_sparepart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_09_sparepart_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_09_sparepart?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_09_sparepart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_09_sparepart';
            $config['first_url'] = base_url() . '_09_sparepart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_09_sparepart_model->total_rows($q);
        $_09_sparepart = $this->_09_sparepart_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_09_sparepart_data' => $_09_sparepart,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_09_sparepart/t09_sparepart_list', $data);
        $data['_view'] = '_09_sparepart/t09_sparepart_list';
        $data['_caption'] = 'Spare Part';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_09_sparepart_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idsparepart' => $row->idsparepart,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
				'Merk' => $row->Merk,
				'Tipe' => $row->Tipe,
			);
            $this->load->view('_09_sparepart/t09_sparepart_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_09_sparepart'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_09_sparepart/create_action'),
			'idsparepart' => set_value('idsparepart'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
			'Merk' => set_value('Merk'),
			'Tipe' => set_value('Tipe'),
		);
        // $this->load->view('_09_sparepart/t09_sparepart_form', $data);
        $data['_view'] = '_09_sparepart/t09_sparepart_form';
        $data['_caption'] = 'Spare Part';
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
				'Merk' => $this->input->post('Merk',TRUE),
				'Tipe' => $this->input->post('Tipe',TRUE),
			);
            $this->_09_sparepart_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_09_sparepart'));
        }
    }

    public function update($id)
    {
        $row = $this->_09_sparepart_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_09_sparepart/update_action'),
				'idsparepart' => set_value('idsparepart', $row->idsparepart),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
				'Merk' => set_value('Merk', $row->Merk),
				'Tipe' => set_value('Tipe', $row->Tipe),
			);
            // $this->load->view('_09_sparepart/t09_sparepart_form', $data);
            $data['_view'] = '_09_sparepart/t09_sparepart_form';
            $data['_caption'] = 'Spare Part';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_09_sparepart'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsparepart', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
				'Merk' => $this->input->post('Merk',TRUE),
				'Tipe' => $this->input->post('Tipe',TRUE),
			);
            $this->_09_sparepart_model->update($this->input->post('idsparepart', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_09_sparepart'));
        }
    }

    public function delete($id)
    {
        $row = $this->_09_sparepart_model->get_by_id($id);

        if ($row) {
            $this->_09_sparepart_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_09_sparepart'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_09_sparepart'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('Merk', 'merk', 'trim|required');
		$this->form_validation->set_rules('Tipe', 'tipe', 'trim|required');
		$this->form_validation->set_rules('idsparepart', 'idsparepart', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t09_sparepart.xls";
        $judul = "t09_sparepart";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Merk");
		xlsWriteLabel($tablehead, $kolomhead++, "Tipe");
		foreach ($this->_09_sparepart_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->Merk);
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
        header("Content-Disposition: attachment;Filename=t09_sparepart.doc");
        $data = array(
            't09_sparepart_data' => $this->_09_sparepart_model->get_all(),
            'start' => 0
        );
        $this->load->view('_09_sparepart/t09_sparepart_doc',$data);
    }

}

/* End of file _09_sparepart.php */
/* Location: ./application/controllers/_09_sparepart.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-04 18:37:34 */
/* http://harviacode.com */
