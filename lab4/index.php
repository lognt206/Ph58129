<?php
require_once './commons/env.php';
require_once './commons/function.php';

// Models
require_once './models/ProductModel.php';
require_once './models/CategoryModel.php';

// Controllers
require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';

// Route
$act = $_GET['act'] ?? '/';

$controllerProduct = new ProductController();
$controllerCategory = new CategoryController();

switch ($act) {
    // Trang chủ
    case '/':
        $controllerProduct->Home(); // Gọi trang chủ
        break;

    // Trang chi tiết sản phẩm
    case 'product-detail':
        $controllerProduct->Detail();
        break;

    // Trang hiển thị sản phẩm theo danh mục
    case 'category':
        $controllerCategory->show();
        break;

    // Trang giới thiệu / liên hệ / đăng nhập / đăng ký
    case 'gioithieu':
    case 'lienhe':
    case 'dangky':
    case 'dangnhap':
        require "./views/{$act}.php";
        break;

    // CRUD danh mục
    case 'category-list':
        $controllerCategory->list();
        break;
    case 'category-add':
        $controllerCategory->add();
        break;
    case 'category-edit':
        $controllerCategory->edit();
        break;
    case 'category-delete':
        $controllerCategory->delete();
        break;

    // CRUD sản phẩm
    case 'product-list':
        $controllerProduct->list();
        break;
    case 'product-add':
        $controllerProduct->add();
        break;
    case 'product-edit':
        $controllerProduct->edit();
        break;
    case 'product-delete':
        $controllerProduct->delete();
        break;

    // Trang không tồn tại
    default:
        echo "404 - Không tìm thấy trang";
        break;
}
