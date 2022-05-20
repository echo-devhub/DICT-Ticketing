<?php include __DIR__ . '/config/app.php'; ?>


<?php include APP_INCLUDE_CONTROLLER . '/index.php'; ?>

<!-- header -->
<?php include APP_INCLUDE . '/header.php'; ?>

<!-- wrapper -->
<div class="wrapper">

  <!-- navigation bar -->
  <?php include APP_INCLUDE . '/nav.php'; ?>


  <!-- app main content -->
  <main class="app_main">

    <!-- pages -->
    <?php include APP_INCLUDE_PAGE . '/create-ticket.php'; ?>

  </main>
  <!-- !app main content -->

</div>
<!-- !wrapper -->

<script src="<?php echo  APP_ASSET_JS . '/ajax_create-ticket.js'; ?>"></script>

<!-- footer -->
<?php include APP_INCLUDE . '/footer.php'; ?>