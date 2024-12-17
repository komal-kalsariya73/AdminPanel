<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function create()
    {
        
        return view('category/create');
    }

    public function insert()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'category' => 'required|min_length[3]|is_unique[category.category]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors(),
            ]);
        }

        $this->categoryModel->save([
            'category' => $this->request->getPost('category'),
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Category added successfully!',
        ]);
    }

    public function fetchAll()
    {
        $categories = $this->categoryModel->findAll();
        return $this->response->setJSON($categories);
    }

    public function fetchCategory($id)
    {
        $category = $this->categoryModel->find($id);

        if ($category) {
            return $this->response->setJSON(['success' => true, 'data' => $category]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Category not found.']);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();

        $rules = [
            'category' => "required|min_length[3]|is_unique[category.category,id,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }

        $this->categoryModel->update($id, ['category' => $this->request->getPost('category')]);

        return $this->response->setJSON(['success' => true, 'message' => 'Category updated successfully!']);
    }

   public function delete($id)
{
    // Ensure category exists before attempting to delete
    if ($this->categoryModel->find($id)) {
        // Add a where clause to specify the category to delete
        $this->categoryModel->where('id', $id)->delete();
        return $this->response->setJSON(['success' => true, 'message' => 'Category deleted successfully.']);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'Category not found.']);
}

}
