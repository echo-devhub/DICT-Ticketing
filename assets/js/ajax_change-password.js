
const formChangePassword = document.querySelector('#form_change_password');

const oldPasswordField = document.querySelector('#old_password');
const newPasswordField = document.querySelector('#new_password');


    let newPasswordIndicator = oldPasswordField.nextElementSibling;


oldPasswordField.addEventListener('keyup', async function (ev) {

    let res = await fetch(`./controllers/ajax_profile.php?request_compare=${this.value}`);

    // error indicator

    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.text();


        if (result) {
            this.style.borderColor = '#198754'
            newPasswordIndicator.innerHTML = `Password match <i class="fa-solid fa-circle-check"></i>`;
            newPasswordIndicator.style.color = '#198754';

            // REMOVE DISABLED STATE OF THE CONFIRM PASSWORD FIELD
            newPasswordField.removeAttribute('disabled');
        } else {
            this.style.borderColor = '#ff90c7'
            newPasswordIndicator.innerHTML = `Password doesn't match <i class="fa-solid fa-triangle-exclamation"></i>`;
            newPasswordIndicator.style.color = '#ff90c7';

            // ADD DISABLED STATE OF THE CONFIRM PASSWORD FIELD
            newPasswordField.setAttribute('disabled', true);
        }
       
    }
    
});

  let oldPasswordIndicator = newPasswordField.nextElementSibling;

newPasswordField.addEventListener('keyup', function (ev) {

     // error indicator
    let indicator = this.nextElementSibling;
    
    if (String(this.value).length >= 8) {
        btnChangePassword.removeAttribute('disabled');
        oldPasswordIndicator.innerHTML = `Ready for change <i class="fa-solid fa-circle-check"></i>`;
            oldPasswordIndicator.style.color = '#198754';
    } else {
        btnChangePassword.setAttribute('disabled', true);
          oldPasswordIndicator.textContent = 'Password is too short';
            oldPasswordIndicator.style.color = '#ff90c7';
    }
});

const btnChangePassword = document.querySelector('#btn_change_password');

formChangePassword.addEventListener('submit', async function (ev) {
    ev.preventDefault();

    let res = await fetch(`./controllers/ajax_profile.php`, {
        method: 'POST',
        body: new FormData(this)
    });

    if (res.status == 200 && res.statusText == 'OK') {
        
        let result = await res.text();

        if (result) {

            document.querySelector('#change_password_response').innerHTML =  `<div class="alert alert-success alert-dismissible border-0">
        Successfully change your password
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    </div>`
            formChangePassword.reset();
        }
       
    }

});