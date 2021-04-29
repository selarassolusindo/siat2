<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _45_users_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_45_users_menus_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_45_users_menus?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_45_users_menus?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_45_users_menus';
            $config['first_url'] = base_url() . '_45_users_menus';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_45_users_menus_model->total_rows($q);
        $_45_users_menus = $this->_45_users_menus_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_45_users_menus_data' => $_45_users_menus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_45_users_menus/t45_users_menus_list', $data);
        $data['_view'] = '_45_users_menus/t45_users_menus_list';
        $data['_caption'] = 'Users - Menus';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_45_users_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idusersmenus' => $row->idusersmenus,
				'idusers' => $row->idusers,
				'idmenus' => $row->idmenus,
				'rights' => $row->rights,
			);
            $this->load->view('_45_users_menus/t45_users_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_users_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_45_users_menus/create_action'),
			'idusersmenus' => set_value('idusersmenus'),
			'idusers' => set_value('idusers'),
			'idmenus' => set_value('idmenus'),
			'rights' => set_value('rights'),
		);
        // $this->load->view('_45_users_menus/t45_users_menus_form', $data);
        $data['_view'] = '_45_users_menus/t45_users_menus_form';
        $data['_caption'] = 'Users - Menus';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idusers' => $this->input->post('idusers',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
			);
            $this->_45_users_menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_45_users_menus'));
        }
    }

    public function update_ori($id)
    {
        $row = $this->_45_users_menus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_45_users_menus/update_action'),
				'idusersmenus' => set_value('idusersmenus', $row->idusersmenus),
				'idusers' => set_value('idusers', $row->idusers),
				'idmenus' => set_value('idmenus', $row->idmenus),
				'rights' => set_value('rights', $row->rights),
			);
            // $this->load->view('_45_users_menus/t45_users_menus_form', $data);
            $data['_view'] = '_45_users_menus/t45_users_menus_form';
            $data['_caption'] = 'Users - Menus';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_users_menus'));
        }
    }

    public function update_action_ori()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idusersmenus', TRUE));
        } else {
            $data = array(
				'idusers' => $this->input->post('idusers',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
			);
            $this->_45_users_menus_model->update($this->input->post('idusersmenus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_45_users_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->_45_users_menus_model->get_by_id($id);

        if ($row) {
            $this->_45_users_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_45_users_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_users_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('idmenus', 'idmenus', 'trim|required');
		$this->form_validation->set_rules('rights', 'rights', 'trim|required');
		$this->form_validation->set_rules('idusersmenus', 'idusersmenus', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t45_users_menus.xls";
        $judul = "t45_users_menus";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Idmenus");
		xlsWriteLabel($tablehead, $kolomhead++, "Rights");
		foreach ($this->_45_users_menus_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idusers);
			xlsWriteNumber($tablebody, $kolombody++, $data->idmenus);
			xlsWriteNumber($tablebody, $kolombody++, $data->rights);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t45_users_menus.doc");
        $data = array(
            't45_users_menus_data' => $this->_45_users_menus_model->get_all(),
            'start' => 0
        );
        $this->load->view('_45_users_menus/t45_users_menus_doc',$data);
    }

    public function update($id)
    {
        // $row = $this->_45_users_menus_model->get_by_id($id);
        $dataUsers = $this->_45_users_menus_model->getAllById($id);

        if ($dataUsers) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_45_users_menus/update_action'),
				// 'idusersmenus' => set_value('idusersmenus', $row->idusersmenus),
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'idmenus' => set_value('idmenus', $row->idmenus),
				// 'rights' => set_value('rights', $row->rights),
                'dataUsers' => $dataUsers,
			);
            // $this->load->view('_45_users_menus/t45_users_menus_form', $data);
            $data['_view'] = '_45_users_menus/t45_users_menus_form';
            $data['_caption'] = 'Users - Hak Akses';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user-management'));
        }
    }

    public function update_action()
    {
        $data = $this->input->post();
        foreach($data['idusersmenus'] as $key => $value) {
            $idusersmenus = $value;
            $rights =
                $this->input->post('_1_'.$value, true)
                + $this->input->post('_2_'.$value, true)
                + $this->input->post('_4_'.$value, true);
            $detail = array(
                'rights' => $rights,
            );
            $this->_45_users_menus_model->update($value, $detail);
        }
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('user-management'));
    }

}

/* End of file _45_users_menus.php */
/* Location: ./application/controllers/_45_users_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-19 18:56:47 */
/* http://harviacode.com */
