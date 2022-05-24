<header class="app_header d-flex justify-content-between align-items-center px-5 shadow">
    <!-- app logo -->
    <a class="logo" href="./index.php">
        <!-- image -->
        <img src="<?php echo APP_ASSET_PHOTO_BUILT . '/DICT-Logo.png'; ?>" alt="Logo" class="img">
    </a>


    <?php $active = isset($_GET['source']) ? $_GET['source'] : 'home'; ?>


    <!-- app nav -->
    <nav class="app_navigation nav nav-pills flex-column flex-md-row align-items-md-center">
        <!-- <a href="#" class="nav-link">ICT Equipment</a> -->
        <a href="./index.php?source=home" class="nav-link link-secondary <?php echo $active == 'home' ? 'active_link' : ''; ?>"><i class="fa-solid fa-house fa-lg"></i></a>
        <a href="./create-new-ticket.php?source=new-ticket" class="nav-link link-secondary <?php echo $active == 'new-ticket' ? 'active_link' : ''; ?>">New Ticket</a>
    </nav>

    <!-- burger menu -->
    <div class="menu_bar d-flex justify-content-center align-items-center d-md-none">
        <i class="fa-solid fa-bars fa-lg"></i>
    </div>

</header>