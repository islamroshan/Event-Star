<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {
	public function index()
	{
		$data['total_events'] = $this->event_model->get_total_events_rows();
		$data['events_per_month'] = $this->event_model->events_per_month();
		$data['total_guest'] = $this->guest_model->get_total_guest_rows();
		$data['count_guest'] = $this->guest_model->count_payments_per_month();
		$data['total_ticket'] = $this->ticket_model->get_total_ticket_rows();
		$data['income_per_month'] = $this->guest_model->payments_per_month();

		$chart = array(	$data['total_events'] , $data['total_ticket'],$data['total_guest'],$data['count_guest'],$data['events_per_month']);
		$data['chart_data'] = json_encode($chart);

        $data['main_view'] = 'dashboard_view';
        $this->load->view('layouts/main',$data);
	}
}
