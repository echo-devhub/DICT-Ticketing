<?php include __DIR__ . '/../../config/app.php'; ?>

<?php include APP_ADMIN_INCLUDE_CONTROLLER . '/customer-messenger.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DICT | Messenger</title>

    <!-- fontawesone -->
    <link rel="stylesheet" href="<?php echo APP_ASSET_ICON . '/css/all.css'; ?>">


    <!-- bootstrap css | minified-->
    <link rel="stylesheet" href="<?php echo APP_ASSET_BOOTSTRAP . '/css/bootstrap.min.css'; ?>">

    <!-- custome styles -->
    <link rel="stylesheet" href="<?php echo APP_ASSET_CSS . '/front/app.css'; ?>">
</head>

<body>


    <!-- wrapper -->
    <div class="wrapper">
        <!-- nav -->
        <?php include APP_INCLUDE_COMPONENT . '/messenger-nav.php'; ?>

        <!-- main -->
        <main class="app_main messenger-main">
            <!-- tab content -->
            <section class="messenger tabs h-100 overflow-hidden d-flex">
                <!-- chats -->
                <?php include APP_INCLUDE_COMPONENT . '/messenger-chats.php'; ?>

            </section>

        </main>
    </div>

    <!-- custom js -->
    <script src="<?php echo APP_ASSET_JS . '/ajax_chat_customer.js';  ?>"></script>

    <!-- bootstrap Js | bundle-->
    <script src="<?php echo APP_ASSET_BOOTSTRAP . '/js/bootstrap.bundle.min.js'; ?>"></script>
</body>

</html>