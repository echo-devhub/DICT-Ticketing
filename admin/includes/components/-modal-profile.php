<div class="modal fade" id="modal_change_info">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Update name</h6>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="response_message"></div>

                <form method="post" id="form_change_profile">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="field mb-3">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="field mb-3">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                    </div>

                    <div class="field d-grid">
                        <button type="submit" class="btn btn-success d-block">Change now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- update photo -->
<div class="modal fade" id="modal_change_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Change photo</h6>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="upload_response_message"></div>

                <form method="post" id="form_change_photo">
                    <div class="field mb-3">
                        <label for="photo" class="form-label d-flex justify-content-center align-items-center"><i class="fa-solid fa-image icon bg-primary text-white"></i></label>
                        <input type="file" name="photo" id="photo" class="form-control d-none">
                    </div>

                    <div class="img_preview mb-5"></div>

                    <div class="field d-grid mt-1">
                        <button type="submit" class="btn btn-dark d-block">Change now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- change role -->

<div class="modal fade" id="modal_change_role" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Change Role</h6>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div id="change_user_response"></div>

                <form method="post" id="form_change_role">

                    <div class="field mb-3">
                        <label for="user_role" class="form-label d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-pen me-2 icon bg-success text-white"></i>
                        </label>
                        <select name="user_role" id="user_role" class="form-select">
                            <option value="Administrator">Administrator</option>
                            <option value="Agent">Agent</option>
                        </select>
                    </div>

                    <div class="field d-grid mt-1">
                        <button type="submit" class="btn btn-success d-block">Update <i class="fa-solid fa-circle-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>