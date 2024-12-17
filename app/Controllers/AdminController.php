<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;

class AdminController extends Controller
{
    public function index()
    {
        // return view('admin/dashbord', ['title' => 'Dashbord']);

        
        $customerModel = new CustomerModel();
        $eventModel = new ProductModel();
        $bookingModel = new OrderModel();

        $totalCustomers = $customerModel->countAllResults();
        $totalEvents = $eventModel->countAllResults();
        $totalBookings = $bookingModel->countAllResults();

        return view('admin/dashbord', [
            'totalCustomers' => $totalCustomers,
            'totalEvents' => $totalEvents,
            'totalBookings' => $totalBookings,
          
            'title' => 'Dashboard',
        ]);

    }



    public function getOrders()
    {
        $orderModel = new OrderModel();
        $customerModel = new CustomerModel();
        $productModel = new ProductModel();

        
        $orders = $orderModel->select('order.id, customer.name as customer_name, product.name as product_name, order.quantity, product.price, customer.pincode, customer.address, order.order_date, order.order_status')
            ->join('customer', 'order.customer_id = customer.id')
            ->join('product', 'order.product_id = product.id')
            ->findAll();

        return $this->response->setJSON($orders);
    }

}

?>