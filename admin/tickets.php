<?php include __DIR__ . '/init.php'; ?>

<?php include APP_ADMIN_INCLUDE_CONTROLLER . '/tickets.php'; ?>

<?php include APP_ADMIN_INCLUDE . '/header.php'; ?>

<!-- wrapper -->
<div class="wrapper">
    <?php include APP_ADMIN_INCLUDE . '/nav.php'; ?>
    <!-- !header -->

    <main class="app_main">
        <!-- pages -->

        <?php

        include APP_ADMIN_INCLUDE_PAGE . '/tickets.php';

        ?>


    </main>
</div>
<!-- !wrapper -->

<script src="<?php echo APP_ASSET_JS . '/ajax_assign-agents.js'; ?>"></script>

<?php include APP_ADMIN_INCLUDE . '/footer.php'; ?>