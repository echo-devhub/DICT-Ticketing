<div class="basic mb-5">
    <div class="container">
        <div class="row justify-content-center">

            <a class="col-md-6 text-decoration-none text-secondary col-lg-3 py-1">
                <div class="card shadow border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="small d-flex flex-column align-items-center"><i class="fa-solid fa-ticket-simple icon mb-2"></i> Tickets
                        </div>
                        <span class="pre-orange fw-normal number display-6"><?php echo $dashboard->total_count(); ?></span>
                    </div>
                </div>
            </a>

            <a class="col-md-6 text-decoration-none text-secondary col-lg-3 py-1">
                <div class="card shadow border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="small d-flex flex-column align-items-center"><i class="fa-solid fa-user-group icon mb-2"></i> Customers</div>
                        <span class="pre-orange fw-normal number display-6"><?php echo $totalCustomers; ?></span>
                    </div>
                </div>
            </a>

            <a class="col-md-6 text-decoration-none text-secondary col-lg-3 py-1">
                <div class="card shadow border-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="small d-flex flex-column align-items-center"><i class="fa-solid fa-users icon mb-2"></i> Users</div>
                        <span class="pre-orange fw-normal number display-6"><?php echo $totalUser; ?></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>