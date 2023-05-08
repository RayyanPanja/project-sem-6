const NotifySet = document.getElementById('notfication-set');
const AllNotify = document.querySelectorAll('.notification');
const Toggle = document.getElementById('toggleNotify');

const speed = 100;
let isActive = false;

Toggle.addEventListener('click', () => {
    scrollTo(0, 0);
    if (isActive === false) {
        NotifySet.classList.replace('none', 'grid');
        AllNotify.forEach((notify, index) => {
            setTimeout(() => {
                notify.classList.add('notify-load');
            }, speed * index);
        });
        isActive = true;
    } else {
        AllNotify.forEach((notify, index) => {
            setTimeout(() => {
                notify.classList.replace('notify-load', 'notify');
                setTimeout(() => {
                    AllNotify.forEach(notify => {
                        notify.classList.remove('notify');
                    }, speed * AllNotify.length);
                }, (speed * AllNotify.length));
            }, speed * index);
        });
        setTimeout(() => {
            NotifySet.classList.replace('grid', 'none');
        }, speed * (AllNotify.length * 2));

        isActive = false;
    }

});