<?php include __DIR__ . '/init.php';

define('PAGE_TITLE', 'Ticket Categories');
?>

<!-- controllers -->
<?php include APP_ADMIN_INCLUDE_CONTROLLER . '/ticket-types.php'; ?>

<?php include APP_ADMIN_INCLUDE . '/header.php'; ?>

<!-- wrapper -->
<div class="wrapper">
    <?php include APP_ADMIN_INCLUDE . '/nav.php'; ?>
    <!-- !header -->

    <main class="app_main">
        <!-- pages -->
        <?php include APP_ADMIN_INCLUDE_PAGE . '/ticket-types.php';  ?>

    </main>
</div>
<!-- !wrapper -->

<script src="<?php echo APP_ASSET_JS . '/ajax-form-ticket-category.js'; ?>"></script>

<?php include APP_ADMIN_INCLUDE . '/footer.php'; ?>