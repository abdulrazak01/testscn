<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Master_data extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	    $this->load->model('m_master_data');
	}

    public function menu_master_data()
    {
        $this->usertemp->view('master_data/customer/menu_master');
    }

    public function list_category_customer()
    {
        $this->data['cat_cus'] = $this->m_master_data->get_category_request();
        $this->usertemp->view('master_data/customer/list_category_cus',$this->data);
    }

    public function create_category_customer()
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

			$this->usertemp->view('master_data/customer/create_category_customer');

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name     = $this->input->post('name');

            $data = array(
                'code'                      => $code_type,
                'type'                      => $name,
                'create_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->insert_category_customer($data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully added !');
                redirect('frontend/master_data/list_category_customer');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
                redirect('frontend/master_data/list_category_customer');
            }
        }

    }

    public function update_category_customer($code='')
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['cat_cus'] = $this->m_master_data->get_category_request_row($code);
			$this->usertemp->view('master_data/customer/update_category_customer',$this->data);

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name     = $this->input->post('name');

            $data = array(
                'code'                      => $code_type,
                'type'                      => $name,
                'update_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->update_category_customer($code_type,$data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully Updated !');
                redirect('frontend/master_data/list_category_customer');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
                redirect('frontend/master_data/list_category_customer');
            }
        }

    }


    public function delete_category_customer($code='')
    {
        $status = $this->m_master_data->delete_category_customer($code);
        if ($status == 1) {//Jika Success Insert
            $this->session->set_flashdata('success', 'Your data successfully deleted !');
            redirect('frontend/master_data/list_category_customer');
        }else if($status == 'error'){
            $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
            redirect('frontend/master_data/list_category_customer');
        }
    }

    public function list_customer()
    {
        $this->data['cus'] = $this->m_master_data->get_customer();
        $this->usertemp->view('master_data/customer2/list_customer',$this->data);
    }

    public function create_customer()
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['cat_cus'] = $this->m_master_data->get_category_request();
			$this->usertemp->view('master_data/customer2/create_customer',$this->data);

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name     = $this->input->post('name');
            $cat_cus     = $this->input->post('cat_cus');

            $data = array(
                'code'                      => $code_type,
                'name'                      => $name,
                'code_agent'                => $cat_cus,
                'create_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->insert_customer($data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully added !');
                redirect('frontend/master_data/list_customer');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
                redirect('frontend/master_data/list_customer');
            }
        }

    }

    public function update_customer($code='')
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['cat_cus'] = $this->m_master_data->get_category_request();
            $this->data['cus'] = $this->m_master_data->get_customer_row($code);
			$this->usertemp->view('master_data/customer2/update_customer',$this->data);

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name     = $this->input->post('name');
            $cat_cus     = $this->input->post('cat_cus');

            $data = array(
                'code'                      => $code_type,
                'name'                      => $name,
                'code_agent'                => $cat_cus,
                'create_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->update_customer($code_type,$data);
            $this->session->set_flashdata('success', 'Your data successfully Update !');
            redirect('frontend/master_data/list_customer');
        }

    }

    public function delete_customer($code='')
    {
        $status = $this->m_master_data->delete_customer($code);
        if ($status == 1) {//Jika Success Insert
            $this->session->set_flashdata('success', 'Your data successfully deleted !');
            redirect('frontend/master_data/list_customer');
        }else if($status == 'error'){
            $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
            redirect('frontend/master_data/list_customer');
        }
    }

    public function list_ship()
    {
        $this->data['ship'] = $this->m_master_data->get_ship();
        $this->usertemp->view('master_data/ship/list_ship',$this->data);
    }


    public function create_ship()
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['cus'] = $this->m_master_data->get_customer();
			$this->usertemp->view('master_data/ship/create_ship',$this->data);

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name_ship     = $this->input->post('name_ship');
            $cus     = $this->input->post('cus');
            $gross_ton     = $this->input->post('gross_ton');
            // $year_of_build     = $this->input->post('year_of_build');

            $data = array(
                'code'                      => $code_type,
                'name_ship'                      => $name_ship,
                'gross_ton'                => $gross_ton,
                // 'year_of_build'                => $year_of_build,
                'code_customer'                => $cus,
                'create_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->insert_ship($data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully added !');
                redirect('frontend/master_data/list_ship');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
                redirect('frontend/master_data/list_ship');
            }
        }

    }

    public function update_ship($code='')
    {
        $hariIni        = new DateTime();
        if (empty($this->input->post())) {

            $this->data['cus'] = $this->m_master_data->get_customer();
            // log_r($this->data['cus']);

            $this->data['ship'] = $this->m_master_data->get_ship_row($code);
            // log_r($this->data['ship']);
			$this->usertemp->view('master_data/ship/update_ship',$this->data);

        }elseif (!empty($this->input->post())) {
            $code_type                = $this->input->post('code_type');
            $name_ship     = $this->input->post('name_ship');
            $cus     = $this->input->post('cus');
            $gross_ton     = $this->input->post('gross_ton');
            // $year_of_build     = $this->input->post('year_of_build');

            $data = array(
                'code'                      => $code_type,
                'name_ship'                      => $name_ship,
                'gross_ton'                => $gross_ton,
                // 'year_of_build'                => $year_of_build,
                'code_customer'                => $cus,
                'update_at'                 => $hariIni->format('Y-m-d'),
            );

            $status = $this->m_master_data->update_ship($code_type,$data);
            if ($status == 1) {//Jika Success Insert
                $this->session->set_flashdata('success', 'Your data successfully updated !');
                redirect('frontend/master_data/list_ship');
            }else if($status == 'error'){
                $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
                redirect('frontend/master_data/list_ship');
            }
        }

    }
    public function delete_ship($code='')
    {
        $status = $this->m_master_data->delete_ship($code);
        if ($status == 1) {//Jika Success Insert
            $this->session->set_flashdata('success', 'Your data successfully deleted !');
            redirect('frontend/master_data/list_ship');
        }else if($status == 'error'){
            $this->session->set_flashdata('error', 'Code No is available, please make a unique one !');
            redirect('frontend/master_data/list_ship');
        }
    }




	
}
