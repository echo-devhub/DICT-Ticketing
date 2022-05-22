

// FORMS
const form = document.querySelector('#form-agent');

// RESPONSE CONTAINER
const responseMessage = document.querySelector('#response-message');

// IMG CONTAINER
const imgContainer = document.querySelector('.img-preview');
 
// AGENT LIST CONTAINER
const content = document.querySelector('.main_content');


//  RETRIEVE USERS RECORD
 getUsers('./controllers/ajax_retrieve_rows.php?agents').then(user => {
 content.innerHTML =  displayHtml(user);
});



form.addEventListener('submit', async function (ev) {
        
    ev.preventDefault();

    const data = new FormData(form);
    
    let res = await fetch('./controllers/ajax_form_agent.php', {
        method: 'POST',
        body: data
    });

    
    if (res.status == 200) {

        // GET RESPONSE AS PLAIN TEXT
        let result = await res.text(); 


        if (result === 'SUCCESS') {
            // DISPLAY SUCCESS MESSAGE
        responseMessage.innerHTML = `<div class="alert alert-success alert-dismissible">New agent successfully added<button class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;   
            
            // REMOVE FORM FIELDS VALUE
            form.reset();    
            // REMOVE IMG
            imgContainer.innerHTML = '';

            // GET RELOAD USERS RECORD
            let users = await getUsers('./controllers/ajax_retrieve_rows.php?agents');

           content.innerHTML = displayHtml(users);

            return;
        }

        // SEND ERROR MESSAGE
        responseMessage.innerHTML = `<div class="alert alert-warning alert-dismissible">
        ${result}
        <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>`;
    }
    

}); 



let fileUpload = document.querySelector('#fileUpload');

    fileUpload.addEventListener('change', function(ev) {

        const reader = new FileReader();
        
        reader.readAsDataURL(this.files[0]);

        reader.addEventListener('load', () => {

// PREVIEW SELECTED IMAGE
            imgContainer.innerHTML = `<img src="${reader.result}" alt="">`;
            
        });
    });

    


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
                    <div class="card-body d-flex align-items-center p-3">
                        <a href="./profile.php?user_id=${user.agent_id}" class="text-decoration-none d-flex">
                            <div class="avatar m-1 me-2">
                                <img src="/ticketing/assets/media/photos/uploaded/${user.photo}" alt="">
                            </div>
                            <div>
                                <h5 class="mb-1 text-dark d-flex align-items-center">
                                ${user.first_name} ${user.last_name}
                                 <i class="fa-solid fa-${user.user_role === 'Administrator' ? 'fa-certificate' : 'fa-circle-check'} text-primary fa-sm"></i>
                        <small class="active_status my-2 d-flex align-items-center text-secondary ms-2">
                            <div class="color-state me-1 bg-${user.is_active ? 'info' : 'warning'}"></div>
                             ${user.is_active ? 'Active Now' : 'Offline'} 
                        </small>
                                 </h5>
                                  <h6>${user.user_role}</h6>
                                <small class="fst-italic text-secondary"><i class="fa-regular fa-calendar text-warning"></i> Date joined ${user.joined_at}</small>
                            </div>
                        </a>
                    </div>
                </div>`;

    });

    return html;

}
 