<?php
class Ticket_model extends CI_Model {

    //INSERT TICKET INTO DATABASE
    public function add_ticket($tickets)
    {

        $total_tickets = $tickets['limit'];
        $available_tickets = $total_tickets;
        $issued_tickets = $total_tickets - $available_tickets;

        $data = array(
            'ticket_name' => html_escape($tickets['ticketname']),
            'ticket_price' => html_escape($tickets['price']),
            'ticket_limit' => html_escape($total_tickets),
            'tickets_available' => html_escape($available_tickets),
            'tickets_issued' => html_escape($issued_tickets),
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
        $this->db->join('events','tickets.event_name = events.event_id','left');
        $this->db->where('tickets.ticket_limit >=', 1);
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

    public function geting_tickets($event_id)
    {
        $where_condition = array('event_name' => $event_id, 'tickets_available >' =>  0);
        $this->db->where($where_condition);
        $this->db->order_by('ticket_name','ASC');
        $query = $this->db->get('tickets');
        if($query->num_rows() > 0)
        {
            $output = '<option value="">Select ticket</option>';
            foreach($query->result() as $row)
            {
                $output .= '<option  value="'.$row->ticket_id.'">'.$row->ticket_name.' (In stock: '.$row->tickets_available.' tickets)</option>';
            }
            return $output;
        }
        else
        {
           return $output = '<option value="">No ticket for selected event</option>';
        }
    }

    public function get_ticket_price($ticket_id)
    {
        $this->db->where('ticket_id',$ticket_id);
        $this->db->order_by('ticket_name','ASC');
        $query = $this->db->get('tickets');
        $result = $query->row(2)->ticket_price;
        return $result;
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
        $this->db->where('tickets.ticket_limit >=', 1);
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