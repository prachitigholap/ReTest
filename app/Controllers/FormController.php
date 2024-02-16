<?php 
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;
class FormController extends Controller
{
    public function search()
    {
    $model = new FormModel();
    $name = $this->request->getPost('product_name');
    $data = $model->getdata($name);
    return view('search_form', ['data' => $data]);
    //echo view('search_form', $data);
    //return view('my_results', ['data' => $data]);     
    //print_r($data);
    }

    public function categorysearch()
    {
    $model = new FormModel();
    $product_category = $this->request->getPost('product_category');
    $pdata = $model->getcategorydata($product_category);
    return view('search_form', ['data' => $pdata]);
    }

    public function vegnonvegsearch()
    {
    $model = new FormModel();
    $veg_non_veg = $this->request->getPost('veg_non_veg');
    $vnvdata = $model->getvegnonveg($veg_non_veg);
    return view('search_form', ['data' => $vnvdata]);
    }

    public function toppingsearch()
    {
    $model = new FormModel();
    $topping = $this->request->getPost('topping_name');
    $tdata = $model->gettopping($topping);
    return view('search_form', ['data' => $tdata]);
    }

    public function otherPage()
    {
        return view('search_form');
    }


    public function getalldb()
    {
    $model= new FormModel();
    $data = [
            'products' => $model->paginate(10),
            'pager' => $model->pager
        ];      
      //  return view('search_form', $data);
        return view('search_form', ['data' => $data]);
    }


    public function store() {
        helper(['form']);
        $rules = [
            'product_name' => 'required|min_length[3]',
            'product_description' => 'required|min_length[3]',
            'product_category' => 'required|min_length[3]',
            'veg_non_veg' => 'required|min_length[3]',
            'topping_name' => 'required|min_length[3]',
            'group_name' => 'required|min_length[3]'
        ];
          
        if($this->validate($rules)){
            $formModel = new FormModel();
            $data = [
                'product_name' => $this->request->getVar('product_name'),
                'product_description' => $this->request->getVar('product_description'),
                'product_category' => $this->request->getVar('product_category'),
                'veg_non_veg' => $this->request->getVar('veg_non_veg'),
                'topping_name' => $this->request->getVar('topping_name'),
                'group_name' => $this->request->getVar('group_name'),
                
            ];
            $formModel->save($data);
            return redirect()->to('/contact-form');
        }else{
            $data['validation'] = $this->validator;
            echo view('contact_form', $data);
        }        
    }

    // public function index()
    // {
    //     return view('search_form');
    // }
    

    // USING DISTINCT
    // public function getProductCategories()
    // {
    //     $mergedModel = new FormModel();
    //     $categories = $mergedModel->distinct()->findAll('product_category');
    //     return json_encode($categories);
    // }

    //FILTERING ALL CATEGORIES TOGETHER
    // public function filter()
    // {
    //     $model = new FormModel();
    //     // Collecting filters from the query string
    //     $filters = [
    //         'product_category' => $this->request->getVar('product_category'),
    //         'veg_non_veg' => $this->request->getVar('veg_non_veg'),
    //         'topping_name' => $this->request->getVar('topping_name'),
    //     ];
    //     // Cleaning up filters to remove null or empty values
    //     $filters = array_filter($filters, function ($value) {
    //         return ($value !== null && $value !== '');
    //     });
    //     // Fetching the filtered data
    //     $data = $model->getFilteredData($filters);
    //     // Returning the data as JSON
    //     return $this->respond($data);
    // }


    // public function index()
    // {
    //     $productModel = new FormModel();
    //     // $data['product_category'] = $productModel->getProductCategories();
    //     // return view('search_form', $data);
    //     // $idata= $productModel->getProductCategories();
    //     // return view('search_form', $data);
    //     $productModel = $this->request->getPost('product_category');
    //     $idata = $model->getProductCategories($productModel);
    //     return view('search_form', ['data' => $idata]);
    // }
}