<section class="dashboard tabs container h-100">

    <!-- tab title -->
    <h4 class="main_title p-3 fw-bold text-primary">Dashboard</h4>

    <!-- content -->
    <div class="main_content p-3">

        <div class="row align-items-center mb-5">
            <!-- visual chart -->
            <div class="col-md-8 mb-5 mb-md-0">
                <!-- chart -->
                <div class="chart w-100 h-100 d-flex flex-column align-items-center">
                    <!-- chart title -->
                    <h4 class="chart_title text-center">Visual Overview <i class="fa-solid fa-chart-pie"></i></h4>

                    <!-- pie chart -->
                    <div class="pie_chart p-2">
                        <canvas id="pie"></canvas>
                    </div>
                </div>
            </div>

            <!-- data -->
            <div class="col-md-4">
                <!-- information -->
                <div class="ticket_info d-flex flex-column justify-content-center h-100 p-3 card border-0">
                    <h4 class="text-center py-2">Ticket Status <i class="fa-solid fa-ticket-simple"></i></h4>

                    <?php $ticket_statuses = $dashboard->ticket_statuses(); ?>

                    <?php foreach ($ticket_statuses as $status) : ?>
                        <!-- open tickets -->
                        <div class="card open mb-3 border-0 border-bottom">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <!-- title of ticket info -->
                                <span><?php echo $status['status']; ?></span>
                                <!-- number of tickets -->
                                <div class="tk_status status-<?php echo $status['status']; ?>"><?php echo $dashboard->ticket_status_counts($status['status_id']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>


        <?php include APP_ADMIN_INCLUDE_PAGE . '/index-analytics.php'; ?>

    </div>
</section>