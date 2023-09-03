<?php
class Contactusmodel extends CI_Model {

    public function all_contactus_count(){   
        $query = $this->db->get('contactus');
        return $query->num_rows();  
    }
    
    public function all_contactus($limit, $start) {   
        if ($limit == -1) {
            $limit = 12546464646464646;
        }

        $this->db->limit($limit,$start);
        $query = $this->db->get('contactus');  

        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result;         
    }

    public function contactus_search_count($search) {
        $this->db->group_start();
            $this->db->like('name',$search);
            $this->db->or_like('subject',$search);
            $this->db->or_like('message',$search);
            $this->db->or_like('date',$search);
        $this->db->group_end();

       $query = $this->db->get('contactus'); 

        return $query->num_rows();
    }

    public function contactus_search($limit, $start, $search) {
        if($limit == -1){
            $limit = 12546464646464646;
        }

        $this->db->group_start();
            $this->db->like('name',$search);
            $this->db->or_like('subject',$search);
            $this->db->or_like('message',$search);
            $this->db->or_like('date',$search);
        $this->db->group_end();

        $this->db->limit($limit, $start);
        $query = $this->db->get('contactus'); 

        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result; 
    }
    
}
?>