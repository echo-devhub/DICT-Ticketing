

const formSendMessage = document.querySelector('#form_send_message');

// MESSAGE INPUT
const inputText = document.querySelector('#msg_text');
const inputFile = document.querySelector('#msg_img');

    let senderId = formSendMessage.querySelector('#sender_id');
    let recieverId = formSendMessage.querySelector('#reciever_id');
let ticketNumber = formSendMessage.querySelector('#ticket_number');
    


    // CHATS
const chats = document.querySelector('.chat_content');

    const chat_form = document.querySelector('.chat_form ');


// PREVIEW IMAGE
inputFile.addEventListener('change', function () {
    let file = this.files[0];

    let reader = new FileReader();

    reader.readAsDataURL(file);

    reader.addEventListener('load', function () {

        const div = document.createElement('div');
        div.classList.add('img_preview', 'position-absolute');
        const img = document.createElement('img');
        img.src = reader.result;
        div.appendChild(img);


        const closePreviewBtn = document.createElement('div');
        closePreviewBtn.classList.add('close-preview', 'icon');
        closePreviewBtn.innerHTML = '<i class="fa-solid fa-xmark fa-2x"></i>'; // icon

        closePreviewBtn.addEventListener('click', function () {
            div.remove(); 
            // inputFile.files[0] = null;

            // REMOVE IMAGE AND PREVENT FROM SENDING
            formSendMessage.msg_img.value = null;
            disableBtn(inputText);
            
        });

        div.appendChild(closePreviewBtn);

        chat_form.appendChild(div);


        
        // ENABLE BTN SUBMIT
          btnSend.classList.add('bg-primary')
        btnSend.classList.remove('bg-secondary')
    btnSend.removeAttribute('disabled');

    });
});


const btnSend = document.querySelector('.send_btn');

function disableBtn(inputText) {
    if (!inputText.value) {
    btnSend.classList.add('bg-secondary');
    btnSend.setAttribute('disabled', true);
}
}



disableBtn(inputText);

inputText.addEventListener('keyup', function () {
    if (this.value || chat_form.querySelector('.img_preview')) {
        btnSend.classList.add('bg-primary')
        btnSend.classList.remove('bg-secondary')
    btnSend.removeAttribute('disabled');
    } else {
        disableBtn(this);
    }
});


formSendMessage.addEventListener('submit', async function (ev) {



    ev.preventDefault();

    let formdata = new FormData(this);

    let responseObject = await fetch('./controllers/ajax_chat.php?chats', {
        method: 'POST',
        body : formdata
    });

    if (responseObject.status == 200 && responseObject.statusText == 'OK') {
        
        let result = await responseObject.text();

        if (result == 'SUCCESS') {
            inputText.value = '';
            inputFile.value = null;
            disableBtn(inputText);
        
            const img_preview = chat_form.querySelector('.img_preview');
            
            if (img_preview) {
                img_preview.remove();
            }

            chats.innerHTML = await getChats(senderId.value, recieverId.value, ticketNumber.value);
      }
    }



});


async function getChats(sender, reciever, ticketNumber) {

    let response = await fetch(`./controllers/ajax_retrieve_rows.php?chats&sender=${sender}&reciever=${reciever}&ticketNumber=${ticketNumber}`);

    if (response.status == 200 && response.statusText == 'OK') {
        
       return await response.text();
    }
    
}



let stopInterval = setInterval(() => {
getChats(senderId.value, recieverId.value, ticketNumber.value).then((html) => {
    chats.innerHTML = html;

    if (!chats.classList.contains('active')) {
    scrollDown(chats);
    }

});
}, 1000);


function scrollDown(elem) {
    
    elem.scrollTop = elem.scrollHeight;
}



chats.addEventListener('mouseenter', function (ev) {
    chats.classList.add('active');
});

chats.addEventListener('mouseleave', function (ev) {
    chats.classList.remove('active');
});


chats.addEventListener('scroll', function () {
        chats.classList.add('active');
});





const messengerSidebar = document.querySelector('.messenger_sidebar');

async function list_of_customer(ticketNumber, sender, reciever){
   let response = await fetch(`./controllers/ajax_retrieve_rows.php?customers&ticket_number=${ticketNumber}&sender=${sender}&reciever=${reciever}`);

    if (response.status == 200 && response.statusText == 'OK') {
        
        let result= await response.text();
        
        messengerSidebar.innerHTML = result;
    }
}



setInterval(function () {
list_of_customer(ticketNumber.value, senderId.value, recieverId.value);

},1000);


// ADD PREVIEW IMAGE FUNCTIONALITY

function showImage(imgContainer) {
    
    const previewer = document.createElement('div');
    previewer.classList.add('img-previewer');


    const imgToView = imgContainer.firstElementChild;
    imgToView.classList.add('img');
    previewer.appendChild(imgToView);

    // close btn previwer
    const closePreviewerBtn = document.createElement('div');
    closePreviewerBtn.classList.add('img-previewer-closeBtn', 'icon', 'icon-sm');
    closePreviewerBtn.innerHTML = `<i class="fa-solid fa-xmark fa-2x"></i>`;

    closePreviewerBtn.addEventListener('click', () => {
        previewer.remove();
    });


    previewer.appendChild(closePreviewerBtn);

    document.body.appendChild(previewer);
}

