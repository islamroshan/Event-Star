<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_controller extends CI_Controller {
    
    //View Invoice
	public function index()
	{
		$this->load->view('print/print_invoice');
	}
	
	//Print Invoice
	public function print($guest_id)
	{	
		$data['company_detail'] = $this->setting_model->get_settings();
		$data['guest_detail'] = $this->guest_model->get_guest_by_id($guest_id);
		$this->load->view('print/print_invoice',$data);
	}
	//Redirect to  print_controller
	public function redirect()
	{
		redirect('print/print_invoice_controller');
	}
}
