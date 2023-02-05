<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_outgoing_ship extends CI_Model{

	// private $table1 = 'u_user_register';
	// private $table2 = 'users';
	// const MAX_PASSWORD_SIZE_BYTES = 4096;

	public function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		
	}

	

	public function get_incoming_ship()
	{
		$this->db->select('a.*,b.*,c.name_ship,d.code as code_cus,e.type as cat_cus');
		$this->db->from('outgoing_ship as a');
        $this->db->join('incoming_ship as b','b.id_incoming=a.id_incoming','left');
		$this->db->join('ship as c','c.id_ship=b.code_ship','left');
		$this->db->join('customer as d','d.id_customer=c.code_customer','left');
		$this->db->join('category_customer as e','e.code=d.code_agent','left');
        $this->db->where('b.status',1);
		return $this->db->get()->result();
	}

	public function insert_outgoing_ship($data)
	{
		$no_invoice = $data['no_invoice'];
		$cek_no_invoice = $this->db->get_where('outgoing_ship', array('no_invoice' => $no_invoice))->num_rows();
		if ($cek_no_invoice == 1) {
			return 'error';
		}else if($cek_no_invoice !== 1){
			return $this->db->insert('outgoing_ship', $data);
		}
	}

	public function sum_outgoing()
	{
		$this->db->select('SUM(labuh) as ttl_labuh,SUM(tambat) as ttl_tambat,SUM(bongkar_muat) as bongkar_muat,SUM(receive_payment) as ttl_receive,SUM(pt_scn) as ttl_scn,SUM(bp_batam) as ttl_bp_batam');
		$this->db->from('outgoing_ship');
		return $this->db->get()->row();
	}

   



} ?>