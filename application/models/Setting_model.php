<?php
class Setting_model extends CI_Model {
  
    //To Get Gym Settings
	public function get_settings()
	{
		$this->db->select('*');
		$query = $this->db->get('ems_settings');

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return NULL;
		}
	}
    
    // To Get Selected Currency
	public function get_currency()
	{
		$this->db->select('*');
		$query = $this->db->get('ems_settings');
		
		return $query->row(5)->currency;
	}
    
    //Update Brand Name and Description
	public function update_company($ems_details)
	{
		$data = array(
			'company_name' => html_escape($ems_details['companyname']),
			'company_address' => html_escape($ems_details['address']),
			'company_contact' => html_escape($ems_details['phone']),
			'currency' => html_escape($ems_details['currency']),
		);
		$this->db->update('ems_settings', $data);
		return TRUE;
	}
    
    //Update the logo of company
	public function update_logo($img_path)
	{
		//To delete previous img from folder
		$get_img_path = $this->db->get('ems_settings');
		$path = $get_img_path->row(4)->company_logo;
		unlink("images/".$path);

		$data = array(
			'company_logo' => $img_path
		);

		$this->db->update('ems_settings', $data);
		return TRUE;
	}
	
 }
?>