<?php
class Event_model extends CI_Model {

    //Insert event to database
    public function add_event($events)
    {
        $data = array(
            'event_name' => html_escape($events['eventname']),
        ); 
         $query = $this->db->insert('events',$data);
        if($query)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    //Get event from database
    public function get_events($limit,$start)
    {
        $this->db->limit($limit,$start);
        $query = $this->db->get('events');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return NULL;
        }
    }

    
    //Get all events from database
    public function get_all_events()
    {
        $query = $this->db->get('events');
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
    public function get_total_events_rows()
    {
        $query = $this->db->get('events');
        return $query->num_rows();
    }

    //To Search in database
    public function search_tag($search_keyword)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->like('event_name',$search_keyword);
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

    //Find  total events
	public function events_per_month()
	{ 
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('MONTH(event_date) =',date('m'));
		$query = $this->db->get();
		return $query->num_rows(); 
	}
}