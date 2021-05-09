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
        $this->db->order_by($this->id, $this->order);
        $this->db->like('NoJO', $q);
		$this->db->or_like('TglJO', $q);
		$this->db->or_like('TglMB', $q);
        $this->db->or_like('customer.Nama', $q);
        $this->db->or_like('shipper.Nama', $q);
        $this->db->or_like('lokasi.Nama', $q);
        $this->db->or_like('armada.Merk', $q);
        $this->db->or_like('armada.NoPol', $q);
        $this->db->or_like('driver.Nama', $q);
		$this->db->select(
            $this->table.'.*,
            customer.Nama as NamaCustomer,
            shipper.Nama as NamaShipper,
            lokasi.Nama as NamaLokasi,
            concat(armada.Merk, \' - \', armada.NoPol) as NamaArmada,
            driver.Nama as NamaDriver
            '
        );
        $this->db->from($this->table);
        $this->db->join('t05_customer customer', 'customer.idcustomer = '.$this->table.'.idcustomer', 'left');
        $this->db->join('t06_shipper shipper', 'shipper.idshipper = '.$this->table.'.idshipper', 'left');
        $this->db->join('t12_lokasi lokasi', 'lokasi.idlokasi = '.$this->table.'.idlokasi', 'left');
        $this->db->join('t08_armada armada', 'armada.idarmada = '.$this->table.'.idarmada', 'left');
        $this->db->join('t15_driver driver', 'driver.iddriver = '.$this->table.'.iddriver', 'left');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('NoJO', $q);
		$this->db->or_like('TglJO', $q);
		$this->db->or_like('TglMB', $q);
        $this->db->or_like('customer.Nama', $q);
        $this->db->or_like('shipper.Nama', $q);
        $this->db->or_like('lokasi.Nama', $q);
        $this->db->or_like('armada.Merk', $q);
        $this->db->or_like('armada.NoPol', $q);
        $this->db->or_like('driver.Nama', $q);
		$this->db->select(
            $this->table.'.*,
            customer.Nama as NamaCustomer,
            shipper.Nama as NamaShipper,
            lokasi.Nama as NamaLokasi,
            concat(armada.Merk, \' - \', armada.NoPol) as NamaArmada,
            driver.Nama as NamaDriver
            '
        );
        $this->db->from($this->table);
        $this->db->join('t05_customer customer', 'customer.idcustomer = '.$this->table.'.idcustomer', 'left');
        $this->db->join('t06_shipper shipper', 'shipper.idshipper = '.$this->table.'.idshipper', 'left');
        $this->db->join('t12_lokasi lokasi', 'lokasi.idlokasi = '.$this->table.'.idlokasi', 'left');
        $this->db->join('t08_armada armada', 'armada.idarmada = '.$this->table.'.idarmada', 'left');
        $this->db->join('t15_driver driver', 'driver.iddriver = '.$this->table.'.iddriver', 'left');
		$this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

    /**
     * buat nomor jo baru
     * JO0001
     */
    function getNewJO()
    {
        $sNextKode = "";
        $sLastKode = "";

        $prefix = date('ym');
        $sNextKode = $prefix . "001";

        $this->db->order_by('NoJO', 'desc');
        $this->db->limit(1);
        $row = $this->db->get($this->table)->row();
        if ($row) {

            $value = $row->NoJO;

            if ($prefix == substr($value, 0, 4)) {
                /**
                 * masih pada bulan yang sama
                 */
                $sLastKode = intval(substr($value, 4, 3));
                $sLastKode = intval($sLastKode) + 1;
                $sNextKode = $prefix . sprintf('%03s', $sLastKode);
                if (strlen($sNextKode) > 7) {
                    $sNextKode = $prefix . "999";
                }
            }
        }
        return $sNextKode;
    }

    function getDataByIdCustomer($idcustomer)
    {
        $this->db->where('idcustomer', $idcustomer);
        return $this->db->get($this->table)->result();
    }

}

/* End of file _30_jo_model.php */
/* Location: ./application/models/_30_jo_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-05 14:38:06 */
/* http://harviacode.com */
