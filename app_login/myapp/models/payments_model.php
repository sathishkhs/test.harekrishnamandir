<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payments_model extends CI_Model
{

    private $table;
    public $primary_key;
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset()
    {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk()
    {
        $this->primary_key = array();
    }

    private function reset_data()
    {
        $this->data = array();
    }

    public function view($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->get();
        return $query->result();
    }
    public function settings($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->order_by('display_order','asc')
            ->get();
        return $query->result();
    }

    public function get_row($table)
    {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function get_rowdata($table)
    {
       
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->result();
        $this->reset_pk();
        return $row;
    }

    public function insert($table)
    {
        $this->db->insert($table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update($table)
    {
        $this->db->update($table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function delete($table)
    {
        $this->db->where($this->primary_key);
        $this->db->delete($table);
        $this->reset_pk();
        return true;
    }

    public function get_pagination($table)
    {
        $this->db->select('*');
        $this->db->order_by('payment_date','desc');
        $q = $this->db->get($table);
        return $q;
    }

    public function get_donations($table_name){
        $this->db->select('*');
        if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
            $this->db->where("payment_date BETWEEN '".$this->input->post('from_date')."' AND DATE_ADD('".$this->input->post('to_date') ."', INTERVAL 1 DAY)");
        }
        if(!empty($_POST['festival_name'])){
            $this->db->like('festival',$this->input->post('festival_name'));
        }
        if(!empty($_POST['program_name'])){
            $this->db->like('seva_name',$this->input->post('program_name'));
        }
        $q = $this->db->get($table_name);
        return $q->result();
    }
}