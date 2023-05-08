const DialogHandler = (open, close, dialog, isModal = false) => {
    const Open = document.querySelector(open);
    const Close = document.querySelector(close);
    const Dialog = document.querySelector(dialog);

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

