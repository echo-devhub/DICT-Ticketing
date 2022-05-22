 <div class="modal fade" id="modal_add_agent" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h6 class="modal-title">Add new agent</h6>
                 <button class="btn-close" data-bs-dismiss="modal"></button>
             </div>

             <div class="modal-body">

                 <div id="response-message"></div>

                 <form action="" method="post" id="form-agent">

                     <div class="row mb-2">
                         <!-- last name -->
                         <div class="col-sm-6">
                             <div class="field required">
                                 <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="">
                             </div>
                         </div>

                         <!-- first name -->
                         <div class="col-sm-6">
                             <div class="field text required">
                                 <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="">
                             </div>
                         </div>
                     </div>

                     <!-- email address -->
                     <div class="field mb-3 required">
                         <label for="email_address" class="form-label d-flex align-items-center"><i class="fa-solid fa-envelope-open-text icon me-3"></i> Email address</label>
                         <input type="text" name="email_address" id="email_address" class="form-control" value="">
                     </div>

                     <!-- agent role -->
                     <div class="field mb-3 required">
                         <label for="role" class="form-label"></i>Role</label>
                         <select id="role" class="form-select" name="user_role">
                             <option value="Administrator">Administrator</option>
                             <option value="Agent">Agent</option>
                         </select>
                     </div>


                     <!--password -->
                     <!-- <div class="field mb-3 required">
                         <label for="pwd" class="form-label"></i>Create password</label>
                         <input type="password" name="pwd" id="pwd" value="" class="form-control">
                     </div> -->


                     <!-- photo -->
                     <div class="field mb-3">
                         <label for="fileUpload" class="form-label d-flex justify-content-between align-items-center">Upload photo <i class="fa-solid fa-image icon ms-3"></i></label>
                         <input type="file" name="photo" id="fileUpload" class="form-control d-none">
                     </div>

                     <!-- preview selected image -->
                     <div class="img-preview m-3"></div>

                     <div class="field d-grid">
                         <button type="submit" class="btn btn-primary d-block">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>