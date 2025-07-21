<?php
require_once './models/CategoryModel.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new CategoryModel();
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $category = $this->model->getCategoryById($id);
            $products = $this->model->getProductsByCategory($id);
            $categoryName = $category['name'];
            require './views/products.php';
        } else {
            echo "Thiếu ID danh mục!";
        }
    }
}