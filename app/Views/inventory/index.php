<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Inventory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f0ede6;
            --surface: #faf9f6;
            --border: #d8d3c8;
            --border-strong: #b8b2a5;
            --text-primary: #1a1816;
            --text-secondary: #6b6560;
            --text-muted: #9c9690;
            --accent: #2a2420;
            --accent-hover: #1a1614;
            --indigo: #3d3580;
            --indigo-light: #ededfa;
            --sky: #0b6ab0;
            --sky-light: #e3f0fa;
            --red: #b83232;
            --red-light: #fbe8e8;
            --green: #1e6e3a;
            --green-light: #e3f5ea;
            --amber: #8a5a00;
            --amber-light: #fef3db;
            --shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
        }

        .topbar {
            background: var(--accent);
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 56px;
            border-bottom: 3px solid #e2501a;
        }

        .topbar-brand {
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #f5f1ec;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .topbar-meta {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: #9c9080;
            letter-spacing: 0.06em;
        }

        .page {
            max-width: 1280px;
            margin: 0 auto;
            padding: 48px 40px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 36px;
        }

        .page-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .page-title {
            font-family: 'Syne', sans-serif;
            font-size: 38px;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e2501a;
            color: #fff;
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.1s;
        }

        .add-btn:hover { background: #c44415; transform: translateY(-1px); }
        .add-btn:active { transform: translateY(0); }

        .add-btn svg {
            width: 16px;
            height: 16px;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 20px 24px;
        }

        .stat-label {
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
        }

        .table-toolbar-title {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            font-weight: 500;
            color: var(--text-secondary);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 7px 12px;
        }

        .search-box svg {
            width: 14px;
            height: 14px;
            color: var(--text-muted);
            flex-shrink: 0;
        }

        .search-box input {
            border: none;
            background: transparent;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            color: var(--text-primary);
            outline: none;
            width: 180px;
        }

        .search-box input::placeholder { color: var(--text-muted); }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: var(--bg);
            border-bottom: 1px solid var(--border);
        }

        th {
            padding: 12px 20px;
            text-align: left;
            font-family: 'DM Mono', monospace;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            color: var(--text-primary);
        }

        tr:last-child td { border-bottom: none; }

        tbody tr:hover td { background: #f5f3ef; }

        .td-id {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--text-muted);
        }

        .td-product {
            font-weight: 500;
            font-size: 14px;
        }

        .td-sku {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--text-secondary);
        }

        .category-pill {
            display: inline-block;
            background: var(--amber-light);
            color: var(--amber);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .qty-value {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
            font-weight: 500;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.03em;
        }

        .badge::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .in-stock {
            background: var(--green-light);
            color: var(--green);
        }

        .in-stock::before { background: var(--green); }

        .low-stock {
            background: var(--red-light);
            color: var(--red);
        }

        .low-stock::before { background: var(--red); }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-edit, .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: opacity 0.15s, transform 0.1s;
        }

        .btn-edit {
            background: var(--sky-light);
            color: var(--sky);
            border: 1px solid #c0d8ef;
        }

        .btn-delete {
            background: var(--red-light);
            color: var(--red);
            border: 1px solid #efcccc;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
            transform: translateY(-1px);
        }

        .btn-edit svg, .btn-delete svg {
            width: 12px;
            height: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 16px;
            opacity: 0.25;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-muted);
        }
    </style>
</head>
<body>


<div class="page">

    <div class="page-header">
        <div class="page-title-group">
            <p class="page-eyebrow">Stock Management</p>
            <h1 class="page-title">Inventory</h1>
        </div>
        <a href="/inventory/create" class="add-btn">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="8" y1="2" x2="8" y2="14"/><line x1="2" y1="8" x2="14" y2="8"/>
            </svg>
            Add Product
        </a>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <p class="stat-label">Total Products</p>
            <p class="stat-value"><?= count($products); ?></p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Low Stock Items</p>
            <p class="stat-value" style="color: var(--red);"><?= count(array_filter($products, fn($p) => $p['quantity'] <= 5)); ?></p>
        </div>
        <div class="stat-card">
            <p class="stat-label">In Stock Items</p>
            <p class="stat-value" style="color: var(--green);"><?= count(array_filter($products, fn($p) => $p['quantity'] > 5)); ?></p>
        </div>
    </div>

    <div class="table-card">

        <div class="table-toolbar">
            <span class="table-toolbar-title">All Products</span>
            <div class="search-box">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <circle cx="6.5" cy="6.5" r="4.5"/><line x1="10" y1="10" x2="14" y2="14"/>
                </svg>
                <input type="text" placeholder="Search products...">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php if(empty($products)): ?>
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <svg class="empty-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="8" y="12" width="32" height="28" rx="2"/>
                                <line x1="16" y1="22" x2="32" y2="22"/>
                                <line x1="16" y1="29" x2="26" y2="29"/>
                            </svg>
                            <p>No products found. Add your first product to get started.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach($products as $product): ?>
                <tr>
                    <td class="td-id"><?= $product['id']; ?></td>
                    <td class="td-product"><?= $product['product_name']; ?></td>
                    <td class="td-sku"><?= $product['sku']; ?></td>
                    <td><span class="category-pill"><?= $product['category']; ?></span></td>
                    <td class="qty-value"><?= $product['quantity']; ?></td>
                    <td>
                        <?php if($product['quantity'] <= 10): ?>
                            <span class="badge low-stock">Low Stock</span>
                        <?php else: ?>
                            <span class="badge in-stock">In Stock</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="/inventory/edit/<?= $product['id']; ?>" class="btn-edit">
                                <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8.5 1.5L10.5 3.5L4 10H2V8L8.5 1.5Z"/>
                                </svg>
                                Edit
                            </a>
                            <a href="/inventory/delete/<?= $product['id']; ?>" class="btn-delete">
                                <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <polyline points="2,3 10,3"/><path d="M4,3V2h4v1"/><rect x="3" y="3" width="6" height="7" rx="1"/>
                                </svg>
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>