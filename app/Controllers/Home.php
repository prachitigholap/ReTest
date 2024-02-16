<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{




// php first version
    public function index()
    {
            $model = new CommonModel();
            $result = $model->selectRecord("merged");
            // echo "<pre>";
            // echo json_encode($fetchRecord);
            // print_r($result);
            $data['title'] = "Select Page";
            $data['result'] = $result;
            // $data['result'] = $result->paginate(10);
            // $data['pager'] = $result->pager;
            return view('welcome_message', $data);        
    }  
    
    public function search()
    {
            $model = new CommonModel();
            $name = $this->request->getPost('product_name'); 
            $data = $model->getdata($name); 
            return view('welcome_message', ['data' => $data]); 
    }     
    
}
