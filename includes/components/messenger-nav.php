<!-- header -->
<header class="app_header messenger-header d-flex justify-content-between align-items-center px-3 border-bottom shadow">
    <!-- app logo -->
    <div class="d-flex align-items-center">

        <div class="reciever-img me-2">
            <img src="../../assets/media/photos/uploaded/<?php echo $agent_information['photo']; ?>" alt="" class="img">
        </div>

        <h5 class="mb-0"><?php echo $has_agent ? $agent_information['first_name'] . ' ' . $agent_information['last_name'] :  ''; ?></h5>
    </div>

    <!-- controls -->
    <div class="controls d-flex align-items-center">
        <!-- .. ticket-info -->
        <div class="ticket-info">
            <!-- notification bell -->
            <div class="me-1 d-flex justify-content-center align-items-center dropstart" data-bs-toggle="dropdown" data-bs-auto-close="false">
                <i class="fa-solid fa-circle-info fa-lg icon text-primary"></i>
            </div>

            <!-- list of notifications -->
            <div class="dropdown-menu border-0 shadow-lg p-2">
                <ul class="list-group list-group-flush p-0 ticket-information p-3">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Ticket Number: <code class="fw-bold ms-5 fs-1"><?php echo $ticket_information['ticket_number'];
                                                                            ?></code>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Agent: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $has_agent ? $agent_information['first_name'] . ' ' . $agent_information['last_name'] :  ''; ?></h5 class="text-primary mb-0">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Email: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $has_agent ? $agent_information['email_address'] : ''; ?></h5 class="text-primary mb-0">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Category: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['category'];
                                                                                            ?></h5 class="text-primary mb-0">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Priority: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['priority'];
                                                                                            ?></h5 class="text-primary mb-0">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex flex-column">
                            <h4 class="text-center alert">Description</h4>
                            <div class="ms-5 text-justify">- <?php echo $ticket_information['description'];
                                                                ?></div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex flex-column">
                            <h4 class="text-center alert">Photo/Screenshot</h4>
                            <?php if (!empty($ticket_information['photo'])) : ?>
                                <div class="tk-img">
                                    <img src="../../assets/media/photos/tickets/<?php echo $ticket_information['photo'] ?>" alt="">
                                </div>
                        </div>
                    </li>
                <?php else :  ?>
                    <div class="alert alert-primary border-0">No photo/Screenshot included</div>
                <?php endif; ?>

                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Created on: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['create_at'];
                                                                                        ?></h5 class="text-primary mb-0">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Updated on: <h5 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['updated_at']; ?></h5 class="text-primary mb-0">
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        Status: <h5 class="mb-0 text-info"><?php echo $ticket_information['status']; ?></h5>
                    </div>
                </li>

                </ul>
            </div>

        </div>


        <a href="../../signout.php" class="text-decoration-none me-2">
            <i class="fa-solid fa-power-off fa-lg icon text-danger"></i>
        </a>
    </div>

</header>
<!-- !header -->