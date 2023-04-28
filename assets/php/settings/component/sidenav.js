// const set = document.getElementById('settings-link-set');
const Links = document.querySelectorAll('.settings-link');
const toggleNav = document.getElementById('toggleNav');

let Flag = false;

const speed = 100;

toggleNav.addEventListener('click', () => {
    scrollTo(0, 0);
    console.log("CLicked");
    if (Flag === false) {
        Links.forEach((link, index) => {
            if (index > 0) {
                setTimeout(() => {
                    link.classList.add('block');
                    console.log("Done");
                }, speed * index);
            }
            Flag = true;
        });
    } else {
        Links.forEach((link, index) => {
            if (index > 0) {
                setTimeout(() => {
                    link.classList.remove('block');
                    console.log("Done");
                }, speed * index);
            }
        });
        Flag = false;
    }
});