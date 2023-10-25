const chaters = document.querySelector('.chaters');

function fetchUserList() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/chat/phpfiles/users.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                chaters.innerHTML = data;
               
            }
        }
    };

    // Send the request to fetch user list
    xhr.send();
}


window.addEventListener('load', () => {
    fetchUserList();
});
