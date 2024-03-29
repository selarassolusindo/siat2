<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _14_bank_model extends CI_Model
{

    public $table = 't14_bank';
    public $id = 'idbank';
    public $order = 'ASC';
    public $join = 't02_akun';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->select($this->table.'.*');
        $this->db->select($this->join.'.Nama as NamaAkun');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->join . '.idakun = ' . $this->table . '.Akun', 'left');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->select($this->table.'.*');
        $this->db->select($this->join.'.Nama as NamaAkun');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->join . '.idakun = ' . $this->table . '.Akun', 'left');
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL) {
		$this->db->like($this->table.'.Nama', $q);
		$this->db->or_like('NamaRekening', $q);
		$this->db->or_like('Cabang', $q);
		$this->db->or_like('NomorRekening', $q);
		$this->db->or_like('JenisRekening', $q);
        $this->db->select($this->table.'.*');
        $this->db->select($this->join.'.Nama as NamaAkun');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->join . '.idakun = ' . $this->table . '.Akun', 'left');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
		$this->db->like($this->table.'.Nama', $q);
		$this->db->or_like('NamaRekening', $q);
		$this->db->or_like('Cabang', $q);
		$this->db->or_like('NomorRekening', $q);
		$this->db->or_like('JenisRekening', $q);
		$this->db->limit($limit, $start);
        $this->db->select($this->table.'.*');
        $this->db->select($this->join.'.Nama as NamaAkun');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->join . '.idakun = ' . $this->table . '.Akun', 'left');
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

}

/* End of file _14_bank_model.php */
/* Location: ./application/models/_14_bank_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-30 02:13:46 */
/* http://harviacode.com */
