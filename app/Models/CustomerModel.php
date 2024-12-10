<?php
namespace App\Models;
use CodeIgniter\model;

class CustomerModel extends Model{
    protected $table='customer';
    protected $primaryKey = 'id';
    protected $allowedFields=['name','lastname','email','city','pincode','phone','address','image','gender','created_at'];

    
}

?>