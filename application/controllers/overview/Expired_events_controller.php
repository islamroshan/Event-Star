<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expired_events_controller extends CI_Controller {

    //Initialize page
	public function index()
	{
        //Run This Code if Input field is empty
		if(html_escape($this->input->post('keyword')) == NULL)
		{
		  $this->page();
		  $limit_per_page = 10;
		  $start = $this->uri->segment(4);
          $data['expire_events'] = $this->expired_event_model->get_expire_events($start,$limit_per_page);
		  $datakey = array(
		  'key'  => 'show',
		  );
		  $this->session->set_userdata('key', $datakey);

		  //Run This Code if Input field is available
        } 
        else 
		{
		  $keys = html_escape($this->input->post('keyword'));
          $data['expire_events'] = $this->expired_event_model->search_tag($keys);
		}

        $data['main_view'] = 'overview/expired_events_list';
        $this->load->view('layouts/main',$data);   
	}
	
    //Load Pagination
	public function page()
	{
	    $query2 = $this->expired_event_model->count_expire_events_rows();

	    //Pagination library
	    $this->load->library('pagination');

	    //Codeigniter Pagination
	    $config['base_url'] = base_url('overview/expired_events_controller/index');
	    $config['total_rows'] = $query2;
	    $config['per_page'] = 10;

	    //bootstrap styling
	    $config['full_tag_open'] = '<ul class="pagination justify-content-end m-0 pt-3 ">';
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';
	    $config['first_link'] = 'First';
	    $config['last_link'] = 'Last';
	    $config['next_link'] = 'Next';
	    $config['prev_link'] = 'Previous';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li class="page-item">';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="page-item ">';
	    $config['last_tag_close'] = '</a></li>';
	    $config['attributes'] = array('class' => 'page-link ');

	    //Pagination  Initiliazation
	    $this->pagination->initialize($config);
	}
}