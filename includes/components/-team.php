  <!-- about us page -->
  <div class="about mb-5 container">
      <div class="alert">
          <h1 class="display-1">Our Team</h1>
      </div>

      <?php

        $team = new Agent();

        $agents =  $team->all_agents();
        $admins =  $team->all_admin();

        ?>
      <div class="about-content">
          <!-- admin team -->
          <div class="alert text-center">
              <h4>Administrators</h4>
          </div>
          <div class="row align-items-center mb-5 justify-content-center">
              <?php foreach ($admins as $admin) : ?>
                  <div class="col-md-4 mb-3 mb-md-0">
                      <div class="card shadow-sm border-0">
                          <img src="<?php echo APP_ASSET_PHOTO_UPLOADED . '/' . $admin['photo']; ?>" alt="" class="card-img-top">
                          <div class="card-body">
                              <div class="text-center mb-2">
                                  <h1 class="card-title"><?php echo $admin['first_name'] . ' ' . $admin['last_name']; ?></h1>
                                  <h6 class="card-title"><?php echo $admin['email_address']; ?></h6>
                                  <p class="card-title"><?php echo $admin['user_role']; ?></p>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>


          <div class="alert text-center">
              <!-- agents -->
              <h4>Agents</h4>
          </div>

          <div class="row align-items-center mb-5 justify-content-center">
              <?php foreach ($agents as $agent) : ?>
                  <div class="col-md-4 mb-3 mb-md-0">
                      <div class="card shadow-sm border-0">
                          <img src="<?php echo APP_ASSET_PHOTO_UPLOADED . '/' . $agent['photo']; ?>" alt="" class="card-img-top">
                          <div class="card-body">
                              <div class="text-center mb-2">
                                  <h1 class="card-title"><?php echo $agent['first_name'] . ' ' . $agent['last_name']; ?></h1>
                                  <h6 class="card-title"><?php echo $agent['email_address']; ?></h6>
                                  <p class="card-title"><?php echo $agent['user_role']; ?></p>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>


      </div>
  </div>