<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ticket_stock_out extends CI_Controller {

    //Initialize page
	public function index()
	{
        //Run This Code if Input field is empty
		if(html_escape($this->input->post('keyword')) == NULL)
		{
		  $this->page();
		  $limit_per_page = 10;
          $start = $this->uri->segment(4);
          $data['currency'] = $this->setting_model->get_currency();
          $data['ticket_stock'] = $this->ticket_stock_out_model->get_tickets_stock_out($limit_per_page,$start);
		  $datakey = array(
		  'key'  => 'show',
		  );
		  $this->session->set_userdata('key', $datakey);

        } 
        //Run This Code if Input field is available
        else 
		{
          $data['currency'] = $this->setting_model->get_currency();
		  $keys = html_escape($this->input->post('keyword'));
          $data['ticket_stock'] = $this->ticket_stock_out_model->search_tag($keys);
		}

        $data['main_view'] = 'overview/ticket_stock_out';
        $this->load->view('layouts/main',$data);   
    }
    
      //GET TICKET INFO
      public function get_ticket_info($ticket_id)
      {
          $data['event_list'] = $this->event_model->get_all_events();
          $data['ticket_info'] = $this->ticket_model->get_tickets_by_id($ticket_id);
          $data['main_view'] = 'overview/edit_ticket_stock';
          $this->load->view('layouts/main',$data);
      }
	
    //Load Pagination
	public function page()
	{
	    $query2 = $this->ticket_stock_out_model->count_ticket_stock_out();

	    //Pagination library
	    $this->load->library('pagination');

	    //Codeigniter Pagination
	    $config['base_url'] = base_url('overview/ticket_stock_out/index');
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
