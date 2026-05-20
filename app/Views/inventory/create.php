<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Syne:wght@600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f0ede6;
            --surface: #faf9f6;
            --border: #d8d3c8;
            --border-focus: #3d3580;
            --text-primary: #1a1816;
            --text-secondary: #6b6560;
            --text-muted: #9c9690;
            --accent: #2a2420;
            --orange: #e2501a;
            --orange-hover: #c44415;
            --indigo: #3d3580;
            --indigo-light: #ededfa;
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
            border-bottom: 3px solid var(--orange);
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
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 56px 24px;
        }

        .form-wrapper {
            width: 100%;
            max-width: 520px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 28px;
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb a:hover { color: var(--text-secondary); }

        .breadcrumb-sep { opacity: 0.4; }

        .breadcrumb-current { color: var(--text-secondary); }

        /* Card */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05), 0 8px 32px rgba(0,0,0,0.04);
        }

        .form-card-header {
            padding: 28px 32px 24px;
            border-bottom: 1px solid var(--border);
            background: var(--bg);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .form-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--indigo-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .form-card-icon svg {
            width: 20px;
            height: 20px;
            color: var(--indigo);
        }

        .form-card-title {
            font-family: 'Syne', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .form-card-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .form-body {
            padding: 28px 32px 32px;
        }

        /* Inputs */
        .input-group {
            margin-bottom: 22px;
        }

        label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            letter-spacing: 0.01em;
        }

        label .req {
            color: var(--orange);
            font-size: 16px;
            line-height: 1;
        }

        label svg {
            width: 13px;
            height: 13px;
            color: var(--text-muted);
        }

        input {
            width: 100%;
            padding: 13px 16px;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--text-primary);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder { color: var(--text-muted); font-size: 13px; }

        input:focus {
            outline: none;
            border-color: var(--border-focus);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(61, 53, 128, 0.1);
        }

        /* Two columns for SKU + Category */
        .input-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 24px 0;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            gap: 12px;
        }

        .btn-primary {
            flex: 1;
            background: var(--orange);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary:hover { background: var(--orange-hover); transform: translateY(-1px); }
        .btn-primary:active { transform: translateY(0); }

        .btn-primary svg { width: 16px; height: 16px; }

        .btn-secondary {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            padding: 14px 20px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background 0.15s;
        }

        .btn-secondary:hover { background: var(--bg); }
    </style>
</head>
<body>

<div class="topbar">
    <span class="topbar-brand">&#9632; Warehouse OS</span>
    <span class="topbar-meta">INVENTORY MODULE &nbsp;/&nbsp; v2.1</span>
</div>

<div class="page">
    <div class="form-wrapper">

        <nav class="breadcrumb">
            <a href="/inventory">Inventory</a>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current">Add Product</span>
        </nav>

        <div class="form-card">

            <div class="form-card-header">
                <div class="form-card-icon">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="5" width="14" height="12" rx="1.5"/>
                        <path d="M7 5V3.5a3 3 0 016 0V5"/>
                        <line x1="10" y1="9" x2="10" y2="14"/>
                        <line x1="7.5" y1="11.5" x2="12.5" y2="11.5"/>
                    </svg>
                </div>
                <div>
                    <h1 class="form-card-title">Add Product</h1>
                    <p class="form-card-subtitle">Register a new item to inventory</p>
                </div>
            </div>

            <div class="form-body">
                <form action="/inventory/store" method="POST">

                    <div class="input-group">
                        <label for="product_name">
                            <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                <path d="M2 10V4l4.5-2L11 4v6l-4.5 2L2 10z"/>
                            </svg>
                            Product Name <span class="req">*</span>
                        </label>
                        <input type="text" id="product_name" name="product_name" placeholder="e.g. Heavy-Duty Storage Rack">
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label for="sku">
                                <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                    <rect x="1" y="3" width="11" height="7" rx="1"/>
                                    <line x1="4" y1="3" x2="4" y2="10"/>
                                    <line x1="7" y1="3" x2="7" y2="10"/>
                                    <line x1="10" y1="3" x2="10" y2="10"/>
                                </svg>
                                SKU <span class="req">*</span>
                            </label>
                            <input type="text" id="sku" name="sku" placeholder="e.g. WH-0042">
                        </div>
                        <div class="input-group">
                            <label for="category">
                                <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                    <path d="M1.5 4.5h4v-3h-4v3zM7.5 4.5h4v-3h-4v3zM1.5 11.5h4v-3h-4v3zM7.5 11.5h4v-3h-4v3z"/>
                                </svg>
                                Category
                            </label>
                            <input type="text" id="category" name="category" placeholder="e.g. Storage">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="quantity">
                            <svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                <rect x="2" y="2" width="9" height="9" rx="1"/>
                                <line x1="6.5" y1="5" x2="6.5" y2="8"/>
                                <line x1="5" y1="6.5" x2="8" y2="6.5"/>
                            </svg>
                            Quantity <span class="req">*</span>
                        </label>
                        <input type="number" id="quantity" name="quantity" min="0" placeholder="0">
                    </div>

                    <hr class="divider">

                    <div class="form-actions">
                        <a href="/inventory" class="btn-secondary">Cancel</a>
                        <button type="submit" class="btn-primary">
                            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,8 6,12 14,4"/>
                            </svg>
                            Save Product
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>

</body>
</html>