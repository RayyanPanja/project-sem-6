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
