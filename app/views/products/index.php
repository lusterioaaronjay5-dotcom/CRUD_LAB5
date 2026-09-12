<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f0f0f0; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; }
        .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; text-decoration: none; color: #fff; }
        .btn-add { background: #2d6cdf; }
        .btn-edit { background: #e0a800; }
        .btn-delete { background: #d9534f; }
        .btn-logout { background: #555; }
    </style>
</head>
<body>
    <div class="top-bar">
        <h2>Products</h2>
        <div>
            <span>Logged in as <strong><?= html_escape($username) ?></strong></span>
            &nbsp;|&nbsp;
            <a class="btn btn-logout" href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </div>

    <p><a class="btn btn-add" href="<?= site_url('products/create') ?>">+ Add Product</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= html_escape($product['id']) ?></td>
                    <td><?= html_escape($product['product_name']) ?></td>
                    <td><?= html_escape($product['description']) ?></td>
                    <td><?= number_format((float) $product['price'], 2) ?></td>
                    <td><?= html_escape($product['quantity']) ?></td>
                    <td><?= html_escape($product['created_at']) ?></td>
                    <td>
                        <a class="btn btn-edit" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a>
                        <a class="btn btn-delete" href="<?= site_url('products/delete/' . $product['id']) ?>"
                           onclick="return confirm('Delete this product?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No products yet.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>