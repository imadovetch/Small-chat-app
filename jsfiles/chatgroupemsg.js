
const returnButton = document.querySelector('.return');
const sendButton = document.querySelector('.sendbutton');
const form = document.querySelector('.inputmessage form');
const conversation = document.querySelector('.contacts-container .conversation');
const messageInput = document.querySelector('.message');
const molchiIdInput = document.querySelector("input[name='molchiid']");
const parentInput =document.querySelector("input[name='parentid']");


sendButton.addEventListener('click', (event) => {
    event.preventDefault();

    // Send the message
    sendMessage();
});

returnButton.addEventListener('click', () => {
    window.location.href = 'contacts.php';
});


function sendMessage() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/chat/phpfiles/chatgroupephp.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            messageInput.value = "";
        }
    };

    const formData = new FormData(form);
    const serializedFormData = new URLSearchParams(formData).toString();
    xhr.send(serializedFormData);
}
// fetch messages

function fetchUserList() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/chat/phpfiles/messagesgrp.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const newData = xhr.responseText;
            appendNewMessages(newData);
        }
    };

    const parentid = parentInput.value;
    const molchiId = molchiIdInput.value;

    const data = "parentid=" + parentid + "&molchiid=" + molchiId;
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}


function appendNewMessages(newData) {
    if (conversation.innerHTML !== newData) {
        console.log("New messages received");
        conversation.innerHTML = newData;
        scrollToBottom();
    }
}

function scrollToBottom() {
    conversation.scrollTop = conversation.scrollHeight;
}

setInterval(fetchUserList, 500);

window.addEventListener('load', () => {
    fetchUserList();
});
