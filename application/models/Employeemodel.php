<?php
class Employeemodel extends CI_Model {
    //Server side Datatables Methods Start
    public function all_active_employees_count($isdeleted){   
        $this->db->where('isdeleted', $isdeleted);
        $query = $this->db->get('user');
        return $query->num_rows();  
    }
    public function all_active_employees($limit, $start, $isdeleted) {   
        if ($limit == -1) {
            $limit = 12546464646464646;
        }

        $this->db->limit($limit,$start);
        $this->db->where('isdeleted', $isdeleted);
        $query = $this->db->get('user');  

        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result;         
    }
    public function employee_search_count($search, $isdeleted){
        $this->db->group_start();
            $this->db->like('fullname',$search);
            $this->db->or_like('email',$search);
            $this->db->or_like('usercode',$search);
            $this->db->or_like('designation',$search);
            $this->db->or_like('dateofjoining',$search);
        $this->db->group_end();

        $this->db->where('isdeleted', $isdeleted);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function employee_search($limit, $start, $search, $isdeleted){
        if($limit == -1){
            $limit = 12546464646464646;
        }

        $this->db->group_start();
            $this->db->like('fullname',$search);
            $this->db->or_like('email',$search);
            $this->db->or_like('usercode',$search);
            $this->db->or_like('designation',$search);
            $this->db->or_like('dateofjoining',$search);
        $this->db->group_end();

        $this->db->where('isdeleted', $isdeleted);
        $this->db->limit($limit, $start);
        $query = $this->db->get('user');
        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result; 
    }//Server side Datatables Methods End
    
}
?>