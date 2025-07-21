<?php include './views/layouts/header.php'; ?>

<h2>Sản phẩm thuộc danh mục: <?= $category['name'] ?? '' ?></h2>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $p): ?>
            <li>
                <?= $p['name'] ?> - <?= number_format($p['price']) ?> VNĐ
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Không có sản phẩm nào trong danh mục này.</p>
<?php endif; ?>

<a href="index.php?act=category-list">← Quay lại danh mục</a>

<?php include './views/layouts/footer.php'; ?>
