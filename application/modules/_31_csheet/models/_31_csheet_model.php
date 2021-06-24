<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _31_csheet_model extends CI_Model
{

    public $table = 't31_csheet';
    public $id = 'idcsheet';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($postData) {
        $this->datatables->select('idcsheet,nocsheet,tglcsheet,idjo,totalcsheet,created_at,updated_at');
        $this->datatables->from('t31_csheet');
		if ($postData['idcsheet'] != '') { $this->datatables->like('idcsheet', $postData['idcsheet']); }
		if ($postData['nocsheet'] != '') { $this->datatables->like('nocsheet', $postData['nocsheet']); }
		if ($postData['tglcsheet'] != '') { $this->datatables->like('tglcsheet', $postData['tglcsheet']); }
		if ($postData['idjo'] != '') { $this->datatables->like('idjo', $postData['idjo']); }
		if ($postData['totalcsheet'] != '') { $this->datatables->like('totalcsheet', $postData['totalcsheet']); }
		if ($postData['created_at'] != '') { $this->datatables->like('created_at', $postData['created_at']); }
		if ($postData['updated_at'] != '') { $this->datatables->like('updated_at', $postData['updated_at']); }
        //add this line for join
        //$this->datatables->join('table2', 't31_csheet.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('_31_csheet/update/$1'),'Ubah')." | ".anchor(site_url('_31_csheet/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'idcsheet');
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
        $this->db->like('idcsheet', $q);
		$this->db->or_like('nocsheet', $q);
		$this->db->or_like('tglcsheet', $q);
		$this->db->or_like('idjo', $q);
		$this->db->or_like('totalcsheet', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idcsheet', $q);
		$this->db->or_like('nocsheet', $q);
		$this->db->or_like('tglcsheet', $q);
		$this->db->or_like('idjo', $q);
		$this->db->or_like('totalcsheet', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
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

/* End of file _31_csheet_model.php */
/* Location: ./application/models/_31_csheet_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-25 00:00:32 */
/* http://harviacode.com */