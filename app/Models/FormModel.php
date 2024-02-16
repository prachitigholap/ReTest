<?php 
namespace App\Models;
use CodeIgniter\Model;
class FormModel extends Model
{
    protected $table = 'merged';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'product_description', 'product_category', 'veg_non_veg', 'topping_name', 'group_name'];  

function getdata($name)
{
    $db = \Config\Database::connect();
    $builder = $this->table('merged');
    $builder->select('*');  
    $builder->where('product_name', $name);
        $query = $builder->get();
         echo $db->getLastQuery();
         return $query->getResult();
}


function getcategorydata($product_category, $where=array())
{
    $db = \Config\Database::connect();
    $builder = $this->table('merged');
    $builder->select('*');  
    $builder->where('product_category', $product_category);
        $query = $builder->get();
         echo $db->getLastQuery();
         return $query->getResult();
}

function getvegnonveg($veg_non_veg, $where=array())
{
    $db = \Config\Database::connect();
    $builder = $this->table('merged');
    $builder->select('*');  
    $builder->where('veg_non_veg', $veg_non_veg);
        $query = $builder->get();
         echo $db->getLastQuery();
         return $query->getResult();
}

function gettopping($topping, $where=array())
{
    $db = \Config\Database::connect();
    $builder = $this->table('merged');
    $builder->select('*');  
    $builder->where('topping_name', $topping);
        $query = $builder->get();
         echo $db->getLastQuery();
         return $query->getResult();
}

    // public function getProductCategories()
    // {
    //     return $this->distinct()->findAll('product_category');
    // }

    // MODEL OF ALL FILTER CATEGORIES TOGETHER
    // public function getFilteredData($filters = [])
    // {
    //     $builder = $this->table($this->table);
    //     $builder->select('*');

    //     // Apply filters dynamically
    //     foreach ($filters as $key => $value) {
    //         if (!empty($value)) {
    //             $builder->where($key, $value);
    //         }
    //     }

    //     $query = $builder->get();
    //     return $query->getResult();
    // }

}