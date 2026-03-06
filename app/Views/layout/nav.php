<artifact identifier="fintrack-dashboard" type="text/html" title="FinTrack Professional Dashboard">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - Financial Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #3b82f6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --sidebar-width: 260px;
            --sidebar-collapsed: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            overflow-x: hidden;
        }

        /* Top Navbar */
        .top-navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            padding: 0;
            height: 65px;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            height: 100%;
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-bar {
            flex: 0 1 400px;
        }

        .search-bar input {
            background-color: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            color: #fff;
            border-radius: 25px;
            padding: 8px 20px;
        }

        .search-bar input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-bar input:focus {
            background-color: rgba(255,255,255,0.25);
            color: #fff;
            box-shadow: none;
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-actions .btn-icon {
            background-color: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: all 0.3s;
        }

        .navbar-actions .btn-icon:hover {
            background-color: rgba(255,255,255,0.25);
        }

        .badge-notification {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger-color);
            color: #fff;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .user-profile:hover {
            background-color: rgba(255,255,255,0.15);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #fff;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 65px;
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - 65px);
            background-color: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            transition: width 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1020;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            padding: 1rem 1.5rem 0.5rem;
            letter-spacing: 0.5px;
        }

        .sidebar.collapsed .nav-section-title {
            display: none;
        }

        .sidebar .nav-link {
            color: #4b5563;
            font-weight: 500;
            padding: 12px 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            border-left: 3px solid transparent;
            margin: 2px 0;
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
            min-width: 24px;
        }

        .sidebar .nav-link:hover {
            background-color: #f3f4f6;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .sidebar .nav-link.active {
            background-color: #eff6ff;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            font-weight: 600;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 0;
        }

        .toggle-sidebar {
            position: absolute;
            bottom: 20px;
            right: -15px;
            width: 30px;
            height: 30px;
            background-color: var(--primary-color);
            border: none;
            border-radius: 50%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            z-index: 1030;
        }

        /* Main Content */
        .content {
            margin-left: var(--sidebar-width);
            padding: 90px 30px 30px 30px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .content.expanded {
            margin-left: var(--sidebar-collapsed);
        }

        /* Stats Cards */
        .stats-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            background: #fff;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .stats-card .card-body {
            padding: 1.5rem;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stats-icon.blue {
            background-color: #dbeafe;
            color: var(--primary-color);
        }

        .stats-icon.green {
            background-color: #d1fae5;
            color: var(--success-color);
        }

        .stats-icon.orange {
            background-color: #fed7aa;
            color: var(--warning-color);
        }

        .stats-icon.red {
            background-color: #fee2e2;
            color: var(--danger-color);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0.5rem 0;
        }

        .stats-label {
            color: #6b7280;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stats-change {
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .stats-change.positive {
            color: var(--success-color);
        }

        .stats-change.negative {
            color: var(--danger-color);
        }

        /* Chart Card */
        .chart-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            background: #fff;
        }

        .chart-card .card-header {
            background-color: transparent;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chart-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        /* Table */
        .table-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            background: #fff;
        }

        .table-card .table {
            margin: 0;
        }

        .table-card thead {
            background-color: #f9fafb;
        }

        .table-card th {
            font-weight: 600;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
            padding: 1rem;
        }

        .table-card td {
            padding: 1rem;
            vertical-align: middle;
            color: #1f2937;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-badge.success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-badge.pending {
            background-color: #fed7aa;
            color: #92400e;
        }

        .status-badge.failed {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Action Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quick-action-btn {
            flex: 1;
            padding: 1rem;
            border-radius: 12px;
            border: 2px dashed #cbd5e1;
            background-color: #fff;
            color: #64748b;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
        }

        .quick-action-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: #eff6ff;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .navbar-content {
                padding: 0 1rem;
            }

            .search-bar {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 90px 15px 15px 15px;
            }

            .quick-actions {
                flex-direction: column;
            }

            .stats-value {
                font-size: 1.5rem;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar top-navbar">
        <div class="navbar-content w-100">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-icon d-lg-none" id="mobileSidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <i class="bi-graph-up-arrow"></i>
                    FinTrack
                </a>
            </div>

            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search transactions, accounts...">
            </div>

            <div class="navbar-actions">
                <button class="btn btn-icon">
                    <i class="bi bi-bell"></i>
                    <span class="badge-notification">5</span>
                </button>
                <button class="btn btn-icon">
                    <i class="bi bi-envelope"></i>
                    <span class="badge-notification">12</span>
                </button>
                <div class="user-profile">
                    <div class="user-avatar">JD</div>
                    <div class="d-none d-md-block">
                         <!-- <?= esc(session('username') ?? 'Guest') ?> -->
                        <div style="font-size: 0.85rem; font-weight: 600;">John Doe</div>
                        <div style="font-size: 0.75rem; opacity: 0.8;">Admin</div>
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <button class="toggle-sidebar" id="sidebarToggle">
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="sidebar-header">

            <a class="btn btn-primary w-100" style="border-radius: 8px;" href="<?=base_url('transaction')?>"  >
                <i class="bi bi-plus-lg"></i>
                <span>New Transaction</span>
            </a>
        </div>

        <div class="nav-section-title">Main Menu</div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="<?= base_url('/dashboard') ?>">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-link" href="<?=base_url('/income_list')?>">
                <i class="bi bi-receipt"></i>
                <span>income </span>
            </a>
            <a class="nav-link" href="<?=base_url('/expense_list')?>">
                <i class="bi bi-receipt"></i>
                <span>expense</span>
            </a>
            <a class="nav-link" href="<?=base_url('/soareport')?>">
                <i class="bi bi-bar-chart-line"></i>
                <span>Statement of Account</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-wallet2"></i>
                <span>Accounts</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-arrow-left-right"></i>
                <span>Transactions</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-credit-card"></i>
                <span>Cards</span>
            </a>
            
        </nav>

        <div class="nav-section-title">Analytics</div>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">
                <i class="bi bi-bar-chart-line"></i>
                <span>Reports</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-pie-chart"></i>
                <span>Budget</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-graph-up"></i>
                <span>Insights</span>
            </a>
        </nav>

        <div class="nav-section-title">Management</div>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">
                <i class="bi bi-people"></i>
                <span>Clients</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-tags"></i>
                <span>Categories</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </nav>

        <div class="nav-section-title" style="margin-top: 2rem;">Account</div>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-shield-check"></i>
                <span>Security</span>
            </a>
            <a class="nav-link" style="color: var(--danger-color);" href="<?= base_url('/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
   
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar Toggle
            sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
        
        if (sidebar.classList.contains('collapsed')) {
            toggleIcon.classList.remove('bi-chevron-left');
            toggleIcon.classList.add('bi-chevron-right');
        } else {
            toggleIcon.classList.remove('bi-chevron-right');
            toggleIcon.classList.add('bi-chevron-left');
        }
    });

    mobileSidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });

    // Close sidebar on mobile when clicking outside
    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 992) {
            if (!sidebar.contains(e.target) && !mobileSidebarToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        }
    });
</script>
