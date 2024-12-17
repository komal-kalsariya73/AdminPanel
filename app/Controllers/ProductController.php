<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    public function index()
    {
        return view('product/view');
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        return view('product/create', ['categories' => $categories]);
    }
    public function getProducts()
    {
        $model = new ProductModel();
        
        $product = $model->findAll();
        
        return $this->response->setJSON($product);
    }

    public function fetchProduct($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if ($product) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $product
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'product not found.'
        ]);
    }
    public function addProduct()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $rules = [
                'name'        => 'required',
                'description' => 'required',
                'price'       => 'required|numeric',
                'stock'       => 'required|numeric',
                'quantity'    => 'required|numeric',
                'category'    => 'required',
                'image'       => 'uploaded[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png]'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors' => $validation->getErrors()
                ]);
            }

            // Handle image uploads
            $images = $this->request->getFileMultiple('image');
            $uploadedImages = [];

            foreach ($images as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(FCPATH . 'uploads', $newName);
                    $uploadedImages[] = $newName;
                }
            }

            $data = [
                'name'        => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price'       => $this->request->getPost('price'),
                'stock'       => $this->request->getPost('stock'),
                'quantity'    => $this->request->getPost('quantity'),
                'category_id' => $this->request->getPost('category'),
                'image'      => json_encode($uploadedImages),
            ];

            $productModel = new ProductModel();
            if ($productModel->save($data)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Product added successfully!'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to add product.'
                ]);
            }
        }

        return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();
        
        $rules = [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'quantity'    => 'required|numeric',
            'category'    => 'required',
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }
        
        $productModel = new ProductModel();
        $product = $productModel->find($id);
        
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found.']);
        }
    
      
$deleteImages = $this->request->getPost('delete_images');
$existingImages = json_decode($product['image'], true); 


$existingImages = is_array($existingImages) ? $existingImages : [];


if (!empty($deleteImages)) {
    $deleteImages = json_decode($deleteImages, true); 
    foreach ($deleteImages as $deleteImage) {
        if (($key = array_search($deleteImage, $existingImages)) !== false) {
            unset($existingImages[$key]);
            @unlink(FCPATH . 'uploads/' . $deleteImage); 
        }
    }
}

    
        $newImages = $this->request->getFileMultiple('image');
        if ($newImages) {
            foreach ($newImages as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(FCPATH . 'uploads', $newName);
                    $existingImages[] = $newName;
                }
            }
        }
    
        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'quantity'    => $this->request->getPost('quantity'),
            'category_id' => $this->request->getPost('category'),
            'image'       => json_encode(array_values($existingImages)), 
        ];
    
        if ($productModel->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Product updated successfully.']);
        }
    
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update product.']);
    }
    
    
    public function edit($id)
{
    $productModel = new ProductModel();
    $categoryModel = new CategoryModel();

    $product = $productModel->find($id);
    $categories = $categoryModel->findAll();

    if (!$product) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
    }

    return view('product/edit', [
        'product'    => $product,
        'categories' => $categories,
    ]);
}

    
    public function delete($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found.']);
        }

      

        $productModel->delete($id);
        return $this->response->setJSON(['success' => true, 'message' => 'Product deleted successfully.']);
    }

    public function display()
    {
        return view('product/display');
    }
   
    public function details($id)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel(); 
    
        
        $product = $productModel->find($id);
    
        if ($product) {
            
            $category = $categoryModel->find($product['category_id']);
            $product['category_name'] = $category ? $category['category'] : 'N/A'; 
    
            
            $images = json_decode($product['image'], true);
            $product['image_url'] = !empty($images) ? base_url('uploads/' . $images[0]) : null;
    
            return $this->response->setJSON($product);
        } else {
            return $this->response->setJSON(['error' => 'Product not found'], 404);
        }
    }
    
    
}
