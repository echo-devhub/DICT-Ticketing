<?php $user = $logUser->informaton($userId); ?>


<!-- modal -->
<?php include APP_ADMIN_INCLUDE_COMPONENT . '/-modal-profile.php'; ?>

<section class="profile tabs container">

    <!-- content -->
    <div class="main_content">

        <div class="row mb-5">
            <div class="col-md-6 order-1 order-md-0 d-flex justify-content-center align-items-center text-secondary">
                <div class="p-2">
                    <h3 class="display-6 text-primary text-break"><i class="fa-solid fa-envelope-open-text text-secondary"></i> <?php echo $user['email_address'] ?></h3>
                    <h4 class="text-dark"><?php echo $user['user_role'] ?></h4>
                    <h6><i class="fa-regular fa-calendar text-warning"></i> Date joined <code><?php echo date('l, F d, Y', strtotime($user['joined_at'])); ?></code></h6>


                    <hr>

                    <?php if ($user['email_address'] == $currentUser['email_address']) : ?>
                        <h5 class="alert text-center">Change password <i class="fa-solid fa-lock text-danger"></i></h5>
                        <!-- change password form -->
                        <?php include APP_ADMIN_INCLUDE_COMPONENT . '/-form-profile-changepassword.php'; ?>
                    <?php endif; ?>


                    <?php if ($logUser->is_admin() && $user['email_address'] != $currentUser['email_address']) : #only exist if the user is administrator 
                    ?>
                        <div class="d-flex">
                            <a href="#confirmation_box" class="text-decoration-none m-2 btn btn-danger btn_show_confimation_box" data-id="<?php echo $user['agent_id']; ?>" data-bs-toggle="modal" data-page="profile">
                                Remove Agent
                                <i class="fa-regular fa-trash-can m-1"></i>
                            </a>

                            <a href="#modal_change_role" class="text-decoration-none m-2 btn btn-info" data-id="<?php echo $user['agent_id']; ?>" data-bs-toggle="modal" id="btn_change_role">
                                Change Role
                                <i class="fa-solid fa-pencil m-1"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- avatar -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="p-3">
                    <h4 class="main_title fw-bold text-center text-primary">Profile <i class="fa-solid fa-certificate text-primary fa-sm"></i></h4>
                    <div class="avatar my-3 position-relative">
                        <img src="<?php echo APP_ASSET_PHOTO_UPLOADED . "/{$user['photo']}"; ?>" alt="avatar">
                        <?php if ($user['email_address'] == $currentUser['email_address']) : ?>
                            <div class="cam position-absolute" data-id="<?php echo $user['agent_id']; ?>" data-bs-toggle="modal" data-bs-target="#modal_change_photo" id="btn_change_photo">
                                <i class="fa-solid fa-camera fa-lg"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class=" d-flex flex-column justify-content-center align-items-center">
                        <h1 class="text-center text-secondary"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h1>

                        <div class="active_status my-2 d-flex align-items-center text-secondary">
                            <?php $activeStatus = $logUser->get_status($user['agent_id']); ?>
                            <?php echo $activeStatus ? 'Active Now' : 'Offline'; ?>
                            <div class="color-state ms-1 bg-<?php echo $activeStatus ? 'info' : 'warning';  ?>"></div>
                        </div>


                        <?php if ($user['email_address'] == $currentUser['email_address']) : ?>
                            <i class="fa-solid fa-pencil ms-3 change-name icon fa-lg text-secondary" data-bs-toggle="modal" data-bs-target="#modal_change_info" data-id="<?php echo $user['agent_id']; ?>" id="btn_change_info"></i>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <?php if ($user['email_address'] != $currentUser['email_address']) : ?>


            <div class="alert alert-info border-0 d-flex align-items-center"><i class="fa-solid fa-ticket-simple me-2 fs-4"></i> Assigned tickets to <span class="text-primary fw-bolder mx-1"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></span> and their statuses.</div>
            <!-- TICKETS ASSINGED -->
            <div class="card border-0 shadow mb-5">
                <div class="card-body">
                    <div class="table-responsive">

                        <?php if (count($allTickets) > 0) : ?>

                            <table class="table align-middle table-borderless table-sm">
                                <thead>
                                    <tr>
                                        <th>#Ticket Number</th>
                                        <th>Customer Name</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Updated On</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($allTickets as $ticket) : ?>
                                        <tr>
                                            <td>
                                                <a href="./messenger.php?tknumber=<?php echo $ticket['ticket_number']; ?>" class="text-decoration-none">
                                                    <code class="fs-4"><?php echo $ticket['ticket_number']; ?></code>
                                                </a>
                                            </td>
                                            <td><?php echo $tickets->col_real_value('customer_id', $ticket['customer_id'], 'full_name', 'customers'); ?></td>

                                            <td><?php echo $tickets->col_real_value('category_id', $ticket['category_id'], 'category', 'ticket_categories'); ?></td>


                                            <td><?php echo $ticket['create_at']; ?></td>
                                            <td><?php echo $ticket['updated_at']; ?></td>

                                            <td><?php echo $tickets->col_real_value('status_id', $ticket['status_id'], 'status', 'ticket_statuses'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>

                        <?php else : ?>
                            <div class="alert m-0">No assigned tickets yet.</div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>