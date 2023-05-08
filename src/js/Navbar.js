const LinkSet = document.getElementById('link-set');
const Links = document.querySelectorAll('.link');
const toggleNav = document.getElementById('toggleLink');

let speed = 150;
let isActive = false;

toggleNav.addEventListener('click', () => {
    if (isActive === false) {
        LinkSet.classList.add("grid");
        Links.forEach((link, index) => {
            setTimeout(() => {
                link.classList.add('block');
            }, speed * index);
        });
        isActive = true;
    } else {
        Links.forEach((link, index) => {
            setTimeout(() => {
                link.classList.remove('block');
            }, speed * index);
        });
        setTimeout(() => {
            LinkSet.classList.replace("grid", "flex");
        }, speed * Links.length);
        isActive = false;
    }
})