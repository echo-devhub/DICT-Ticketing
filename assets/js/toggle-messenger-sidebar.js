// sidebar
const sidebar = document.querySelector('.messenger_sidebar');

const toggleMsgList = document.querySelector('#msg_list');
toggleMsgList.addEventListener('click', function (ev) {
  

    // SHOW AND HIDE THE SIDEBAR
    sidebar.classList.toggle('active');
});
