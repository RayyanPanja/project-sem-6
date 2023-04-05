function goTo(url) {
    window.location.assign(url);
}

function goToHome(bool = false) {
    if (bool === false) {
        window.location.assign("../../../index.php")
    } else {
        window.location.assign("../../../home.php")
    }
}

function retry() {
    window.location.assign("../index.php");
}

function DialogHandler(open, close, dialog, isModal = false) {
    if (open != null) {
        var Opener = document.getElementById(open);
    }
    if (close != null) {
        var Closer = document.getElementById(close);
    }
    if (dialog != null) {
        var Dialog = document.getElementById(dialog);
    }
    if (Opener != null) {
        Opener.addEventListener('click', () => {
            if (isModal != false) {
                Dialog.showModal();
            } else {
                Dialog.show();
            }
        });
    }
    if (Closer != null) {
        Closer.addEventListener('click', () => {
            Dialog.close();
        });
    }
}


// Show Notifications....
function showNotifications(popupID, buttonID, newClass) {
    const Btn = document.getElementById(buttonID);
    const PopUp = document.getElementById(popupID);

    const prevClass = PopUp.className;
    let flag = false;

    Btn.addEventListener('click', () => {
        if (flag === false) {
            PopUp.className = newClass;
            flag = true;
        } else {
            PopUp.className = prevClass;
            flag = false;
        }
    });
}
// Show Notifications....Ends

// Currency....
function ChangeCurrencyFormat(tagID , formate , Lang) {
    const tag = document.getElementById(tagID);
    const tagValue = Number(tag.innerHTML);
    const updatedString = tagValue.toLocaleString(Lang, { style: 'currency', currency: formate });
    tag.innerHTML = updatedString;
    console.log('Working: ' + tag.innerHTML);
}


// Currency....


// MiddleWare...
function remove(form){
    const Form = document.getElementById(form);
    setTimeout(() => {
        Form.style.display = "none";
    }, 1000);
}
// MiddleWare...