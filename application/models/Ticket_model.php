<?php
class Ticket_model extends CI_Model {

    //Insert event to database
    public function add_ticket($tickets)
    {
        $data = array(
            'ticket_name' => html_escape($tickets['ticketname']),
            'ticket_price' => html_escape($tickets['price']),
            'ticket_limit' => html_escape($tickets['limit']),
            'event_name' => html_escape($tickets['selectevent']),
        ); 
         $query = $this->db->insert('tickets',$data);
        if($query)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    //Get tickets from database
    public function get_ticket($limit,$start)
    {
        $this->db->limit($limit,$start);
        $this->db->select('*,events.event_name');
        $this->db->from('tickets');
        $this->db->join('events','tickets.event_name = events.event_id');
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

      //Get all events from database
      public function get_all_tickets()
      {
          $query = $this->db->get('tickets');
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
    public function get_total_ticket_rows()
    {
        $query = $this->db->get('tickets');
        return $query->num_rows();
    }

    //To Search in database
    public function search_tag($search_keyword)
    {
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->like('ticket_name',$search_keyword);
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
}