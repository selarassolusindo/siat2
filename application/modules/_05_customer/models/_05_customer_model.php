<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _05_customer_model extends CI_Model
{

    public $table = 't05_customer';
    public $id = 'idcustomer';
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
        $this->db->like('idcustomer', $q);
		$this->db->or_like('Kode', $q);
		$this->db->or_like('Nama', $q);
		$this->db->or_like('ContactPerson', $q);
		$this->db->or_like('Telepon', $q);
		$this->db->or_like('Alamat', $q);
		$this->db->or_like('Kota', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idcustomer', $q);
		$this->db->or_like('Kode', $q);
		$this->db->or_like('Nama', $q);
		$this->db->or_like('ContactPerson', $q);
		$this->db->or_like('Telepon', $q);
		$this->db->or_like('Alamat', $q);
		$this->db->or_like('Kota', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

}

/* End of file _05_customer_model.php */
/* Location: ./application/models/_05_customer_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 22:20:29 */
/* http://harviacode.com */