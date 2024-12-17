<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;

class OrderController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();

        // Load all customers and products
        $data['customers'] = $customerModel->findAll();
        $data['products'] = $productModel->findAll();

        return view('order/view', $data);
    }

    public function addOrder()
    {
        $orderModel = new OrderModel();
        
        
        $data = $this->request->getJSON();

        
        $orderData = [
            'customer_id' => $data->customer_id,
            'product_id' => $data->product_id,
            'quantity' => $data->quantity,
            'order_date' => date('Y-m-d H:i:s'),
            'total' => $data->total,
            'order_status' => 'Pending'
        ];

        $orderModel->insert($orderData);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Order added successfully']);
    }


    public function getProductPrice($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        return $this->response->setJSON(['price' => $product['price']]);
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

    
    public function display()
    {
        return view('order/views'); 
    }
    public function delete($id)
    {
        $orderModel = new OrderModel();
        $order = $orderModel->find($id); 

        if ($order) {
            if ($orderModel->delete($id)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Order deleted successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete the order.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Order not found.']);
        }
    }
    public function viewdetail()
    {
        return view('order/details'); 
    }
    public function getOrderDetails($orderId)
    {
        $orderModel = new OrderModel();

        
        $orderDetails = $orderModel->getOrderDetails($orderId);

        
        if (!$orderDetails) {
            return $this->response->setJSON(['error' => 'Order not found']);
        }

        
        return $this->response->setJSON(['order' => $orderDetails]);
    }

    public function fetchBookingDetails($id)
    {
        $orderModel = new OrderModel();
        $customerModel = new CustomerModel();
        $productModel = new ProductModel();
    
        
        $order = $orderModel
            ->select('order.id, customer.name as customer_name, customer.lastname, customer.gender, customer.city, customer.pincode, customer.phone, customer.address, product.name as product_name, product.price, order.quantity, order.total')
            ->join('customer', 'order.customer_id = customer.id')
            ->join('product', 'order.product_id = product.id')
            ->where('order.id', $id)
            ->first();
    
        if ($order) {
            return $this->response->setJSON(['success' => true, 'data' => $order]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Order not found']);
        }
    }
    }




?>