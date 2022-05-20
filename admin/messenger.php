<?php include __DIR__ . '/init.php'; ?>

<?php include APP_ADMIN_INCLUDE_CONTROLLER . '/messenger.php'; ?>

<!-- hedder -->
<?php include APP_ADMIN_INCLUDE . '/header.php'; ?>

<!-- wrapper -->
<div class="wrapper">

    <!-- nav -->
    <?php include APP_ADMIN_INCLUDE . '/messenger-nav.php'; ?>

    <!-- main -->
    <main class="app_main messenger-main">
        <!-- tab content -->
        <section class="messenger tabs h-100 overflow-hidden d-flex">

            <!-- sidebar -->
            <?php include APP_ADMIN_INCLUDE . '/messenger-sidebar.php'; ?>

            <!-- chats -->
            <?php include APP_ADMIN_INCLUDE_COMPONENT . '/messenger-chats.php'; ?>

        </section>

    </main>
</div>

<script src="<?php echo APP_ASSET_JS . '/ajax_chat.js'; ?>"></script>


<!-- footer -->
<?php include APP_ADMIN_INCLUDE . '/footer.php'; ?>