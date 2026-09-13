<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f4f5fb;
            color: #1e1b4b;
        }
        .navbar {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(79,70,229,0.25);
        }
        .navbar h1 { font-size: 20px; font-weight: 700; }
        .user-info { display: flex; align-items: center; gap: 14px; font-size: 14px; }
        .user-info strong { font-weight: 700; }
        .btn-logout {
            background: rgba(255,255,255,0.15);
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.25); }

        .container { max-width: 1100px; margin: 0 auto; padding: 32px 24px; }

        .top-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .top-row h2 { font-size: 22px; }
        .btn-add {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(79,70,229,0.3);
            transition: transform 0.15s;
            display: inline-block;
        }
        .btn-add:hover { transform: translateY(-1px); }

        .card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(30,27,75,0.06);
            overflow: hidden;
        }
        table { width: 100%; border-collapse: collapse; }
        th {
            background: #f9fafb;
            text-align: left;
            padding: 14px 18px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            border-bottom: 1px solid #eef0f7;
        }
        td {
            padding: 16px 18px;
            font-size: 14px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafafe; }
        .price { font-weight: 700; color: #16a34a; }
        .empty { text-align: center; padding: 40px; color: #9ca3af; }

        .actions { display: flex; gap: 8px; }
        .btn { padding: 6px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600; }
        .btn-edit { background: #fef3c7; color: #92400e; }
        .btn-edit:hover { background: #fde68a; }
        .btn-delete { background: #fee2e2; color: #991b1b; }
        .btn-delete:hover { background: #fecaca; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>📦 Product Manager</h1>
        <div class="user-info">
            <span>Logged in as <strong><?= html_escape($username) ?></strong></span>
            <a class="btn-logout" href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="top-row">
            <h2>Products</h2>
            <a class="btn-add" href="<?= site_url('products/create') ?>">+ Add Product</a>
        </div>

        <div class="card">
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
                            <td>#<?= html_escape($product['id']) ?></td>
                            <td><strong><?= html_escape($product['product_name']) ?></strong></td>
                            <td><?= html_escape($product['description']) ?></td>
                            <td class="price">₱<?= number_format((float) $product['price'], 2) ?></td>
                            <td><?= html_escape($product['quantity']) ?></td>
                            <td><?= html_escape($product['created_at']) ?></td>
                            <td>
                                <div class="actions">
                                    <a class="btn btn-edit" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a>
                                    <a class="btn btn-delete" href="<?= site_url('products/delete/' . $product['id']) ?>"
                                       onclick="return confirm('Delete this product?');">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="empty">No products yet. Click "+ Add Product" to get started.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>