<?php
class Event_model extends CI_Model {

    //Insert event to database
    public function add_event($events)
    {
        $data = array(
            'event_name' => html_escape($events['eventname']),
            'event_date' => html_escape($events['eventdate']),
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

      //Get event by id from database
      public function get_events_by_id($event_id)
      {
          $this->db->where('event_id',$event_id);
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
        $this->db->where('MONTH(event_date) >=', date('m'));
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

    //Search event per month in database
    public function event_month_search_tag($search_keyword)
    {
        $this->db->select('*');
		$this->db->from('events');
		$this->db->where('MONTH(event_date) =',date('m'));
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
    
    //Count total events per month 
	public function events_per_month()
	{ 
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('MONTH(event_date) =',date('m'));
		$query = $this->db->get();
		return $query->num_rows(); 
    }

    //Find total events per month
	public function find_event_per_month($limit,$start)
	{ 
        $this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('MONTH(event_date) =',date('m'));
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
    
    //Update Events
    public function update_event($event_details,$event_id)
    {
        $data = array(
            'event_name' => $event_details['eventname'],
            'event_date' => $event_details['eventdate']
        );
        $this->db->where('event_id',$event_id);
        $this->db->update('events',$data);
        return TRUE;
    }

    //Delet From Database
    public function delete_event($event_id)
    {
        $this->db->where('event_id',$event_id);
        $this->db->delete('events');
        return TRUE;
    }
}