
const TermsHandle = (openFor, dialogFor, closeFor) => {
    const Opener = document.getElementById(openFor);
    const Dialog = document.getElementById(dialogFor);
    const Closer = document.getElementById(closeFor);
    Opener.addEventListener('click', () => {
        Dialog.showModal();
    });
    Closer.addEventListener('click', () => {
        Dialog.close();
    })
}