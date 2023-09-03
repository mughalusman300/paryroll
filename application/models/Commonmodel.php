<?php
class Commonmodel extends CI_Model {

	//======================================================================
	//START--------------Generic Function For Model-------------------------
	//======================================================================
	
	public function delete($tablename, $columnname, $conditionvalue){
    	$this->db->where($columnname, $conditionvalue);
    	$this->db->delete($tablename);	
	}	

	public function Delete_record_double_condition($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);
	$this->db->delete($tablename);	
	}	
	
	
    public function duplicate_check($tablename, $columnname, $conditionvalue, $columnname1 ='' ,$id ='') {
        if ($id !='') {
            $this->db->where_not_in($columnname1, $id);
        }    
        $this->db->where($columnname, $conditionvalue);	
        $query = $this->db->get($tablename);  
        return $query->num_rows();	
    }

    public function check_if_exist($tablename, $columnname, $conditionvalue){
        $this->db->where($columnname, $conditionvalue); 
        $query = $this->db->get($tablename);  
        return $query->num_rows();  
    }

    public function Duplicate_double_check($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1){
    $this->db->where($columnname, $conditionvalue);	
    $this->db->where($columnname1, $conditionvalue1);	
    $query = $this->db->get($tablename);  
    return $query->num_rows();	
    }
    
    public function Duplicate_triple_check($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1, $columnname2, $conditionvalue2){
    $this->db->where($columnname, $conditionvalue);	
    $this->db->where($columnname1, $conditionvalue1);
    $this->db->where($columnname2, $conditionvalue2);
    $query = $this->db->get($tablename);  
    return $query->num_rows();	
    }

    public function rows_number($tablename){
    $query = $this->db->get($tablename);  
    return $query->num_rows();	
    }

   
    public function update($tablename, $columnname, $conditionvalue, $data){
	$this->db->where($columnname, $conditionvalue);
	$this->db->update($tablename, $data); 
	return $this->db->affected_rows();      
	}

	public function Update_double_record($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1, $data){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);
	$this->db->update($tablename, $data); 
	return $this->db->affected_rows();      
	}
	
	
	public function Update_Triple_record($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1,  $columnname2, $conditionvalue2, $data){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);
	$this->db->where($columnname2, $conditionvalue2);
	$this->db->update($tablename, $data); 
	return $this->db->affected_rows();      
	}

    public function insert($tablename, $data){
   	$this->db->insert($tablename, $data);  
	return $this->db->insert_id();      
    }

    public function Get_all_record($tablename){
    $query = $this->db->get($tablename);  
    return $query->result();
    }

	public function Get_result_by_condition($tablename, $columnname, $conditionvalue){
	$this->db->where($columnname, $conditionvalue);	
    $query = $this->db->get($tablename);  
    return $query->result();
    }
    public function Get_row_by_condition($tablename, $columnname, $conditionvalue){
    	$this->db->where($columnname, $conditionvalue);	
        $query = $this->db->get($tablename);  
        return $query->row();
    }
    public function get_row($tablename, $columnname, $conditionvalue){
        $this->db->where($columnname, $conditionvalue); 
        $query = $this->db->get($tablename);  
        if($query->num_rows()>0){
            return $query->row();
        }
        else{
            return false;
        }
    }

	public function Get_record_by_condition_array($tablename, $columnname, $conditionvalue){
	$this->db->where($columnname, $conditionvalue);	
    $query = $this->db->get($tablename);  
    return $query->result_array();
    }

    public function Get_record_by_double_condition($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);	
    $query = $this->db->get($tablename);  
    return $query->result();
    }
    
    
    public function Get_record_by_double_condition_array($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);	
    $query = $this->db->get($tablename);  
    return $query->result_array();
    }

    public function Get_record_by_triple_condition($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1,$columnname2, $conditionvalue2){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);	
   	$this->db->where($columnname2, $conditionvalue2);	
    $query = $this->db->get($tablename);  
    return $query->result_array();
    }
    
    public function Get_record_by_triple_condition_non($tablename, $columnname, $conditionvalue, $columnname1, $conditionvalue1,$columnname2, $conditionvalue2){
	$this->db->where($columnname, $conditionvalue);
	$this->db->where($columnname1, $conditionvalue1);	
   	$this->db->where($columnname2, $conditionvalue2);	
    $query = $this->db->get($tablename);  
    return $query->result();
    }

    public function Get_record_by_join_and_condition($tablename, $columnname, $conditionvalue, $jointablename, $jointablecolumnname, $basecolumnname){
    $this->db->select('*');
	$this->db->from($tablename);
	$this->db->join($jointablename, $jointablename.$jointablecolumnname = $tablename.$basecolumnname);
	$this->db->where($columnname, $conditionvalue);	
	$query = $this->db->get();
	return $query->result();
	}
    public function get_product_formats($pro_specs_id) {
        $this->db->where('pro_specs_id',$pro_specs_id);
        $query = $this->db->get('inv_product_specifications');
        $result = $query->row();
        $formats =array();
        if (preg_match("/A3/", $result->pro_specs_type)) {
            array_push($formats,"A3 Label");
        }
        if (preg_match("/A4/", $result->pro_specs_type)) {
            array_push($formats,"A4 Labels");
        } 
        if (preg_match("/A5/", $result->pro_specs_type)) {
            array_push($formats,"A5 Labels");
        } 
        if (preg_match("/SRA3/", $result->pro_specs_type)) {
            array_push($formats,"SRA3 Label");
        }  
        if (preg_match("/Roll/", $result->pro_specs_type)) {
            array_push($formats,"Roll Labels");
        }
        return $formats;
    }

    public function getRows($params = array(), $table) {
        $select = '*';
        if (array_key_exists('returnType', $params) && $params['returnType'] == 'sum') {
            if (!empty($params['col'])) {
                $select = 'SUM(' . $params['col'] . ') as total';
            }
        }

        if (array_key_exists('returnType', $params) && $params['returnType'] == 'min') {
            if (!empty($params['col'])) {
                $select = 'MIN(' . $params['col'] . ') as min';
            }
        }

        if (array_key_exists('returnType', $params) && $params['returnType'] == 'max') {
            if (!empty($params['col'])) {
                $select = 'MAX(' . $params['col'] . ') as max';
            }
        }

        if (array_key_exists('cols', $params)) {
            if (!empty($params['cols'])) {
                $select = $params['cols'];
            }
        }

        $this->db->select($select);
        $this->db->from($table);

        if (array_key_exists('conditions', $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }


        if (array_key_exists('not_like', $params)) {

            foreach ($params['not_like'] as $key => $val) {
                $this->db->not_like($key, $val);
            }
        }

        if (array_key_exists('like', $params)) {
            foreach ($params['like'] as $key => $val) {
                $this->db->like($key, $val);
            }
        }

        if (array_key_exists('where_in', $params)) {
            foreach ($params['where_in'] as $key => $val) {
                $this->db->where_in($key, $val);
            }
        }

        if (array_key_exists('where_not_in', $params)) {
            foreach ($params['where_not_in'] as $key => $val) {
                $this->db->where_not_in($key, $val);
            }
        }

        $order = $direction = "";
        if (array_key_exists('order', $params)) {
            $order = $params['order'];
        }

        if (array_key_exists('direction', $params)) {
            $direction = $params['direction'];
        }

        if ($order != "" && $direction != "") {
            $this->db->order_by($order, $direction);
        }

        if (array_key_exists('group_by', $params)) {
            if (!empty($params['group_by'])) {
                $this->db->group_by($params['group_by']);
            }
        }

        if (array_key_exists('returnType', $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else if (array_key_exists('returnType', $params) && in_array($params['returnType'], array('sum', 'min', 'max'))) {
            $query = $this->db->get();
            $result = $query->row();
        } else {
            if (array_key_exists('id', $params) || isset($params['returnType']) && $params['returnType'] == 'single') {
                if (!empty($params['id'])) {
                    $this->db->where('id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row();
            } else {
                if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                //echo '<pre>'; echo $this->db->last_query(); exit;
                $result = ($query->num_rows() > 0) ? $query->result() : FALSE;
            }


        }

        // Return fetched data
        return $result;
    }

    public function delete_all($tables, $columnname, $conditionvalue){
        $this->db->where($columnname, $conditionvalue);
        $this->db->delete($tables);
    }

    public function getColumn($col, $key, $value, $table) {
        $query = $this->db->select($col)
            ->from($table)
            ->where($key, $value)
            ->get();

        $num_rows = $query->num_rows();
        $row = $query->row();

        return $num_rows ? $row->$col : false;
    }

    public function mail($args = array()) {
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $this->email->set_newline("\r\n");

        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $title = isset($args['title']) && !empty($args['title']) ? $args['title'] : "AA LABELS";
        $cc = isset($args['cc']) && !empty($args['cc']) ? $args['cc'] : false;
        $bcc = isset($args['bcc']) && !empty($args['bcc']) ? $args['bcc'] : false;
        $file = isset($args['file']) ? $args['file'] : false;

        $this->email->from($args['from'], $title);
        $this->email->to($args['to']);

        if ($cc) {
            $this->email->cc($cc);
        }

        if ($bcc) {
            $this->email->bcc($bcc);
        }
        
        if ($file) {
            $this->email->attach($file);
        }

        $this->email->subject($args['subject']);
        $this->email->message($args['message']);

        return $this->email->send(FALSE);
    }
    
}
