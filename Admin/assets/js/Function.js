function DialogHandler(open, close, dialog, isModal = false) {
    let Opens = document.querySelectorAll(open);
    let Close = document.getElementById(close);
    let Dialog = document.getElementById(dialog);

    Opens.forEach(Open => {
        Open.addEventListener('click', () => {
            if (isModal === true) {
                Dialog.showModal();
            } else {
                Dialog.show();
            }
        });
    });

    Close.addEventListener('click', () => {
        Dialog.close();
    });
}