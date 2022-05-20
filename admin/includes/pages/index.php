<section class="dashboard tabs container h-100">

    <!-- tab title -->
    <h4 class="main_title p-3 fw-bold">Dashboard</h4>

    <!-- content -->
    <div class="main_content p-3">

        <div class="row align-items-center">
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
                <div class="ticket_info d-flex flex-column justify-content-center h-100 p-3 card shadow-lg border-0">
                    <h4 class="text-center py-2">Ticket Status <i class="fa-solid fa-ticket-simple"></i></h4>
                    <!-- total tickets -->
                    <div class="card total mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <!-- title of ticket info -->
                            <span>Total</span>
                            <!-- number of tickets -->
                            <span class="summation badge bg-dark"><?php echo $dashboard->total_count(); ?></span>
                        </div>
                    </div>


                    <?php $ticket_statuses = $dashboard->ticket_statuses(); ?>

                    <?php foreach ($ticket_statuses as $status) : ?>
                        <!-- open tickets -->
                        <div class="card open mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <!-- title of ticket info -->
                                <span><?php echo $status['status']; ?></span>
                                <!-- number of tickets -->
                                <span class="summation badge bg-primary"><?php echo $dashboard->ticket_status_counts($status['status_id']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</section>