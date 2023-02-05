<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model Register
 */
class M_master_data extends CI_Model{

	// private $table1 = 'u_user_register';
	// private $table2 = 'users';
	// const MAX_PASSWORD_SIZE_BYTES = 4096;

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		// $this->db2  = $this->load->database('tooling', true);
		// $this->db1  = $this->load->database('machine', true);
		// $this->db3  = $this->load->database('productionactivity', true);
	}

	

	public function get_category_request()
	{
		$this->db->select('*');
		$this->db->from('category_customer');
		$this->db->order_by('code ASC');
		return $this->db->get()->result();
	}

	public function get_category_request_row($code)
	{
		$this->db->select('*');
		$this->db->from('category_customer');
		$this->db->where('code',$code);
		return $this->db->get()->row();
	}

	public function insert_category_customer($data)
	{
		$code = $data['code'];
		$cek_code = $this->db->get_where('category_customer', array('code' => $code))->num_rows();
		if ($cek_code == 1) {
			return 'error';
		}else if($cek_code !== 1){
			return $this->db->insert('category_customer', $data);
		}
	}

	public function update_category_customer($code,$data)
	{
		$this->db->where('code',$code);
		return $this->db->update('category_customer',$data);
	}
	public function delete_category_customer($code)
	{
		$this->db->where('code',$code);
		return $this->db->delete('category_customer');
	}

	public function get_customer()
	{
		$this->db->select('a.*,b.type as cat_cus');
		$this->db->from('customer as a');
		$this->db->join('category_customer as b','b.code=a.code_agent','left');
		$this->db->order_by('a.code ASC');
		return $this->db->get()->result();
	}
	

	public function insert_customer($data)
	{
		$code = $data['code'];
		$cek_code = $this->db->get_where('customer', array('code' => $code))->num_rows();
		if ($cek_code == 1) {
			return 'error';
		}else if($cek_code !== 1){
			return $this->db->insert('customer', $data);
		}
	}

	public function update_customer($code,$data)
	{
		$this->db->where('code',$code);
		return $this->db->update('customer',$data);
	}

	public function get_customer_row($code)
	{
		$this->db->select('a.*,b.type as cat_cus');
		$this->db->from('customer as a');
		$this->db->join('category_customer as b','b.code=a.code_agent','left');
		$this->db->where('a.code',$code);
		return $this->db->get()->row();
	}

	public function delete_customer($code)
	{
		$this->db->where('code',$code);
		return $this->db->delete('customer');
	}

	public function get_ship()
	{
		$this->db->select('a.*,b.code as name,c.type as cat_cus');
		$this->db->from('ship as a');
		$this->db->join('customer as b','b.id_customer=a.code_customer');
		$this->db->join('category_customer as c','c.code=b.code_agent','left');
		$this->db->order_by('a.code ASC');
		return $this->db->get()->result();
	}

	public function get_ship_row($code)
	{
		$this->db->select('*');
		$this->db->from('ship');
		$this->db->where('code',$code);
		return $this->db->get()->row();
	}

	public function insert_ship($data)
	{
		$code = $data['code'];
		$cek_code = $this->db->get_where('ship', array('code' => $code))->num_rows();
		if ($cek_code == 1) {
			return 'error';
		}else if($cek_code !== 1){
			return $this->db->insert('ship', $data);
		}
	}

	public function update_ship($code,$data)
	{
		$this->db->where('code',$code);
		return $this->db->update('ship',$data);
	}

	public function delete_ship($code)
	{
		$this->db->where('code',$code);
		return $this->db->delete('ship');
	}

	

} ?>