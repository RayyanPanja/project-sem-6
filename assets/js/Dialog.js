function DialogHandler(open, close, dialog, isModal = false) {
    let Opener = document.getElementById(open);
    let Closer = document.getElementById(close);
    let Dialog = document.getElementById(dialog);
    Opener.addEventListener('click', () => {
        if (isModal != false) {
            Dialog.showModal();
        } else {
            Dialog.show();
        }
    });
    Closer.addEventListener('click', () => {
        Dialog.close();
    });
}



