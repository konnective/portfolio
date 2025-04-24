<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3F51B5;
            --secondary-color: #7986CB;
            --light-color: #C5CAE9;
            --dark-color: #303F9F;
            --danger-color: #F44336;
            --success-color: #4CAF50;
            --warning-color: #FFC107;
            --info-color: #2196F3;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background-color: var(--primary-color);
            color: white;
            height: 100vh;
            position: fixed;
            padding: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.8rem 1rem;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-left: 3px solid white;
        }

        .sidebar .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        .sidebar-brand {
            height: 70px;
            display: flex;
            align-items: center;
            padding-left: 1rem;
            background-color: var(--dark-color);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.25rem;
            font-weight: 600;
            color: #4e73df;
        }

        .status-card {
            transition: transform 0.2s;
        }

        .status-card:hover {
            transform: translateY(-5px);
        }

        .status-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table th {
            font-weight: 600;
            background-color: #f8f9fc;
        }

        .progress {
            height: 0.8rem;
            margin-bottom: 0.5rem;
        }

        /* Status colors */
        .bg-arrival {
            background-color: var(--info-color);
        }

        .bg-departure {
            background-color: var(--warning-color);
        }

        .bg-stayover {
            background-color: var(--secondary-color);
        }

        .bg-dirty {
            background-color: var(--danger-color);
        }

        .bg-occupied {
            background-color: #FF9800;
        }

        .bg-clean {
            background-color: var(--success-color);
        }

        .bg-vacant {
            background-color: #00BCD4;
        }

        .bg-reserved {
            background-color: #9C27B0;
        }

        .bg-cancelled {
            background-color: #795548;
        }

        .bg-outoforder {
            background-color: #607D8B;
        }

        .text-arrival {
            color: var(--info-color);
        }

        .text-departure {
            color: var(--warning-color);
        }

        .text-stayover {
            color: var(--secondary-color);
        }

        .text-dirty {
            color: var(--danger-color);
        }

        .text-occupied {
            color: #FF9800;
        }

        .text-clean {
            color: var(--success-color);
        }

        .text-vacant {
            color: #00BCD4;
        }

        .text-reserved {
            color: #9C27B0;
        }

        .text-cancelled {
            color: #795548;
        }

        .text-outoforder {
            color: #607D8B;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar .nav-item {
                display: inline-block;
            }

            .sidebar .nav-link {
                padding: 0.5rem;
                border-left: none;
                border-bottom: 3px solid transparent;
            }

            .sidebar .nav-link.active {
                border-left: none;
                border-bottom: 3px solid white;
            }

            .navbar-toggler {
                display: block;
            }
        }

        .topbar {
            height: 70px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            background-color: white;
        }

        .dropdown-menu {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
        }

        .notification-dropdown {
            min-width: 20rem;
        }

        .dropdown-item:active {
            background-color: var(--primary-color);
        }

        .dropdown-divider {
            border-top: 1px solid #e3e6f0;
        }

        .room-type-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .badge {
            font-weight: 600;
        }

        .stats-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #858796;
        }

        .chart-area {
            position: relative;
            height: 300px;
            margin-top: 1rem;
        }

        .date-selector .form-select {
            width: auto;
        }

        .toggle-sidebar {
            display: none;
        }

        @media (max-width: 991px) {
            .sidebar {
                margin-left: -250px;
                transition: margin 0.25s ease-out;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
                transition: margin 0.25s ease-out;
            }

            .main-content.sidebar-open {
                margin-left: 250px;
            }

            .toggle-sidebar {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <h3><i class="fas fa-hotel me-2"></i> HotelPro</h3>
            </div>
            <div class="py-4">
                <div class="text-center mb-4">
                    <img src="/api/placeholder/100/100" class="rounded-circle" alt="User Avatar" width="80px">
                    <div class="mt-2 text-white">Admin User</div>
                    <div class="text-white-50 small">Hotel Manager</div>
                </div>

                <hr class="mx-3 bg-light">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-check me-2"></i> Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-door-open me-2"></i> Rooms
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users me-2"></i> Guests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-broom me-2"></i> Housekeeping
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-concierge-bell me-2"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line me-2"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                </ul>

                <hr class="mx-3 bg-light">

                <div class="text-center">
                    <a href="#" class="btn btn-light btn-sm">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <!-- Top Bar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top rounded">
                <button id="sidebarToggle" class="btn btn-link toggle-sidebar">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center">
                    <div class="date-selector d-flex align-items-center">
                        <span class="me-2">Date:</span>
                        <input type="date" class="form-control form-control-sm" value="2025-04-24">
                    </div>
                </div>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3+
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown py-0"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header bg-primary text-white">
                                Notifications
                            </h6>
                            <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                <div class="me-3">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">April 24, 2025 · 10:30 AM</div>
                                    <span>New check-in: Room 302 is ready</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                <div class="me-3">
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-broom"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">April 24, 2025 · 9:15 AM</div>
                                    <span>Housekeeping completed for rooms 201-210</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                <div class="me-3">
                                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">April 24, 2025 · 8:45 AM</div>
                                    <span>Maintenance required in Room 405</span>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500 py-2" href="#">Show All
                                Notifications</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                7
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Messages Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image me-3">
                                    <img class="rounded-circle" src="/api/placeholder/60/60" alt="User Avatar">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="fw-bold">
                                    <div>Front Desk Team</div>
                                    <div class="small text-gray-500">Need assistance with VIP arrival</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 d-none d-lg-inline text-gray-600 small">Admin User</span>
                            <img class="img-profile rounded-circle" src="/api/placeholder/32/32" alt="Profile">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Dashboard Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <div>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm me-2">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                        </a>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> New Booking
                        </a>
                    </div>
                </div>

                <!-- Overview Stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Occupancy Rate
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">78%</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span class="text-success me-2"><i class="fas fa-arrow-up"></i>
                                                3.5%</span>
                                            <span>Since last month</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Revenue (Daily)
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$15,240</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span class="text-success me-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                            <span>Since yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Today's Arrivals
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span class="text-success me-2"><i class="fas fa-check"></i> 18 checked
                                                in</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Today's Departures
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        <div class="mt-2 mb-0 text-muted text-xs">
                                            <span class="text-info me-2"><i class="fas fa-spinner"></i> 6
                                                pending</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guest Status Section -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-primary">Guest Status Overview</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end shadow"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Display Options:</div>
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">This Week</a>
                                        <a class="dropdown-item" href="#">This Month</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card status-card bg-white border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="status-icon text-arrival">
                                                    <i class="fas fa-plane-arrival"></i>
                                                </div>
                                                <h2 class="h4">24</h2>
                                                <div class="stats-label">Arrivals</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card status-card bg-white border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="status-icon text-departure">
                                                    <i class="fas fa-plane-departure"></i>
                                                </div>
                                                <h2 class="h4">18</h2>
                                                <div class="stats-label">Departures</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card status-card bg-white border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="status-icon text-stayover">
                                                    <i class="fas fa-bed"></i>
                                                </div>
                                                <h2 class="h4">142</h2>
                                                <div class="stats-label">Stayovers</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card status-card bg-white border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="status-icon text-clean">
                                                    <i class="fas fa-broom"></i>
                                                </div>
                                                <h2 class="h4">45</h2>
                                                <div class="stats-label">Housekeeping</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <h6 class="font-weight-bold">Guest Status Breakdown</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Count</th>
                                                    <th>Percentage</th>
                                                    <th>Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="badge bg-arrival">Arrivals</span></td>
                                                    <td>24</td>
                                                    <td>10.3%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-arrival" role="progressbar"
                                                                style="width: 10.3%" aria-valuenow="10.3"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge bg-departure">Departures</span></td>
                                                    <td>18</td>
                                                    <td>7.8%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-departure" role="progressbar"
                                                                style="width: 7.8%" aria-valuenow="7.8"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge bg-stayover">Stayovers</span></td>
                                                    <td>142</td>
                                                    <td>61.2%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-stayover" role="progressbar"
                                                                style="width: 61.2%" aria-valuenow="61.2"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="badge bg-clean">Housekeeping</span></td>
                                                    <td>45</td>
                                                    <td>19.4%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-clean" role="progressbar"
                                                                style="width: 19.4%" aria-valuenow="19.4"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Housekeeping Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6 mb-4">
                                        <div class="card status-card bg-white border-0 shadow-sm h-100">
                                            <div class="card-body text-center">
                                                <div class="status-icon text-dirty">
                                                    <i
