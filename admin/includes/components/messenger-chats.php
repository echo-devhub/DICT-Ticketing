<div class="messenger_chat h-100 position-relative">

    <div class="d-flex flex-column chat_content p-2 px-4">

        <!-- message to send -->
        <!-- <div class="d-flex flex-column mb-3 me-auto">
            <div class="d-flex">
                <div class="avatar align-self-end">
                    <img src="<?php echo APP_ASSET_PHOTO_BUILT . '/avatar.png'; ?>" alt="img">
                </div>
                <div class="chat p-1 card border-0 incoming">
                    <div class="card-body p-2">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum, quod!
                    </div>
                </div>
            </div>
            <div class="text-center p-1">
                <small class="date_send">Friday, 12/10/2022 <i class="fa-solid fa-circle-check text-primary"></i></small>
            </div>
        </div> -->

        <!-- <div class="d-flex flex-column ms-auto p-1 mb-3 me-2">
            <div class="chat_img">
                <img src="" alt="">
            </div>
            <div class="chat border-0 outgoing card ms-auto">
                <div class="card-body p-2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum, quod!
                </div>
            </div>
            <div class="text-end p-1">
                <small class="date_send">Saturday, 12/10/2022 <i class="fa-solid fa-circle-check text-primary"></i></small>
            </div>
        </div> -->
        <!-- message to recieve -->




    </div>

    <div class="chat_form position-absolute px-2 d-flex justify-content-center flex-column">

        <!-- messenger send message form -->
        <?php include APP_ADMIN_INCLUDE_COMPONENT . '/-form-messenger-sendmessage.php'; ?>

    </div>
</div>