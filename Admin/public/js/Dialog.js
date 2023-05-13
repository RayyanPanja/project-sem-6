console.log("DIALOG ACTIVE");
function DialogHandle(openID, closeID, dialogID, isModal = false) {

    const OPEN = document.getElementById(openID);
    const CLOSE = document.getElementById(closeID);
    const DIALOG = document.getElementById(dialogID);

    OPEN.addEventListener('click', () => {
        (isModal === false) ? DIALOG.show() : DIALOG.showModal();
    });
    CLOSE.addEventListener('click', () => {
        DIALOG.close();
    })

}