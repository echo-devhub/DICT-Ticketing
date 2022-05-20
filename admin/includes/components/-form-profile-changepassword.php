 <div id="change_password_response"></div>

 <form method="post" id="form_change_password" data-id="<?php echo $currentUser['agent_id']; ?>">

     <!-- old password -->
     <div class="field mb-3">
         <label for="old_password" class="form-label">Old password</label>
         <input type="text" name="old_password" id="old_password" class="form-control">
         <small></small>
     </div>
     <!-- new password -->
     <div class="field mb-3">
         <label for="new_password" class="form-label">New password</label>
         <input type="text" name="new_password" id="new_password" class="form-control" disabled>
         <small></small>
     </div>
     <!-- send -->
     <div class="field mb-3 text-end">
         <button type="submit" class="btn btn-success" id="btn_change_password" disabled>Update Now</button>
     </div>
 </form>