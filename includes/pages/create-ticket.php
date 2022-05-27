 <section class="create-ticket tabs container position-relative">

     <!-- visual effects -->
     <div class="visual-effect"></div>

     <div class="row">
         <!-- intro message -->
         <div class="col-md d-flex justify-content-center align-items-center my-3">
             <div class="help_text">
                 <h1 class="display-6 fw-bolder text-secondary">Create New Ticket <i class="fa-solid fa-ticket-simple"></i></h1>
                 <hr>
                 <p>After you had created a new ticket, the system will notify you once there was a corresponding agent assigned to your issue. And your provided email will used as a notification delivery system.</p>
             </div>
         </div>

         <!-- form container -->
         <div class="col-md my-3">
             <!-- form -->
             <div class="card form_container mx-auto border-0 shadow-lg">

                 <div class="card-body">
                     <h3 class="text-center mb-5">New Ticket <i class="fa-solid fa-circle-check text-primary"></i></h3>
                     <!-- new ticket form -->
                     <?php include __DIR__ . '/../components/new-ticket-form.php'; ?>
                 </div>
             </div>

         </div>

     </div>
 </section>