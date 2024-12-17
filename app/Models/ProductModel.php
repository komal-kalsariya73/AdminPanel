<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product'; // Ensure this matches your database table
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name', 'description', 'image', 'price', 'category_id', 'quantity', 'stock'
    ];

 
}
