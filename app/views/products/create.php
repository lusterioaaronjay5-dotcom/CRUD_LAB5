<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f4f5fb;
            color: #1e1b4b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #fff;
            width: 100%;
            max-width: 460px;
            border-radius: 16px;
            padding: 36px;
            box-shadow: 0 10px 40px rgba(30,27,75,0.1);
        }
        .icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            margin-bottom: 16px;
        }
        h2 { font-size: 20px; margin-bottom: 4px; }
        .subtitle { color: #6b7280; font-size: 13px; margin-bottom: 24px; }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            margin-top: 16px;
        }
        input, textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s;
        }
        input:focus, textarea:focus { outline: none; border-color: #4f46e5; }
        .row { display: flex; gap: 12px; }
        .row > div { flex: 1; }
        .actions { display: flex; gap: 10px; margin-top: 26px; }
        button {
            flex: 1;
            padding: 12px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { opacity: 0.9; }
        .btn-cancel {
            flex: 1;
            padding: 12px;
            background: #f3f4f6;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        .btn-cancel:hover { background: #e5e7eb; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">+</div>
        <h2>Add New Product</h2>
        <p class="subtitle">Fill in the details below to add a product to your inventory.</p>

        <form method="post" action="<?= site_url('products/create') ?>">
            <label>Product Name</label>
            <input type="text" name="product_name" required placeholder="e.g. Wireless Mouse">

            <label>Description</label>
            <textarea name="description" rows="3" placeholder="Brief description of the product"></textarea>

            <div class="row">
                <div>
                    <label>Price</label>
                    <input type="number" step="0.01" min="0" name="price" required placeholder="0.00">
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" min="0" name="quantity" required placeholder="0">
                </div>
            </div>

            <div class="actions">
                <a class="btn-cancel" href="<?= site_url('products') ?>">Cancel</a>
                <button type="submit">Save Product</button>
            </div>
        </form>
    </div>
</body>
</html>