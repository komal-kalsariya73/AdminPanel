<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customer_id', 'product_id', 'quantity', 'order_date', 'total', 'order_status'
    ];

   
}

?>
