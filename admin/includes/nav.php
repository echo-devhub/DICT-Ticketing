 <!-- header -->
 <header class="app_header d-flex justify-content-between align-items-center px-3 px-sm-5 shadow-sm">
     <!-- app logo -->
     <div class="logo d-flex justify-content-center align-items-center">
         <a href="#" class="me-1">
             <!-- logo -->
             <img src="<?php echo APP_ASSET_PHOTO_BUILT . '/DICT-logo.png'; ?>" alt="" class="img">
         </a>
         <!-- title -->
     </div>

     <!-- app nav -->
     <nav class="app_navigation d-flex align-items-center">

         <!-- notification drowdown -->
         <!-- <div class="dropdown"> -->
         <!-- notification bell -->
         <!-- <div class="nofications me-3 d-flex justify-content-center align-items-center" data-bs-toggle="dropdown"> -->
         <!-- notification counter -->
         <!-- <span class="notif_counter d-flex justify-content-center align-items-center">100</span>
                 <i class="fa-solid fa-bell fa-lg text-secondary"></i>
             </div> -->

         <!-- list of notifications -->
         <?php # include APP_ADMIN_INCLUDE_COMPONENT . '/notifications.php'; 
            ?>

         <!-- </div> -->
         <!-- user avatar -->
         <div class="nav_controls d-flex flex-column align-items-center position-relative">
             <div class="avatar dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                 <img src="<?php echo APP_ASSET_PHOTO_UPLOADED . "/{$currentUser['photo']}"; ?>" alt="Avatar" class="img">
             </div>
             <span class="position"><?php echo $currentUser['user_role']; ?></span>

             <!-- drowpdown menu -->
             <ul class="dropdown-menu shadow border-0">
                 <li>
                     <a class="dropdown-item py-2 d-flex justify-content-between align-items-center" href="./index.php">Dashboard <i class="fa-solid fa-house sm-fa-house"></i></a>
                 </li>
                 <li>
                     <a class="dropdown-item py-2 d-flex justify-content-between align-items-center" href="./tickets.php">Tickets <i class="fa-solid fa-ticket-simple"></i></a>
                 </li>
                 <?php if ($logUser->is_admin()) : #display settings if user is an admin 
                    ?>
                     <li>
                         <a class="dropdown-item py-2 d-flex justify-content-between align-items-center accordion-button" href="#settings" data-bs-toggle="collapse">Settings</a>
                         <!-- collapsible items -->
                         <div class="collapse" id="settings">
                             <a class="dropdown-item py-2 d-flex justify-content-end align-items-center" href="./ticket-types.php">Ticket</a>
                             <a class="dropdown-item py-2 d-flex justify-content-end align-items-center" href="./agents.php">Agent</a>
                         </div>
                     </li>
                 <?php endif; ?>
                 <li>
                     <a class="dropdown-item py-2 d-flex justify-content-between align-items-center" href="./profile.php?user_id=<?php echo $currentUser['agent_id']; ?>">Profile <i class="fa-solid fa-user"></i></a>
                 </li>
                 <li>
                     <a class="dropdown-item py-2 d-flex justify-content-between align-items-center" href="./controllers/signout.php">Sign out <i class="fa-solid fa-right-from-bracket"></i></a>
                 </li>
             </ul>
         </div>
     </nav>

 </header>