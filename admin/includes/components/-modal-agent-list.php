<div class="modal fade" id="modal_agent_list" data-assigner="<?php echo $currentUser['agent_id']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Assign ticket to ?</h6>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div id="response_message"></div>

            <div class="modal-body" id="agents_list">
            </div>
        </div>
    </div>
</div>



<!-- <div class="card mb-2 shadow border-0">
    <div class="card-body d-flex align-items-center p-2 justify-content-between">
        <a href="./profile.php?user_id=${user.agent_id}" class="text-decoration-none d-flex">
            <div class="avatar m-1 me-2">
                <img src="/ticketing/assets/media/photos/uploaded/${user.photo}" alt="">
            </div>
            <div>
                <h6 class="mb-1 text-dark d-flex align-items-center">
                    ${user.first_name} ${user.last_name}
                    <i class="fa-solid fa-${user.user_role === 'Administrator' ? 'fa-certificate' : 'fa-circle-check'} text-primary fa-sm"></i>
                    <small class="active_status my-2 d-flex align-items-center text-secondary ms-2">
                        <div class="color-state me-1 bg-${user.is_active ? 'info' : 'warning'}"></div>
                        ${user.is_active ? 'Active Now' : 'Offline'}
                    </small>
                </h6>
            </div>
        </a>

        <form action="" id="form_assign_agent">
            <input type="hidden" name="agent_id" value="${user.agent_id}">
            <button class="btn btn-light" type="submit">
                <i class="fa-solid fa-square-check icon text-success"></i>
            </button>
        </form>
    </div>
</div> -->