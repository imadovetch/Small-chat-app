const form = document.querySelector(".login-container form");
const loginbutton = document.querySelector('.login-button');
const loginstatus = document.querySelector('.statuslogin');

form.onsubmit = (event) => {
    event.preventDefault(); 
}

loginbutton.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "phpfiles/login.php", true);
    
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                console.log(data);
                if (data == 1) {
                    location.href = "contacts.php";
                } else {
                    loginstatus.textContent = data;
                    loginstatus.style.display = "flex";
                }
            }
        }
    };
    let formdata = new FormData(form);
    xhr.send(formdata);
};
