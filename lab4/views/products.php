<h2>Sản phẩm theo danh mục: <?= $categoryName ?></h2>
<ul>
<?php foreach ($products as $sp): ?>
    <li><?= $sp['name'] ?> - <?= number_format($sp['price']) ?> VNĐ</li>
<?php endforeach; ?>
</ul>