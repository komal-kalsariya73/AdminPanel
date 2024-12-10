<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;

class Customer extends Controller
{
    public function index()
    {
        return view('customer/view');
    }

    public function create()
    {
        return view('customer/create');
    }

    public function insert()
    {
        if ($this->request->getMethod() == 'post') {
            $validation = \Config\Services::validation();

            
            $validation->setRules([
                'name'     => 'required',
                'lastname' => 'required',
                'email'    => 'required|valid_email',
                'phone'    => 'required|numeric',
                'gender'   => 'required',
                'address'  => 'required',
                'pincode'  => 'required|numeric',
                'city'     => 'required',
                'image'    => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'
            ]);

        
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $validation->getErrors(),
                ]);
            }

            
            $file = $this->request->getFile('image');
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = 'uploads/' . $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $filePath);
            } else {
                $filePath = null; 
            }

            
            $model = new CustomerModel();
            $data = [
                'name'     => $this->request->getPost('name'),
                'lastname' => $this->request->getPost('lastname'),
                'email'    => $this->request->getPost('email'),
                'phone'    => $this->request->getPost('phone'),
                'gender'   => $this->request->getPost('gender'),
                'address'  => $this->request->getPost('address'),
                'pincode'  => $this->request->getPost('pincode'),
                'city'     => $this->request->getPost('city'),
                'image'    => $filePath
            ];

            
            if ($model->insert($data)) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'Customer added successfully!',
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to add customer.',
                ]);
            }
        }
    }
}
?>
