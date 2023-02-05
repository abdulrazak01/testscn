<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Outgoing_ship extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	    $this->load->model('m_incoming_ship');
        $this->load->model('m_master_data');
        $this->load->model('m_outgoing_ship');
	}

     public function list_outgoing_ship()
    {
        $this->data['outgoing'] = $this->m_outgoing_ship->get_incoming_ship();
        $this->data['total'] = $this->m_outgoing_ship->sum_outgoing();
        // log_r($this->data['outgoing']);
        $this->usertemp->view('outgoing_ship/list_outgoing_ship',$this->data);
    }

    public function create_outgoing_ship()
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['incoming'] = $this->m_incoming_ship->get_incoming_ship();
			$this->usertemp->view('outgoing_ship/create_outgoing_ship',$this->data);

        }elseif (!empty($this->input->post())) {
            $incoming                = $this->input->post('incoming');
            $no_invoice     = $this->input->post('no_invoice');
            $date_payment     = $this->input->post('date_payment');
            $labuh_str = $this->input->post('labuh');
            $labuh_int = str_replace(".","", $labuh_str);
            $tambat_str = $this->input->post('tambat');
            $tambat_int = str_replace(".","", $tambat_str);
            $bongkar_muat_str = $this->input->post('bongkar_muat');
            $bongkar_muat_int = str_replace(".","", $bongkar_muat_str);
            $receive_payment_str = $this->input->post('receive_payment');
            $receive_payment_int = str_replace(".","", $receive_payment_str);
            $pt_scn_str = $this->input->post('pt_scn');
            $pt_scn_int = str_replace(".","", $pt_scn_str);
            $bp_batam_str = $this->input->post('bp_batam');
            $bp_batam_int = str_replace(".","", $bp_batam_str);
            
            // log_r($labuh_int);

            $data = array(
                'id_incoming'                   => $incoming,
                'no_invoice'                    => $no_invoice,
                'date_payment'                  => $date_payment,
                'labuh'                     => $labuh_int,
                'tambat'                    =>$tambat_int,
                'bongkar_muat'              =>$bongkar_muat_int,
                'receive_payment'           =>$receive_payment_int,
                'pt_scn'                    =>$pt_scn_int,
                'bp_batam'                  =>$bp_batam_int,
                'date_outgoing'              =>$hariIni->format('Y-m-d'),
                'create_at'                 => $hariIni->format('Y-m-d'),
            );


            $status = $this->m_outgoing_ship->insert_outgoing_ship($data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully added !');
                redirect('frontend/outgoing_ship/list_outgoing_ship');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'No Invoice is available, please make a unique one !');
                redirect('frontend/outgoing_ship/list_outgoing_ship');
            }
            
        }

    }

    public function view_chart()
    {
        // $this->data['total'] = $this->m_outgoing_ship->sum_outgoing();
        $this->usertemp->view('outgoing_ship/view_chart');
    }

    public function get_value_chart()
    {
        $data_chart = $this->m_outgoing_ship->sum_outgoing();
        echo json_encode($data_chart) ;
    }

   

}
