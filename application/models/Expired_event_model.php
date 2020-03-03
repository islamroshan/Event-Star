<?php
class Expired_event_model extends CI_Model {

    
    //Get all events from database
    public function get_expire_events($start,$limit)
    {
        $this->db->limit($limit,$start);
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('MONTH(event_date) <', date('m'));
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

     //To Search in database
     public function search_tag($search_keyword)
     {
         $this->db->like('event_name',$search_keyword);
         $this->db->where('MONTH(event_date) <', date('m'));
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
    public function count_expire_events_rows()
    {
        $this->db->where('MONTH(event_date) <', date('m'));
        $query = $this->db->get('events');
        return $query->num_rows();
    }


    //Get event by id from database
    public function get_event_info($event_id)
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

    // Update Events
    public function update_expire_event($event_details, $event_id)
    {
        $data = array(
            'event_name' => $event_details['eventname'],
            'event_date' => $event_details['eventdate']
        );
        $this->db->where('event_id', $event_id);
        $this->db->update('events', $data);
        return TRUE;
    }

    //Delet EXPIRE EVENT From Database
    public function delete_expire_event($event_id)
    {
        $this->db->where('event_id',$event_id);
        $this->db->delete('events');
        return TRUE;
    }
}