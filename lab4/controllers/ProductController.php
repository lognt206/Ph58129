<?php
require_once './models/ProductModel.php';

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }
    public function Home()
    {
        $title = "Chào mừng đến với trang chủ!";
        $thoiTiet = "Thời tiết hôm nay đẹp trời 🌤️";
        $products = $this->model->getAll(); // Lấy tất cả sản phẩm

        require './views/trangchu.php'; // Hiển thị giao diện trang chủ
    }


    public function Detail()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Không tìm thấy sản phẩm";
            return;
        }
        $product = $this->model->getById($id);
        if (!$product) {
            echo "Sản phẩm không tồn tại";
            return;
        }
        require './views/products/detail.php';
    }

    // Danh sách sản phẩm (có tìm kiếm, hiển thị tên danh mục)
    public function list()
    {
        $keyword = $_GET['keyword'] ?? '';
        $data = $this->model->getAllWithCategory($keyword); // dùng hàm mới
        require './views/products/list.php';
    }

    // Thêm sản phẩm (có dropdown danh mục)
    public function add()
    {
        $categories = $this->model->getAllCategories(); // lấy danh sách danh mục
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insert(
                $_POST['name'],
                $_POST['price'],
                $_POST['description'],
                $_POST['category_id']
            );
            header("Location: index.php?act=product-list");
        }
        require './views/products/add.php';
    }

    // Xoá sản phẩm
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?act=product-list");
    }

    // Sửa sản phẩm (có dropdown danh mục)
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $product = $this->model->getById($id);
        $categories = $this->model->getAllCategories(); // lấy danh sách danh mục
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update(
                $id,
                $_POST['name'],
                $_POST['price'],
                $_POST['description'],
                $_POST['category_id']
            );
            header("Location: index.php?act=product-list");
        }
        require './views/products/edit.php';
    }
}
