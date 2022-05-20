const btnChangeRole = document.querySelector('#btn_change_role');

// FORM
const formChangeRole = document.querySelector('#form_change_role');

btnChangeRole.addEventListener('click', async function (ev) {
    let id = this.dataset.id;

    let res = await fetch(`./controllers/ajax_retrieve_rows.php?get-user-role=${id}`);

    if (res.status == 200 && res.statusText == 'OK') {
        
        let json = await res.json();
// GET FORM INPUT FIELDS AND ASSIGN VALUES

            // user_role

        let userRoleField = formChangeRole.elements.user_role;


        let options = userRoleField.querySelectorAll('option');

        Array.from(options).forEach((option) => {
            if (option.value == json.user_role) option.selected = true;
        });

          
    }

});


// send form form changing user role
formChangeRole.addEventListener('submit', async function (ev) {
    ev.preventDefault();

    let id = btnChangeRole.dataset.id;

    let res = await fetch(`./controllers/ajax_profile.php?request_change_role=${id}`, {
        method: 'POST',
        body: new FormData(this)
    });   

    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.text();


        if (result === 'SUCCESS') {
            showResponse(changeRoleResponseMessage, 'Updated Successfully', 'success');
            setTimeout(() => { 
                location.reload();
            }, 500);
        } else {
            showResponse(changeRoleResponseMessage, result);
            }

      
    }


});


// response
const changeRoleResponseMessage = document.querySelector('#change_user_response');


function showResponse(Elem, message, indicator = 'danger') {
  Elem.innerHTML =  `<div class="alert alert-${indicator} alert-dismissible border-0">
        ${message}
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
}
