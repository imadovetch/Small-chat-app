const chaters = document.querySelector('.chaters');
const groupscontainer = document.querySelector('.groupscontainer');
const contacts = document.querySelector('.chaters');
const solocontacts = document.querySelector('#individuel');
const grpsession = document.querySelector('#groups');
const addgroup = document.querySelector('.addgroup');
const groupInput = document.querySelector('#group-name');
const inputdiv = document.querySelector('.group-input');
const containergroupes = document.querySelector('.chatersgroupes');

let isInputVisible = false; // Track the visibility state
let isContactsVisible = true; // Track the visibility state of contacts and groups

function fetchUserList(url, container) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                container.innerHTML = data;
            }
        }
    };

    xhr.send();
}

// Fetch user list on window load
window.addEventListener('load', () => {
    fetchUserList("http://localhost/chat/phpfiles/users.php", chaters);
    fetchUserList("http://localhost/chat/phpfiles/groupes.php", containergroupes);
});

grpsession.addEventListener("click", () => {
    grpsession.style.backgroundColor = "#5f4141";
    solocontacts.style.backgroundColor = "#2E2E2E";

    contacts.style.display = "none";
    groupscontainer.style.display = "block";
    isContactsVisible = false;
});

solocontacts.addEventListener("click", () => {
    solocontacts.style.backgroundColor = "#5f4141";
    grpsession.style.backgroundColor = "#2E2E2E";

    groupscontainer.style.display = "none";
    contacts.style.display = "block";
    isContactsVisible = true;
});

addgroup.addEventListener('click', () => {
    if (isInputVisible) {
        inputdiv.style.display = 'none';
    } else {
        inputdiv.style.display = 'block';
    }
    isInputVisible = !isInputVisible;
    if (!isInputVisible) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'phpfiles/addgroup.php', true);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.responseText;
                    console.log(data);
                }
            }
        };

        const data = 'groupname=' + encodeURIComponent(groupInput.value);

        xhr.send(data);
    }
});
