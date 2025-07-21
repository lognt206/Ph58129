<?php
require_once './commons/env.php';
require_once './commons/function.php';
require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';
require_once './models/ProductModel.php';
require_once './models/CategoryModel.php';

// 👇 BỔ SUNG DÒNG NÀY ĐỂ KHAI BÁO BIẾN
$act = $_GET['act'] ?? '/';

if ($act == '/') {
    (new ProductController())->Home();
} else if ($act == 'product-detail') {
    (new ProductController())->Detail();
} else if ($act == 'category') {
    (new CategoryController())->show();
} else if ($act == 'dangky') {
    require './views/dangky.php';
} else if ($act == 'dangnhap') {
    require './views/dangnhap.php';
} else if ($act == 'gioithieu') {
    require './views/gioithieu.php';
} else if ($act == 'lienhe') {
    require './views/lienhe.php';
} else {
    echo "404 - Không tìm thấy trang";
}
