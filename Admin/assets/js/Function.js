function DialogHandler(open, close, dialog, isModal = false) {
    let Open = document.getElementById(open);
    let Close = document.getElementById(close);
    let Dialog = document.getElementById(dialog);

    Open.addEventListener('click', () => {
        if (isModal === true) {
            Dialog.showModal();
        } else {
            Dialog.show();
        }
    });

    Close.addEventListener('click', () => {
        Dialog.close();
    });
}