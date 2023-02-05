<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Register
 */
class M_incoming_ship extends CI_Model{

	// private $table1 = 'u_user_register';
	// private $table2 = 'users';
	// const MAX_PASSWORD_SIZE_BYTES = 4096;

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		
	}

	

	public function get_incoming_ship()
	{
		$this->db->select('a.*,b.name_ship,b.code as code_ship');
		$this->db->from('incoming_ship as a');
        $this->db->join('ship as b','b.id_ship=a.code_ship','left');
        $this->db->where('a.status',1);
		$this->db->order_by('a.nomor_puk ASC');
		return $this->db->get()->result();
	}
    public function insert_incoming_ship($data)
	{
        return $this->db->insert('incoming_ship', $data);
		
	}

    public function get_incoming_row($id_incoming)
	{
		$this->db->select('a.*,b.name_ship');
		$this->db->from('incoming_ship as a');
        $this->db->join('ship as b','b.id_ship=a.code_ship','left');
        $this->db->where('a.status',1);
        $this->db->where('a.id_incoming',$id_incoming);
		return $this->db->get()->row();
	}
    public function update_incoming_ship($id_incoming,$data)
	{
		$this->db->where('id_incoming',$id_incoming);
		return $this->db->update('incoming_ship',$data);
	}

    public function delete_incoming_ship($id_incoming)
	{
		$this->db->where('id_incoming',$id_incoming);
		return $this->db->delete('incoming_ship');
	}



} ?>