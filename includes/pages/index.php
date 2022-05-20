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
                            <h1 class="text-primary display-2 fw-bold">MISS SUPPORT CENTER</h1>
                            <hr>
                            <p>Create and View your ticket and make chats with the agents that supporting you.</p>
                        </div>
                    </div>
                    <!-- login form -->
                    <div class="col-md-5">
                        <div class="card form_container mx-auto border-0 shadow">
                            <div class="card-body">
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
                        <h1 class="display-5 text-center text-md-end fw-bolder text-secondary">Sign in to MISS</h1>
                        <hr>
                        <p class="text-md-end text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsa earum suscipit ad
                            blanditiis a tempora at
                            culpa, libero dolore. Lorem ipsum dolor sit amet. Lorem, ipsum dolor sit amet consectetur
                            adipisicing elit. Cupiditate, amet.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- about us page -->
        <div class="about mb-5 container">
            <div class="alert">
                <h1 class="display-4">About us</h1>
            </div>

            <div class="about-content">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h5>Mission <i class="fa-solid fa-certificate ms-1 text-primary"></i></h5>
                                <div>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel iusto earum, corporis aliquam cumque dolores
                                    explicabo alias, eaque possimus officiis hic laudantium ut, sunt facere fuga reprehenderit?
                                    Necessitatibus, cumque consequatur.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h5>Vision <i class="fa-solid fa-glasses text-primary"></i></h5>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores placeat ut aperiam perspiciatis earum
                                    obcaecati, eligendi fugiat ipsum maxime molestias a, nemo saepe, accusantium minima. Sit id molestias
                                    aliquam pariatur?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h5>Goal <i class="fa-solid fa-bullseye text-primary"></i></h5>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, fugit ullam. Quibusdam asperiores
                                    tempora rem obcaecati quisquam iste aspernatur odit accusamus incidunt, placeat, a doloremque officia
                                    autem debitis excepturi officiis!
                                </div>
                            </div>
                        </div>
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