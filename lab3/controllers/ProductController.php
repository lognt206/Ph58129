<?php
require_once './models/ProductModel.php';

class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $title = "Trang chủ";
        $thoiTiet = "Hôm nay trời nắng đẹp";

        $products = $this->modelProduct->getAllProducts();
        require_once './views/trangchu.php';
    }

    public function Detail()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $product = $this->modelProduct->getProductById($id);
            if ($product) {
                require_once './views/product_detail.php';
            } else {
                echo "Sản phẩm không tồn tại!";
            }
        } else {
            echo "Thiếu ID sản phẩm!";
        }
    }
}
