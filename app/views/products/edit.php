<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .box { max-width: 480px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; margin-top: 4px; }
        button { margin-top: 16px; padding: 10px 20px; background: #e0a800; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        a { display: inline-block; margin-top: 16px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Edit Product</h2>
        <form method="post" action="<?= site_url('products/edit/' . $product['id']) ?>">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?= html_escape($product['product_name']) ?>" required>

            <label>Description</label>
            <textarea name="description" rows="4"><?= html_escape($product['description']) ?></textarea>

            <label>Price</label>
            <input type="number" step="0.01" min="0" name="price" value="<?= html_escape($product['price']) ?>" required>

            <label>Quantity</label>
            <input type="number" min="0" name="quantity" value="<?= html_escape($product['quantity']) ?>" required>

            <button type="submit">Update Product</button>
        </form>
        <a href="<?= site_url('products') ?>">&larr; Back to list</a>
    </div>
</body>
</html>