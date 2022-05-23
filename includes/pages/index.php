    <section class="homepage">

        <!-- home default page -->
        <div class="introduction position-relative d-flex align-items-center justify-content-between mb-5">

            <!-- visual effects -->
            <div class="visual-effect"></div>

            <div class="container">
                <div class="row">
                    <!-- intro  -->
                    <div class="col-md-7 p-3 p-md-0">
                        <div>
                            <h1 class="text-primary display-1">MISS SUPPORT CENTER</h1>
                            <p class="subtitle">Create and View your ticket and make chats with the agents that supporting you.</p>
                        </div>
                    </div>
                    <!-- login form -->
                    <div class="col-md-5">
                        <div class="card form_container mx-auto border-0 shadow-lg">
                            <div class=" card-body">
                                <h3 class="text-center mb-5">Open Ticket <i class="fa-solid fa-circle-check text-primary"></i></h3>
                                <!-- open ticket form -->
                                <?php include __DIR__ . '/../components/open-ticket-form.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="signin container mb-5">
            <div class="row">

                <!-- form container -->
                <div class="col-md my-3 order-md-0 order-1">
                    <!-- form -->
                    <div class="card form_container mx-auto border-0 shadow-lg">

                        <div class="card-body">
                            <h3 class="text-center mb-5">Sign in <i class="fa-solid fa-circle-check text-primary"></i></h3>

                            <!-- sign in form -->
                            <?php include __DIR__ . '/../components/signin-form.php'; ?>

                        </div>
                    </div>

                </div>

                <!-- intro message -->
                <div class="col-md d-flex justify-content-center align-items-center my-3">
                    <div class="help_text d-flex flex-column">
                        <h1 class="display-5 text-center text-md-end fw-bolder text-secondary"><i class="fa-solid fa-user mx-1"></i> Sign in to MISS</h1>
                    </div>
                </div>

            </div>
        </div>



        <!-- footer -->
        <footer class="app_footer d-flex align-items-center p-4">
            <h6 class="mb-0 me-2 fs-3 text-primary">MISS</h6>
            <div> <sup>&copy;</sup> Copyright 2022 - 2022</div>
        </footer>

    </section>