const form = document.querySelector(".register-container form");
const registerbutton = document.querySelector('.register-button');
const statusregister = document.querySelector('.statusregister');

form.onsubmit = (event) => {
    event.preventDefault(); 
}

registerbutton.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "phpfiles/register.php", true);
    
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                if (data === "dkchinadi") {
                    location.href = "loginpage.php"
                } else {
                    statusregister.textContent = data;
                    statusregister.style.display = "flex";
                }
            }
        }
    };
    let formdata = new FormData(form);
    xhr.send(formdata);
};
