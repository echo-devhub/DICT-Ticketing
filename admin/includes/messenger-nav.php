<!-- header -->
<header class="app_header messenger-header d-flex justify-content-between align-items-center px-3 border-bottom shadow">
    <!-- app logo -->
    <div class="d-flex align-items-center">
        <a href="./tickets.php" class="text-decoration-none me-2">
            <i class="fa-solid fa-power-off icon sm-icon fa-lg text-danger"></i>
        </a>

        <h5 class="mb-0"><?php echo $ticket_information['full_name']; ?></h5>
    </div>

    <!-- controls -->
    <div class="controls d-flex align-items-center">
        <!-- .. ticket-info -->
        <div class="ticket-info">
            <!-- notification bell -->
            <div class="me-1 d-flex justify-content-center align-items-center dropstart" data-bs-toggle="dropdown" data-bs-auto-close="false">
                <i class="fa-solid fa-circle-info fa-lg icon sm-icon text-primary"></i>
                <!-- <i class="fa-solid fa-gears sm-icon fa-lg"></i> -->
            </div>

            <!-- list of notifications -->
            <div class="dropdown-menu border-0 shadow-lg p-2" id="ticket-info">
                <ul class="list-group list-group-flush p-0 ticket-information p-3">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Ticket Number: <code class="fw-bold ms-5 fs-1"><?php echo $ticket_information['ticket_number']; ?></code>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Customer: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['full_name']; ?></h6 class="text-primary mb-0">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Email: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['email_address']; ?></h6 class="text-primary mb-0">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Category: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['category']; ?></h6 class="text-primary mb-0">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            Priority: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['priority']; ?></h6 class="text-primary mb-0">
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex flex-column">
                            <h4 class="text-center alert">Description</h4>
                            <div class="ms-5 text-justify">- <?php echo $ticket_information['description']; ?></div>
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
                        Created on: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['create_at']; ?></h6 class="text-primary mb-0">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Updated on: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo $ticket_information['updated_at']; ?></h6 class="text-primary mb-0">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        Assign To: <h6 class="text-primary mb-0" class="fw-bold ms-5"><?php echo isset($agent_information['last_name']) ? $agent_information['first_name'] . ' ' .  $agent_information['last_name'] : 'No assigned agent';  ?></h6 class="text-primary mb-0">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex flex-column">
                        <h5 class="mb-3 text-info">Status</h5>

                        <form action="" method="post">
                            <?php foreach ($ticket->get_ticket_statuses() as $status) :  ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="status" id="<?php echo $status['status']; ?>" <?php echo $ticket_information['status'] == $status['status'] ? 'checked' : '';  ?> value="<?php echo $status['status_id']; ?>">
                                    <label class="form-check-label" for="<?php echo $status['status']; ?>">
                                        <?php echo $status['status']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>

                            <div class="field d-grid">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </li>

                </ul>
            </div>

        </div>

        <div class="d-flex d-lg-none" id="msg_list">
            <i class="fa-solid fa-list-check icon sm-icon fa-lg"></i>
        </div>
    </div>

</header>
<!-- !header -->