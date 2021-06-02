<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _30_jo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_30_jo_model');
        $this->load->library('form_validation');
        $this->load->model('_45_users_menus/_45_users_menus_model');
        $this->load->model('_05_customer/_05_customer_model');
        $this->load->model('_06_shipper/_06_shipper_model');
        $this->load->model('_12_lokasi/_12_lokasi_model');
        $this->load->model('_08_armada/_08_armada_model');
        $this->load->model('_15_driver/_15_driver_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_30_jo?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_30_jo?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_30_jo';
            $config['first_url'] = base_url() . '_30_jo';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_30_jo_model->total_rows($q);
        $_30_jo = $this->_30_jo_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_30_jo_data' => $_30_jo,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'hakAkses' => $this->_45_users_menus_model->getHakAkses(20),
        );
        // $this->load->view('_30_jo/t30_jo_list', $data);
        $data['_view'] = '_30_jo/t30_jo_list';
        $data['_caption'] = 'Job Order';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_30_jo_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idjo' => $row->idjo,
				'NoJO' => $row->NoJO,
				'TglJO' => $row->TglJO,
				'idcustomer' => $row->idcustomer,
				'idshipper' => $row->idshipper,
				'TglMB' => $row->TglMB,
				'idlokasi' => $row->idlokasi,
				'idarmada' => $row->idarmada,
				'iddriver' => $row->iddriver,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
			);
            $this->load->view('_30_jo/t30_jo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_30_jo'));
        }
    }

    public function create($tgl = null)
    {
        $dataCustomer = $this->_05_customer_model->get_all();
        $dataShipper = $this->_06_shipper_model->get_all();
        $dataLokasi = $this->_12_lokasi_model->get_all();
        $dataArmada = $this->_08_armada_model->get_all();
        $dataDriver = $this->_15_driver_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('_30_jo/create_action'),
			'idjo' => set_value('idjo'),
			'NoJO' => set_value('NoJO', $this->_30_jo_model->getNewJO($tgl)),
			'TglJO' => set_value('TglJO', date('d-m-Y')),
			'idcustomer' => set_value('idcustomer'),
			'idshipper' => set_value('idshipper'),
			'TglMB' => set_value('TglMB', date('d-m-Y')),
			'idlokasi' => set_value('idlokasi'),
			'idarmada' => set_value('idarmada'),
			'iddriver' => set_value('iddriver'),
			'created_at' => set_value('created_at'),
			'updated_at' => set_value('updated_at'),
            'dataCustomer' => $dataCustomer,
            'dataShipper' => $dataShipper,
            'dataLokasi' => $dataLokasi,
            'dataArmada' => $dataArmada,
            'dataDriver' => $dataDriver,
		);
        // $this->load->view('_30_jo/t30_jo_form', $data);
        $data['_view'] = '_30_jo/t30_jo_form';
        $data['_caption'] = 'Job Order';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'NoJO' => $this->input->post('NoJO',TRUE),
				'TglJO' => dateMysql($this->input->post('TglJO',TRUE)),
				'idcustomer' => $this->input->post('idcustomer',TRUE),
				'idshipper' => $this->input->post('idshipper',TRUE),
				'TglMB' => dateMysql($this->input->post('TglMB',TRUE)),
				'idlokasi' => $this->input->post('idlokasi',TRUE),
				'idarmada' => $this->input->post('idarmada',TRUE),
				'iddriver' => $this->input->post('iddriver',TRUE),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_30_jo_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_30_jo'));
        }
    }

    public function update($id)
    {
        $row = $this->_30_jo_model->get_by_id($id);

        if ($row) {
            $dataCustomer = $this->_05_customer_model->get_all();
            $dataShipper = $this->_06_shipper_model->get_all();
            $dataLokasi = $this->_12_lokasi_model->get_all();
            $dataArmada = $this->_08_armada_model->get_all();
            $dataDriver = $this->_15_driver_model->get_all();
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('_30_jo/update_action'),
				'idjo' => set_value('idjo', $row->idjo),
				'NoJO' => set_value('NoJO', $row->NoJO),
				'TglJO' => set_value('TglJO', dateIndo($row->TglJO)),
				'idcustomer' => set_value('idcustomer', $row->idcustomer),
				'idshipper' => set_value('idshipper', $row->idshipper),
				'TglMB' => set_value('TglMB', dateIndo($row->TglMB)),
				'idlokasi' => set_value('idlokasi', $row->idlokasi),
				'idarmada' => set_value('idarmada', $row->idarmada),
				'iddriver' => set_value('iddriver', $row->iddriver),
				// 'created_at' => set_value('created_at', $row->created_at),
				// 'updated_at' => set_value('updated_at', $row->updated_at),
                'dataCustomer' => $dataCustomer,
                'dataShipper' => $dataShipper,
                'dataLokasi' => $dataLokasi,
                'dataArmada' => $dataArmada,
                'dataDriver' => $dataDriver,
			);
            // $this->load->view('_30_jo/t30_jo_form', $data);
            $data['_view'] = '_30_jo/t30_jo_form';
            $data['_caption'] = 'Job Order';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_30_jo'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idjo', TRUE));
        } else {
            $data = array(
				'NoJO' => $this->input->post('NoJO',TRUE),
				'TglJO' => dateMysql($this->input->post('TglJO',TRUE)),
				'idcustomer' => $this->input->post('idcustomer',TRUE),
				'idshipper' => $this->input->post('idshipper',TRUE),
				'TglMB' => dateMysql($this->input->post('TglMB',TRUE)),
				'idlokasi' => $this->input->post('idlokasi',TRUE),
				'idarmada' => $this->input->post('idarmada',TRUE),
				'iddriver' => $this->input->post('iddriver',TRUE),
				// 'created_at' => $this->input->post('created_at',TRUE),
				// 'updated_at' => $this->input->post('updated_at',TRUE),
			);
            $this->_30_jo_model->update($this->input->post('idjo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_30_jo'));
        }
    }

    public function delete($id)
    {
        $row = $this->_30_jo_model->get_by_id($id);

        if ($row) {
            $this->_30_jo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_30_jo'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_30_jo'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('NoJO', 'nojo', 'trim|required');
		$this->form_validation->set_rules('TglJO', 'tgljo', 'trim|required');
		$this->form_validation->set_rules('idcustomer', 'idcustomer', 'trim|required');
		$this->form_validation->set_rules('idshipper', 'idshipper', 'trim|required');
		$this->form_validation->set_rules('TglMB', 'tglmb', 'trim|required');
		$this->form_validation->set_rules('idlokasi', 'idlokasi', 'trim|required');
		$this->form_validation->set_rules('idarmada', 'idarmada', 'trim|required');
		$this->form_validation->set_rules('iddriver', 'iddriver', 'trim|required');
		// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('idjo', 'idjo', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t30_jo.xls";
        $judul = "t30_jo";
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
		xlsWriteLabel($tablehead, $kolomhead++, "NoJO");
		xlsWriteLabel($tablehead, $kolomhead++, "TglJO");
		xlsWriteLabel($tablehead, $kolomhead++, "Idcustomer");
		xlsWriteLabel($tablehead, $kolomhead++, "Idshipper");
		xlsWriteLabel($tablehead, $kolomhead++, "TglMB");
		xlsWriteLabel($tablehead, $kolomhead++, "Idlokasi");
		xlsWriteLabel($tablehead, $kolomhead++, "Idarmada");
		xlsWriteLabel($tablehead, $kolomhead++, "Iddriver");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		foreach ($this->_30_jo_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->NoJO);
			xlsWriteLabel($tablebody, $kolombody++, $data->TglJO);
			xlsWriteNumber($tablebody, $kolombody++, $data->idcustomer);
			xlsWriteNumber($tablebody, $kolombody++, $data->idshipper);
			xlsWriteLabel($tablebody, $kolombody++, $data->TglMB);
			xlsWriteNumber($tablebody, $kolombody++, $data->idlokasi);
			xlsWriteNumber($tablebody, $kolombody++, $data->idarmada);
			xlsWriteNumber($tablebody, $kolombody++, $data->iddriver);
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
        header("Content-Disposition: attachment;Filename=t30_jo.doc");
        $data = array(
            't30_jo_data' => $this->_30_jo_model->get_all(),
            'start' => 0
        );
        $this->load->view('_30_jo/t30_jo_doc',$data);
    }

}

/* End of file _30_jo.php */
/* Location: ./application/controllers/_30_jo.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-05 14:38:06 */
/* http://harviacode.com */
