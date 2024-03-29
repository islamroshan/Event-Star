<?php
class Guest_model extends CI_Model {

    //Insert guest to database
    public function add_guest($guests)
    {
        $paid_amount =  $guests['pamount'];
        $ticket_name =  $guests['ticketname'];

        //GETING TICKET DETAIL
        $get_ticket_detail = $this->db->where('ticket_id', $ticket_name);
        $get_ticket_detail = $this->db->get('tickets');

        $ticket_rate =  $get_ticket_detail->row(2)->ticket_price;
        $tickets_available = $get_ticket_detail->row(4)->tickets_available;
        $tickets_issued = $get_ticket_detail->row(5)->tickets_issued;
        
        $payable_amount = $ticket_rate - $paid_amount;
        $ticket_stock = $tickets_available - 1 ;
        $tickets_issued += 1;

        //Insert into guest table
        $data = array(
            'guest_name' => html_escape($guests['guestname']),
            'guest_number' => html_escape($guests['phone']),
            'guest_address' => html_escape($guests['address']),
            'guest_email' => html_escape($guests['email']),
            'purchase_from' => html_escape($guests['purchase']),
            'purchase_date' => html_escape($guests['purchasedate']),
            'event_name' => html_escape($guests['eventname']),
            'ticket_name' => html_escape($ticket_name),
            'ticket_rate' => html_escape($ticket_rate),
            'paid_amount' => html_escape($paid_amount),
            'remaining_due' => html_escape($payable_amount),
        ); 
         $query = $this->db->insert('guests',$data);

         //UPDATE TICKET STOCK
         $data1 = array(
             'tickets_available' => html_escape($ticket_stock),
             'tickets_issued' => html_escape($tickets_issued),
         );
         $this->db->where('ticket_id', $ticket_name);
         $this->db->update('tickets',$data1);

        if($query)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    //Get guest from database
    public function get_guests($limit,$start)
    {
        $this->db->limit($limit,$start);
        $this->db->select('*,events.event_name','tickets.ticket_name');
        $this->db->from('guests');
        $this->db->join('events','guests.event_name = events.event_id','left');
        $this->db->join('tickets','guests.ticket_name = tickets.ticket_id','left');
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return NULL;
        }
    }
    
    //Get guest by id
     public function get_guest_by_id($guest_id)
     {
         $this->db->select('*,events.event_name','tickets.ticket_name','tickets.ticket_id');
         $this->db->from('guests');
         $this->db->join('events','guests.event_name = events.event_id','left');
         $this->db->join('tickets','guests.ticket_name = tickets.ticket_id','left');
         $this->db->where('guest_id',$guest_id);
         $query = $this->db->get();
         if($query->num_rows() > 0)
         {
             return $query->result();
         }
         else
         {
             return NULL;
         }
     }
     
    //To get total rows
    public function get_total_guest_rows()
    {
        $this->db->select('*');
        $this->db->from('guests');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //To Search in database
    public function search_tag($search_keyword)
    {
        $this->db->select('*,events.event_name','tickets.ticket_name');
        $this->db->from('guests');
        $this->db->join('events','guests.event_name = events.event_id','left');
        $this->db->join('tickets','guests.ticket_name = tickets.ticket_id','left');
        $this->db->like('guest_name',$search_keyword);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return NULL;
        }
    }

    //Find Total Payment per Month
	public function payments_per_month()
	{ 
		$this->db->select('*');
		$this->db->from('guests');
		$this->db->where('MONTH(purchase_date) =',date('m'));
		$query = $this->db->get();
		if($query->num_rows() > 0 )
		{
			return $query->result();
		} else 
		{
			return NULL;
		}
    }
    
    //Count Total Payment per Month
	public function count_payments_per_month()
	{ 
		$this->db->select('*');
		$this->db->from('guests');
		$this->db->where('MONTH(purchase_date) =',date('m'));
		$query = $this->db->get();
		return $query->num_rows(); 
    }
    
    //Update Guest
    public function update_guest($guests,$guest_id)
    {
        $paid_amount = $guests['pamount'];
        $ticket_id =  $guests['ticketid'];

        $get_ticket_detail = $this->db->where('ticket_id', $ticket_id);
        $get_ticket_detail = $this->db->get('tickets');
       
        //FIND TICKET PRICE
        $ticket_rate =  $get_ticket_detail->row(2)->ticket_price;
        $payable_amount = $ticket_rate - $paid_amount;
       

        //UPDATE GUEST IN DATABASE 
        $data = array(
            'guest_name' => html_escape($guests['guestname']),
            'guest_number' => html_escape($guests['phone']),
            'guest_address' => html_escape($guests['address']),
            'guest_email' => html_escape($guests['email']),
            'purchase_from' => html_escape($guests['purchase']),
            'purchase_date' => html_escape($guests['purchasedate']),
            'ticket_rate' => html_escape($ticket_rate),
            'paid_amount' => html_escape($paid_amount),
            'remaining_due' => html_escape($payable_amount),
        ); 
        $this->db->where('guest_id',$guest_id);
        $this->db->update('guests',$data);
    
        return TRUE;
    }

    //Delet From Database
    public function delete_guest($guest_id)
    {
        $this->db->where('guest_id',$guest_id);
        $this->db->delete('guests');
        return TRUE;
    }
}