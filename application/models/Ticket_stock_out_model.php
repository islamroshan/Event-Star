<?php
class Ticket_stock_out_model extends CI_Model {

    //GETTING TICKETS WHICH ARE OUT OF STOCK
    public function get_tickets_stock_out($limit,$start)
    {
        $this->db->limit($limit,$start);
        $this->db->select('tickets.*,events.event_name');
        $this->db->from('tickets');
        $this->db->join('events','tickets.event_name = events.event_id','left');
        $this->db->where('tickets.tickets_available <=', 0);
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
         $this->db->select('*');
         $this->db->from('tickets');
         $this->db->like('ticket_name',$search_keyword);
         $this->db->where('tickets.tickets_available <=', 0);
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
     
    //COUNT TOTAL TICKETS
    public function count_ticket_stock_out()
    {
        $this->db->where('tickets.ticket_limit <=', 0);
        $query = $this->db->get('tickets');
        return $query->num_rows();
    }
}