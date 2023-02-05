<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Incoming_ship extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	    $this->load->model('m_incoming_ship');
        $this->load->model('m_master_data');
	}

     public function list_incoming_ship()
    {
        $this->data['incoming'] = $this->m_incoming_ship->get_incoming_ship();
        $this->usertemp->view('incoming_ship/list_incoming_ship',$this->data);
    }

    public function create_incoming_ship()
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['ship'] = $this->m_master_data->get_ship();
			$this->usertemp->view('incoming_ship/create_incoming_ship',$this->data);

        }elseif (!empty($this->input->post())) {
            $no_puk                = $this->input->post('no_puk');
            $date_puk     = $this->input->post('date_puk');
            $ship     = $this->input->post('ship');
            $date_forecast = $this->input->post('date_forecast');

            $data = array(
                'nomor_puk'                 => $no_puk,
                'tanggal_puk'               => $date_puk,
                'code_ship'                 => $ship,
                'date_forecast'             => $date_forecast,
                'status'                    =>1,
                'create_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_incoming_ship->insert_incoming_ship($data);
            $this->session->set_flashdata('success', 'Your data successfully added !');
            redirect('frontend/incoming_ship/list_incoming_ship');
            
        }

    }

    public function update_incoming_ship($id_incoming='')
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['ship'] = $this->m_master_data->get_ship();
            $this->data['income'] = $this->m_incoming_ship->get_incoming_row($id_incoming);
			$this->usertemp->view('incoming_ship/update_incoming_ship',$this->data);

        }elseif (!empty($this->input->post())) {
            $id_incoming = $this->input->post('id_incoming');
            $no_puk                = $this->input->post('no_puk');
            $date_puk     = $this->input->post('date_puk');
            $ship     = $this->input->post('ship');
            $date_forecast = $this->input->post('date_forecast');

            $data = array(
                'nomor_puk'                 => $no_puk,
                'tanggal_puk'               => $date_puk,
                'code_ship'                 => $ship,
                'date_forecast'             => $date_forecast,
                'update_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_incoming_ship->update_incoming_ship($id_incoming,$data);
            $this->session->set_flashdata('success', 'Your data successfully Updated !');
            redirect('frontend/incoming_ship/list_incoming_ship');
            
        }

    }


    public function delete_incoming_ship($id_incoming='')
    {
        $status = $this->m_incoming_ship->delete_incoming_ship($id_incoming);
        if ($status == 1) {//Jika Success Insert
            $this->session->set_flashdata('success', 'Your data successfully deleted !');
            redirect('frontend/incoming_ship/list_incoming_ship');
        }else if($status == 'error'){
            $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
            redirect('frontend/incoming_ship/list_incoming_ship');
        }
    }

   

}
