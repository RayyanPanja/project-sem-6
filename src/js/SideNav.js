const Links = document.querySelectorAll('.side-link');
const toggleBtn = document.getElementById('toggleLink');
// const speed = 100;
let flag = false;

toggleBtn.addEventListener('click', () => {
    if (flag === false) {
        Links.forEach((link, index) => {
            if (index > 0) {
                setTimeout(() => {
                    link.classList.add('block');
                }, speed * index);
            }
        });
        flag = true;
    } else {
        Links.forEach((link, index) => {
            if (index > 0) {
                setTimeout(() => {
                    link.classList.remove('block');
                }, speed * index);
            }
        });
        flag = false;
    }
})