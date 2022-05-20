<?php

// ...path configs

// .......adminpage

#include
define('APP_ADMIN_INCLUDE', __DIR__ . '/../admin/includes');

#include -> component
define('APP_ADMIN_INCLUDE_COMPONENT', __DIR__ . '/../admin/includes/components');

#include -> pages
define('APP_ADMIN_INCLUDE_PAGE', __DIR__ . '/../admin/includes/pages');

#include -> controllers
define('APP_ADMIN_INCLUDE_CONTROLLER', __DIR__ . '/../admin/controllers');

// .......frontpage

#include
define('APP_INCLUDE', __DIR__ . '/../includes');

#include -> component
define('APP_INCLUDE_COMPONENT', __DIR__ . '/../includes/components');

#include -> pages
define('APP_INCLUDE_PAGE', __DIR__ . '/../includes/pages');

#include -> controllers
define('APP_INCLUDE_CONTROLLER', __DIR__ . '/../includes/controllers');


// app url
define('APP_URL', isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' . $_SERVER['HTTP_HOST']);


#styles
define('APP_ASSET_BOOTSTRAP', APP_URL . '/ticketing/assets/bootstrap');
define('APP_ASSET_CSS', APP_URL . '/ticketing/assets/css');
define('APP_ASSET_JS', APP_URL . '/ticketing/assets/js');
define('APP_ASSET_FONT', APP_URL . '/ticketing/assets/fonts');
define('APP_ASSET_ICON', APP_URL . '/ticketing/assets/fontawesome');

#photos
define('APP_ASSET_PHOTO_BUILT', APP_URL . '/ticketing/assets/media/photos/built_in');
define('APP_ASSET_PHOTO_UPLOADED', APP_URL . '/ticketing/assets/media/photos/uploaded');
define('APP_ASSET_PHOTO_MESSAGING', APP_URL . '/ticketing/assets/media/photos/messaging');
