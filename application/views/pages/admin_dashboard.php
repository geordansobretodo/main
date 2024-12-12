<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand white-text" href="<?= base_url('Admin/home'); ?>">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/home'); ?>"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/users'); ?>"><i class="fas fa-users"></i> Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/cashiers'); ?>"><i class="fas fa-cash-register"></i> Cashier List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/transaction_management'); ?>"><i class="fas fa-list"></i> Transaction List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/daily_reports'); ?>"><i class="fas fa-chart-line"></i> Daily Reports</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/customer_details'); ?>"><i class="fas fa-window-restore"></i> Customer Details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/cashier_metrics'); ?>"><i class="fas fa-book"></i> Cashier Metrics</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="<?= base_url('Admin/logout'); ?>"><button type="submit" name="logout" class="nav-link btn btn-link">Logout <i class="fas fa-sign-out-alt"></i></button></a>
            </li>
        </ul>
    </div>
</nav>