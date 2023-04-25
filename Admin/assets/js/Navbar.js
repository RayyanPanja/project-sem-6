const LinkSet = document.getElementById('set');
const Links = document.querySelectorAll('.link');
const ToggleNav = document.getElementById('toggleNav');


let flag = false;

const navToggle = (speed = 100) => {
    if (flag === false) {
        ToggleNav.style.rotate = "400deg";
        LinkSet.classList.add('nav-grid');
        Links.forEach((link, index) => {
            setTimeout(() => {
                if (index > 0) {
                    link.classList.add('nav-block');
                }
            }, speed * index);
        });
        flag = true;
    } else {
        Links.forEach((link, index) => {
            ToggleNav.style.rotate = "0deg";
            setTimeout(() => {
                if (index > 0) {
                    link.classList.remove('nav-block');
                }
            }, speed * index);
        });
        setTimeout(() => {
            LinkSet.classList.remove('nav-grid');
        }, speed * Links.length);

        flag = false;
    }
}

ToggleNav.addEventListener('click', () => { navToggle(500) });