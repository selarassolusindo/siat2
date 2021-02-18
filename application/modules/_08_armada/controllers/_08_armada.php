<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _08_armada extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_08_armada_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_08_armada/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_08_armada/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_08_armada/index.html';
            $config['first_url'] = base_url() . '_08_armada/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_08_armada_model->total_rows($q);
        $_08_armada = $this->_08_armada_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_08_armada_data' => $_08_armada,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_08_armada/t08_armada_list', $data);
        $data['_view'] = '_08_armada/t08_armada_list';
        $data['_caption'] = 'Armada';
        $this->load->view('_00_dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->_08_armada_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idarmada' => $row->idarmada,
		'Kode' => $row->Kode,
		'Merk' => $row->Merk,
		'Tipe' => $row->Tipe,
		'TahunPembuatan' => $row->TahunPembuatan,
		'Nopol' => $row->Nopol,
		'Norangka' => $row->Norangka,
		'Nomesin' => $row->Nomesin,
		'JatuhTempoPajak' => $row->JatuhTempoPajak,
		'JatuhTempoKir' => $row->JatuhTempoKir,
		'KodeEkor' => $row->KodeEkor,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            // $this->load->view('_08_armada/t08_armada_read', $data);
            $data['_view'] = '_08_armada/t08_armada_read';
            $data['_caption'] = 'Armada';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_08_armada'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_08_armada/create_action'),
	    'idarmada' => set_value('idarmada'),
	    'Kode' => set_value('Kode'),
	    'Merk' => set_value('Merk'),
	    'Tipe' => set_value('Tipe'),
	    'TahunPembuatan' => set_value('TahunPembuatan'),
	    'Nopol' => set_value('Nopol'),
	    'Norangka' => set_value('Norangka'),
	    'Nomesin' => set_value('Nomesin'),
	    'JatuhTempoPajak' => set_value('JatuhTempoPajak'),
	    'JatuhTempoKir' => set_value('JatuhTempoKir'),
	    'KodeEkor' => set_value('KodeEkor'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('_08_armada/t08_armada_form', $data);
        $data['_view'] = '_08_armada/t08_armada_form';
        $data['_caption'] = 'Armada';
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
		'Merk' => $this->input->post('Merk',TRUE),
		'Tipe' => $this->input->post('Tipe',TRUE),
		'TahunPembuatan' => $this->input->post('TahunPembuatan',TRUE),
		'Nopol' => $this->input->post('Nopol',TRUE),
		'Norangka' => $this->input->post('Norangka',TRUE),
		'Nomesin' => $this->input->post('Nomesin',TRUE),
		'JatuhTempoPajak' => $this->input->post('JatuhTempoPajak',TRUE),
		'JatuhTempoKir' => $this->input->post('JatuhTempoKir',TRUE),
		'KodeEkor' => $this->input->post('KodeEkor',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_08_armada_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_08_armada'));
        }
    }

    public function update($id)
    {
        $row = $this->_08_armada_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_08_armada/update_action'),
		'idarmada' => set_value('idarmada', $row->idarmada),
		'Kode' => set_value('Kode', $row->Kode),
		'Merk' => set_value('Merk', $row->Merk),
		'Tipe' => set_value('Tipe', $row->Tipe),
		'TahunPembuatan' => set_value('TahunPembuatan', $row->TahunPembuatan),
		'Nopol' => set_value('Nopol', $row->Nopol),
		'Norangka' => set_value('Norangka', $row->Norangka),
		'Nomesin' => set_value('Nomesin', $row->Nomesin),
		'JatuhTempoPajak' => set_value('JatuhTempoPajak', $row->JatuhTempoPajak),
		'JatuhTempoKir' => set_value('JatuhTempoKir', $row->JatuhTempoKir),
		'KodeEkor' => set_value('KodeEkor', $row->KodeEkor),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('_08_armada/t08_armada_form', $data);
            $data['_view'] = '_08_armada/t08_armada_form';
            $data['_caption'] = 'Armada';
            $this->load->view('_00_dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_08_armada'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idarmada', TRUE));
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Merk' => $this->input->post('Merk',TRUE),
		'Tipe' => $this->input->post('Tipe',TRUE),
		'TahunPembuatan' => $this->input->post('TahunPembuatan',TRUE),
		'Nopol' => $this->input->post('Nopol',TRUE),
		'Norangka' => $this->input->post('Norangka',TRUE),
		'Nomesin' => $this->input->post('Nomesin',TRUE),
		'JatuhTempoPajak' => $this->input->post('JatuhTempoPajak',TRUE),
		'JatuhTempoKir' => $this->input->post('JatuhTempoKir',TRUE),
		'KodeEkor' => $this->input->post('KodeEkor',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_08_armada_model->update($this->input->post('idarmada', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_08_armada'));
        }
    }

    public function delete($id)
    {
        $row = $this->_08_armada_model->get_by_id($id);

        if ($row) {
            $this->_08_armada_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_08_armada'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_08_armada'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('Tipe', 'tipe', 'trim|required');
	$this->form_validation->set_rules('TahunPembuatan', 'tahunpembuatan', 'trim|required');
	$this->form_validation->set_rules('Nopol', 'nopol', 'trim|required');
	$this->form_validation->set_rules('Norangka', 'norangka', 'trim|required');
	$this->form_validation->set_rules('Nomesin', 'nomesin', 'trim|required');
	$this->form_validation->set_rules('JatuhTempoPajak', 'jatuhtempopajak', 'trim|required');
	$this->form_validation->set_rules('JatuhTempoKir', 'jatuhtempokir', 'trim|required');
	$this->form_validation->set_rules('KodeEkor', 'kodeekor', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idarmada', 'idarmada', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t08_armada.xls";
        $judul = "t08_armada";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tipe");
	xlsWriteLabel($tablehead, $kolomhead++, "TahunPembuatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nopol");
	xlsWriteLabel($tablehead, $kolomhead++, "Norangka");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomesin");
	xlsWriteLabel($tablehead, $kolomhead++, "JatuhTempoPajak");
	xlsWriteLabel($tablehead, $kolomhead++, "JatuhTempoKir");
	xlsWriteLabel($tablehead, $kolomhead++, "KodeEkor");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_08_armada_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tipe);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TahunPembuatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nopol);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Norangka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nomesin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JatuhTempoPajak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JatuhTempoKir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KodeEkor);
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
        header("Content-Disposition: attachment;Filename=t08_armada.doc");

        $data = array(
            't08_armada_data' => $this->_08_armada_model->get_all(),
            'start' => 0
        );

        $this->load->view('_08_armada/t08_armada_doc',$data);
    }

}

/* End of file _08_armada.php */
/* Location: ./application/controllers/_08_armada.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-18 22:13:06 */
/* http://harviacode.com */
