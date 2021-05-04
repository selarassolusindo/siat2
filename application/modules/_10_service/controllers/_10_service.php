<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _10_service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_10_service_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_10_service?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_10_service?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_10_service';
            $config['first_url'] = base_url() . '_10_service';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_10_service_model->total_rows($q);
        $_10_service = $this->_10_service_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_10_service_data' => $_10_service,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(11),
        );
        // $this->load->view('_10_service/t10_service_list', $data);
        $data['_view'] = '_10_service/t10_service_list';
        $data['_caption'] = 'Service';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_10_service_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idservice' => $row->idservice,
				'Kode' => $row->Kode,
				'Nama' => $row->Nama,
			);
            $this->load->view('_10_service/t10_service_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_10_service'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_10_service/create_action'),
			'idservice' => set_value('idservice'),
			'Kode' => set_value('Kode'),
			'Nama' => set_value('Nama'),
		);
        // $this->load->view('_10_service/t10_service_form', $data);
        $data['_view'] = '_10_service/t10_service_form';
        $data['_caption'] = 'Service';
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
			);
            $this->_10_service_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_10_service'));
        }
    }

    public function update($id)
    {
        $row = $this->_10_service_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_10_service/update_action'),
				'idservice' => set_value('idservice', $row->idservice),
				'Kode' => set_value('Kode', $row->Kode),
				'Nama' => set_value('Nama', $row->Nama),
			);
            // $this->load->view('_10_service/t10_service_form', $data);
            $data['_view'] = '_10_service/t10_service_form';
            $data['_caption'] = 'Service';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_10_service'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idservice', TRUE));
        } else {
            $data = array(
				'Kode' => $this->input->post('Kode',TRUE),
				'Nama' => $this->input->post('Nama',TRUE),
			);
            $this->_10_service_model->update($this->input->post('idservice', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_10_service'));
        }
    }

    public function delete($id)
    {
        $row = $this->_10_service_model->get_by_id($id);

        if ($row) {
            $this->_10_service_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_10_service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_10_service'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('idservice', 'idservice', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t10_service.xls";
        $judul = "t10_service";
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
		foreach ($this->_10_service_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t10_service.doc");
        $data = array(
            't10_service_data' => $this->_10_service_model->get_all(),
            'start' => 0
        );
        $this->load->view('_10_service/t10_service_doc',$data);
    }

}

/* End of file _10_service.php */
/* Location: ./application/controllers/_10_service.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-04 19:07:35 */
/* http://harviacode.com */
