<?php
class Payrollmodel extends CI_Model {
    //Payroll Management Datatables
    public function all_employee_active_payroll_count($month){   
        $this->db->join('payroll','payroll.id = payrolldetails.payrollid');
        $this->db->where('payroll.isdeleted', 0);

        if ($_SESSION['is_admin'] == 0) {
            $this->db->where('payrolldetails.employeecode', $_SESSION['employee']->usercode);
        }
        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $query = $this->db->get('payrolldetails');
        // echo $this->db->last_query();die;
        return $query->num_rows();  
    }
    
    public function all_employee_active_payroll($limit, $start, $month) {   
        if ($limit == -1) {
            $limit = 12546464646464646;
        }
        $this->db->select('payrolldetails.*, salarymonth');
        $this->db->limit($limit,$start);
        $this->db->join('payroll','payroll.id =payrolldetails.payrollid');
        $this->db->where('payroll.isdeleted', 0);
        if ($_SESSION['is_admin'] == 0) {
            $this->db->where('payrolldetails.employeecode', $_SESSION['employee']->usercode);
        }

        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }

        $this->db->order_by('payrolldetails.id','desc');
        $query = $this->db->get('payrolldetails');  

        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result;         
    }

    public function employee_payroll_search_count($search, $month) {
        $this->db->group_start();
            $this->db->like('employeecode',$search);
            $this->db->or_like('salarymonth',$search);
        $this->db->group_end();

       $this->db->join('payroll','payroll.id = payrolldetails.payrollid');
       $this->db->where('payroll.isdeleted', 0);
       if ($_SESSION['is_admin'] == 0) {
           $this->db->where('payrolldetails.employeecode', $_SESSION['employee']->usercode);
       }

       if ($month != '') {
           $this->db->where('payroll.salarymonth', $month);
       }

       $query = $this->db->get('payrolldetails'); 

        return $query->num_rows();
    }

    public function employee_payroll_search($limit, $start, $search, $month) {
        if($limit == -1){
            $limit = 12546464646464646;
        }
        $this->db->select('payrolldetails.*, salarymonth');
        $this->db->group_start();
            $this->db->like('employeecode',$search);
            $this->db->or_like('salarymonth',$search);
        $this->db->group_end();


        $this->db->join('payroll','payroll.id = payrolldetails.payrollid');
        $this->db->where('payroll.isdeleted', 0);
        if ($_SESSION['is_admin'] == 0) {
            $this->db->where('payrolldetails.employeecode', $_SESSION['employee']->usercode);
        }

        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('payrolldetails.id','desc');
        $query = $this->db->get('payrolldetails'); 
        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result; 
    }

    //Payroll Month Datatables
    public function all_active_payroll_count($isdeleted, $month) {   
        $this->db->where('isdeleted', $isdeleted);
        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $this->db->order_by('payroll.id','desc');
        $query = $this->db->get('payroll');
        return $query->num_rows();  
    }

    public function all_active_payroll($limit, $start, $isdeleted, $month) {   
        if ($limit == -1) {
            $limit = 12546464646464646;
        }

        $this->db->limit($limit,$start);
        $this->db->where('isdeleted', $isdeleted);
        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $this->db->order_by('payroll.id','desc');
        $query = $this->db->get('payroll');  

        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result;         
    }

    public function payroll_search_count($search, $isdeleted, $month) {
        $this->db->group_start();
            $this->db->like('filename',$search);
            $this->db->or_like('salarymonth',$search);
            $this->db->or_like('date',$search);
        $this->db->group_end();

        $this->db->where('isdeleted', $isdeleted);
        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $this->db->order_by('payroll.id','desc');
        $query = $this->db->get('payroll');
        return $query->num_rows();
    }

    public function payroll_search($limit, $start, $search, $isdeleted, $month) {
        if($limit == -1){
            $limit = 12546464646464646;
        }

        $this->db->group_start();
            $this->db->like('filename',$search);
            $this->db->or_like('salarymonth',$search);
            $this->db->or_like('date',$search);
        $this->db->group_end();

        $this->db->where('isdeleted', $isdeleted);
        if ($month != '') {
            $this->db->where('payroll.salarymonth', $month);
        }
        $this->db->order_by('payroll.id','desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('payroll');
        $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
        return $result; 
    }

    public function get_emp_payroll($id) {
        $this->db->select('payrolldetails.*, user.*, payroll.salarymonth');
        $this->db->join('payroll','payroll.id = payrolldetails.payrollid');
        $this->db->join('user','user.usercode = payrolldetails.employeecode');
        $this->db->where('MD5(payrolldetails.id)', $id);
        $query = $this->db->get('payrolldetails');
        // echo $this->db->last_query();die;
        $result = ($query->num_rows() > 0) ? $query->row_array() : FALSE;
        return $result; 
    }
    
}
?>