<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_guest_controller extends CI_Controller {

    //Initialize page
	public function index()
	{
        $data['tickets'] = $this->ticket_model->get_all_tickets();
        $data['currency'] = $this->setting_model->get_currency();
        $data['events'] = $this->event_model->get_all_events();
        $data['main_view'] = 'guest/add_guest';
        $this->load->view('layouts/main',$data);
    }

    public function geting_ticket()
    {
        if($this->input->post('event_id'))
        {
            echo $this->ticket_model->geting_tickets($this->input->post('event_id'));
        }
    }

    public function get_ticket_price()
    {
        if($this->input->post('ticket_id'))
        {
            echo $this->setting_model->get_currency() .' '.$this->ticket_model->get_ticket_price($this->input->post('ticket_id'));
        }
    }

    //Add Event
    public function add_guest()
    {   
        //CHECKING THE VALIDATION
        $this->form_validation->set_rules('guestname','event name','trim|required');
        $this->form_validation->set_rules('phone','contact number','trim|required');
        $this->form_validation->set_rules('address','address','trim|required');

		if($this->form_validation->run() == FALSE)
		{
            $data['tickets'] = $this->ticket_model->get_all_tickets();
            $data['currency'] = $this->setting_model->get_currency();
            $data['events'] = $this->event_model->get_all_events();
            $data['main_view'] = 'guest/add_guest';
            $this->load->view('layouts/main',$data);
        }
        else 
        {	
            $guests = $this->input->post();
            $query = $this->guest_model->add_guest($guests);
            if($query)
            {
                $this->session->set_flashdata('guest_added','Guest Has Been Added');
                redirect('guest/add_guest_controller');
            }
            else
            {
                $this->session->set_flashdata('guest_not_added','Guest Has Not  Been Added');
                redirect('dashboard_controller');
            }
        }
    }
}
