<?php $user = $logUser->informaton($userId); ?>


<!-- modal -->
<?php include APP_ADMIN_INCLUDE_COMPONENT . '/-modal-profile.php'; ?>

<section class="profile tabs container">

    <!-- content -->
    <div class="main_content">

        <div class="row">
            <div class="col-md-6 order-1 order-md-0 d-flex justify-content-center align-items-center text-secondary">
                <div class="p-2">
                    <h3 class="display-6 text-primary"><i class="fa-solid fa-envelope-open-text text-secondary"></i> <?php echo $user['email_address'] ?></h3>
                    <h4 class="text-dark"><?php echo $user['user_role'] ?></h4>
                    <h6>Joined At <code><?php echo date('l, F d, Y', strtotime($user['joined_at'])); ?></code></h6>


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
                    <h4 class="main_title fw-bold text-center">Profile <i class="fa-solid fa-certificate text-primary fa-sm"></i></h4>
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

    </div>
</section>