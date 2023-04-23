const LinkSet = document.getElementById('set');
const toggleBtn = document.getElementById('toggleNav');
const Links = document.querySelectorAll('.link');

let Flag = false;

const speed = 100;

toggleBtn.addEventListener('click', () => {
    console.log("Clicked");
    if (Flag === false) {
        LinkSet.classList.add('grid');
        Links.forEach((link, index) => {
            setTimeout(() => {
                if (index > 0) {
                    link.classList.add('block');
                }
            }, speed * index);
        });
        Flag = true;
    } else {
        Links.forEach((link, index) => {
            if (index > 0) {
                setTimeout(() => {
                    link.classList.remove('block');
                }, speed * index);
            }
            setTimeout(() => {
                LinkSet.classList.remove('grid');
            }, speed * Links.length);
        });
        Flag = false;
    }
});