<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _44_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_44_menus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_44_menus?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_44_menus?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_44_menus';
            $config['first_url'] = base_url() . '_44_menus';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_44_menus_model->total_rows($q);
        $_44_menus = $this->_44_menus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_44_menus_data' => $_44_menus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_44_menus/t44_menus_list', $data);
    }

    public function read($id)
    {
        $row = $this->_44_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idmenu' => $row->idmenu,
				'Menu' => $row->Menu,
			);
            $this->load->view('_44_menus/t44_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_44_menus/create_action'),
			'idmenu' => set_value('idmenu'),
			'Menu' => set_value('Menu'),
		);
        $this->load->view('_44_menus/t44_menus_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Menu' => $this->input->post('Menu',TRUE),
			);
            $this->_44_menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_44_menus'));
        }
    }

    public function update($id)
    {
        $row = $this->_44_menus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_44_menus/update_action'),
				'idmenu' => set_value('idmenu', $row->idmenu),
				'Menu' => set_value('Menu', $row->Menu),
			);
            $this->load->view('_44_menus/t44_menus_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_menus'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idmenu', TRUE));
        } else {
            $data = array(
				'Menu' => $this->input->post('Menu',TRUE),
			);
            $this->_44_menus_model->update($this->input->post('idmenu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_44_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->_44_menus_model->get_by_id($id);

        if ($row) {
            $this->_44_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_44_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Menu', 'menu', 'trim|required');
		$this->form_validation->set_rules('idmenu', 'idmenu', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t44_menus.xls";
        $judul = "t44_menus";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Menu");
		foreach ($this->_44_menus_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Menu);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t44_menus.doc");
        $data = array(
            't44_menus_data' => $this->_44_menus_model->get_all(),
            'start' => 0
        );
        $this->load->view('_44_menus/t44_menus_doc',$data);
    }

}

/* End of file _44_menus.php */
/* Location: ./application/controllers/_44_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-19 11:05:03 */
/* http://harviacode.com */