<?php include __DIR__ . '/init.php'; ?>

<?php include APP_ADMIN_INCLUDE_CONTROLLER . '/profile.php'; ?>


<?php include APP_ADMIN_INCLUDE . '/header.php'; ?>

<!-- wrapper -->
<div class="wrapper">
    <?php include APP_ADMIN_INCLUDE . '/nav.php'; ?>
    <!-- !header -->

    <main class="app_main">
        <!-- pages -->
        <?php include APP_ADMIN_INCLUDE_PAGE . '/profile.php';  ?>

    </main>
</div>
<!-- !wrapper -->


<?php if ($user['email_address'] == $currentUser['email_address']) : #only exist if user_id is set 
?>
    <script src="<?php echo APP_ASSET_JS . '/ajax_profile-change.js'; ?>"></script>
    <script src="<?php echo APP_ASSET_JS . '/ajax_change-password.js'; ?>"></script>

<?php endif; ?>


<?php if ($logUser->is_admin() && $user['email_address'] != $currentUser['email_address']) : ##only exist if any user admin 
?>
    <script src="<?php echo APP_ASSET_JS . '/ajax_change-role.js'; ?>"></script>
<?php endif; ?>


<?php include APP_ADMIN_INCLUDE . '/footer.php'; ?>