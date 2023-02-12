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