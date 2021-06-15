<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _30_jo_model extends CI_Model
{

    public $table = 't30_jo';
    public $id = 'idjo';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($postData) {
        $this->datatables->select('idjo,NoJO,date_format(TglJO, "%d-%m-%Y") as TglJO,date_format(TglMB, "%d-%m-%Y") as TglMB,
            customer.Nama as customerNama, shipper.Nama as shipperNama, lokasi.Nama as lokasiNama');
        $this->datatables->from('t30_jo jo');
		if ($postData['idjo'] != '') { $this->datatables->like('idjo', $postData['idjo']); }
		if ($postData['NoJO'] != '') { $this->datatables->like('NoJO', $postData['NoJO']); }
		if ($postData['TglJO'] != '') { $this->datatables->like('date_format(TglJO, "%d-%m-%Y")', $postData['TglJO']); }
		if ($postData['idcustomer'] != '') { $this->datatables->like('customer.Nama', $postData['idcustomer']); }
		if ($postData['idshipper'] != '') { $this->datatables->like('shipper.Nama', $postData['idshipper']); }
		if ($postData['TglMB'] != '') { $this->datatables->like('date_format(TglMB, "%d-%m-%Y")', $postData['TglMB']); }
		if ($postData['idlokasi'] != '') { $this->datatables->like('lokasi.Nama', $postData['idlokasi']); }
        $this->datatables->join('t05_customer customer', 'jo.idcustomer = customer.idcustomer', 'left');
        $this->datatables->join('t06_shipper shipper', 'jo.idshipper = shipper.idshipper', 'left');
        $this->datatables->join('t12_lokasi lokasi', 'jo.idlokasi = lokasi.idlokasi', 'left');
        //add this line for join
        //$this->datatables->join('table2', 't30_jo.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('_30_jo/update/$1'),'Ubah')." | ".anchor(site_url('_30_jo/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'idjo');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idjo', $q);
		$this->db->or_like('NoJO', $q);
		$this->db->or_like('TglJO', $q);
		$this->db->or_like('idcustomer', $q);
		$this->db->or_like('idshipper', $q);
		$this->db->or_like('TglMB', $q);
		$this->db->or_like('idlokasi', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idjo', $q);
		$this->db->or_like('NoJO', $q);
		$this->db->or_like('TglJO', $q);
		$this->db->or_like('idcustomer', $q);
		$this->db->or_like('idshipper', $q);
		$this->db->or_like('TglMB', $q);
		$this->db->or_like('idlokasi', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        // if (
        //     $this->db
        //     ->limit(1)
        //     ->get_where($this->table, "idcsiswa = '" . $data['idcsiswa'] . "'")
        //     ->num_rows() === 0
        // ) {
        //     $this->db->insert($this->table, $data);
        // }
        // return ($this->db->trans_status()) ? $this->db->insert_id() : false;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function getNewJO($date = null)
    {
        if ($date != null) {
            // echo pre(dateMysql($date)); exit;
        }

        $sNextKode = "";
        $sLastKode = "";

        $prefix = $date != null ? substr($date, -2) . '.' . substr($date, 3, 2) . '.' : date('y.m.'); // date('ym');
        $sNextKode = $prefix . "00001";

        // echo pre($prefix); exit;

        $this->db->where('left(NoJO, 6) = ', $prefix);
        $this->db->order_by('NoJO', 'desc');
        $this->db->limit(1);
        $row = $this->db->get($this->table)->row();
        if ($row) {

            $value = $row->NoJO;

            if ($prefix == substr($value, 0, 6)) {
                /**
                 * masih pada bulan yang sama
                 */
                $sLastKode = intval(substr($value, 7, 5));
                $sLastKode = intval($sLastKode) + 1;
                $sNextKode = $prefix . sprintf('%05s', $sLastKode);
                if (strlen($sNextKode) > 11) {
                    $sNextKode = $prefix . "99999";
                }
            }
        }
        return $sNextKode;
    }

}

/* End of file _30_jo_model.php */
/* Location: ./application/models/_30_jo_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-06 19:14:01 */
/* http://harviacode.com */
