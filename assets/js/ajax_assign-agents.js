// modal


const modalAgentList = document.querySelector('#modal_agent_list');


let currentUserId = modalAgentList.dataset.assigner;


// AGENT LIST CONTAINER
const content = document.querySelector('#agents_list');

const btnShowAgents = document.querySelectorAll('.btn_show_agent_list');


btnShowAgents.forEach((btn) => {
    btn.addEventListener('click', async function() {


          let ticketNumber = this.dataset.ticketnumber;


      let users = await getUsers('./controllers/ajax_retrieve_rows.php?agents_list');
    
    content.innerHTML = displayHtml(users);


        
const formAssignAgent = document.querySelectorAll('.form_assign_agent').forEach((form) => {
    form.addEventListener('submit', async function (ev) {
        ev.preventDefault();
        

        const formdata = new FormData(this);

        formdata.set('ticket_number', ticketNumber);
        formdata.set('ticket_assigner', currentUserId);


        let res = await fetch(`./controllers/ajax_assign_agents.php?assign_agents=request`, {
            method: 'POST',
            body: formdata
        });

        if (res.status == 200) {
            let result = await res.json();

            // DISPLAY RESPONSE MESSAGE TO USERS
            document.querySelector('#response_message').innerHTML = `<div class="alert alert-info alert-dismissible">
                Please wait and dont take any operations.
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>`;

            sendEmail(`./controllers/ajax_assign_agents.php?assign_agents=send_email&assigner=${result.assigner}&agent_id=${result.agent_id}&ticket_number=${result.ticket_number}`);


            setTimeout(() => {
                location.reload();
            }, 600);

        }
        
});
});



});
});


// SEND EMAIL
async function sendEmail(url) {
    let res = await fetch(url);

    if (res.status == 200) {
        let result = await res.text();
        // console.log(result);
    }
}


//  RETRIEVE USERS RECORD

    async function getUsers(url) {
    
        let res = await fetch(url);
        return await res.json();
    }



    function displayHtml(users) {

        let html = '';

        if (users.length == 0) {

            html = `<div class="alert alert-info">No agents</div>`;

            return html;
        }

        users.forEach((user) => {

            html += `<div class="card mb-2 shadow border-0">
    <div class="card-body d-flex align-items-center p-2 justify-content-between">
        <a href="./profile.php?user_id=${user.agent_id}" class="text-decoration-none d-flex">
            <div class="avatar m-1 me-2">
                <img src="/ticketing/assets/media/photos/uploaded/${user.photo}" alt="">
            </div>
            <div>
                <h6 class="mb-1 text-dark d-flex align-items-center">
                  ${user.agent_id == currentUserId ? 'You' : user.first_name + ' ' + user.last_name}
                    <i class="fa-solid fa-${user.user_role === 'Administrator' ? 'fa-certificate' : 'fa-circle-check'} text-primary fa-sm"></i>
                    <small class="active_status my-2 d-flex align-items-center text-secondary ms-2">
                        <div class="color-state me-1 bg-${user.is_active ? 'info' : 'warning'}"></div>
                        ${user.is_active ? 'Active Now' : 'Offline'}
                    </small>
                </h6>
            </div>
        </a>

        <form class="form_assign_agent">
            <input type="hidden" name="agent_id" value="${user.agent_id}">
            <button class="btn btn-light" type="submit">
                <i class="fa-solid fa-square-check icon sm-icon text-success fa-lg"></i>
            </button>
        </form>
    </div>
</div>`;

        });

        return html;

}
