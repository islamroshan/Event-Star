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
        $this->db->select('tickets.*,events.event_name');
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

    //Get all ticket from database
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

    //Get Ticket by id from database
    public function get_tickets_by_id($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
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
    
    //Update tickets
    public function update_ticket($ticket_details,$ticket_id)
    {
        $data = array(
            'ticket_name' => $ticket_details['ticketname'],
            'ticket_price' => $ticket_details['price'],
            'ticket_limit' => $ticket_details['limit'],
            'event_name' => $ticket_details['selectevent'],
        );
        $this->db->where('ticket_id',$ticket_id);
        $this->db->update('tickets',$data);
        return TRUE;
    }

    //Delet From Database
    public function delete_ticket($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->delete('tickets');
        return TRUE;
    }
}