<?php
namespace App\Models;
use CodeIgniter\Model;

class CommonModel extends Model{
    protected $table = 'merged';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'product_description', 'product_category', 'veg_non_veg', 'topping_name', 'group_name'];


    // php first version
    public function selectRecord($table, $where=array()){
        $builder = $this->db->table($table);
        $builder -> select("*");
        // $builder->where(['product_category' => 'Pizza' , 'veg_non_veg' => 'Non-veg']);
        $result = $builder->get();
        // echo$this->db->getLastQuery();
        return $result->getResult();
    }
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


    public function selectRow($table, $where=array()){
        $builder = $this->db->table($table);
        $builder->where($where);
        $result = $builder->get();
        return $result->getRow();
    }

    // public function selectCategory(){
    //     $productcategories = ['Pizza', 'Burger'];
    //     $builder = $this->db->table($table);
    //     $builder -> select("*");
    //     $builder->whereIn('product_categories', $productcategories);
    //     $result = $builder->get();
    //     // echo$this->db->getLastQuery();
    //     return $result->getResult(); 
    // }

        // public function selectRecords($table, $where=array()){
    //     $builder = $this->db->table($table);
    //     $builder -> select("*");
    //     $builder -> where(['product_id' => 15]);
    //     $result = $builder->get();
    //     return $result->getResult();


    // }
    

}
?>