<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

    public function __construct() { 
        parent::__construct(); 
        $this->load->model('Contactusmodel');
        $this->load->model('Commonmodel');
    }

    public function index() {
        $data['page_title'] = 'Fragomen | Contact Us';
        $data['contactus_active'] ="nav-active";
        $data['page'] = 'contactus/contactusList';
        $this->load->view('page', $data);
    }

    public function contactus_list(){
        $limit = $this->input->post('length');
        $start = $this->input->post('start');

        $totalData = $this->Contactusmodel->all_contactus_count();

        $totalFiltered = $totalData; 

        if (empty($this->input->post('search')['value'])) {            
            $results = $this->Contactusmodel->all_contactus($limit, $start);
        }
        else {
            $search = trim($this->input->post('search')['value']);  
            $results =  $this->Contactusmodel->contactus_search($limit,$start,$search);
            $totalFiltered = $this->Contactusmodel->contactus_search_count($search);
        }

        $data = array();
        if (!empty($results)) {
            foreach ($results as $row) {
                $action = '<center class="">';
                $action .= '
                    <button class="btn btn-outline-complete" style="width: 90px;" id="delete"  data-id="'.$row->id.'">
                        Delete
                    </button>';

                $action .= '</center>';

                $nestedData['name'] = $row->name;
                $nestedData['subject'] = $row->subject;
                $nestedData['message'] = $row->message;
                $nestedData['date'] = $row->date;
                $nestedData['Action'] = $action;

                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );

        echo json_encode($json_data); 
    }

    public function add() {
        $data['page_title'] = 'Fragomen | Contact Us';
        $data['contactus_active'] ="nav-active";
        $data['page'] = 'contactus/add';
        $this->load->view('page', $data);
    }
    public function insert() {
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $data = array('name' => $name, 'subject' => $subject, 'message' => $message, 'date' => date('Y-m-d H:i:s') );

        $this->Commonmodel->insert('contactus', $data);

        $this->session->set_flashdata("message_type", "success");   
        $this->session->set_flashdata("message", "Your query has been received. HR will contact you soon... Thanks");
        redirect('contactus/add');    
    }

    public function hr_documents() {
        $data['page_title'] = 'Fragomen | HR Documents';
        $data['hr_doc_active'] ="nav-active";
        $data['page'] = 'contactus/hrDocument';
        $this->load->view('page', $data);
    }

    public function delete() {
        $id = $this->input->post('id');
        $this->Commonmodel->delete('contactus', 'id', $id);

        $result = array('success' => true );
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

}
