const container = document.querySelector('#container')
const slider = document.querySelector('#slider');
const slides = document.querySelectorAll('.user-card').length;
const buttons = document.querySelectorAll('.btn');


let currentPosition = 0;
let currentMargin = 0;
let slidesPerPage = 0;
let slidesCount = slides - slidesPerPage;
let containerWidth = container.offsetWidth;
let prevKeyActive = false;
let nextKeyActive = true;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 2;
    } else {
        if (w < 901) {
            slidesPerPage = 3;
        } else {
            if (w < 1101) {
                slidesPerPage = 4;
            } else {
                slidesPerPage = 5;
            }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    };
    currentMargin = - currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.add('inactive');
    }
}

setParams();

function slideRight() {
    if (currentPosition != 0) {
        slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
        currentMargin += (100 / slidesPerPage);
        currentPosition--;
    };
    if (currentPosition === 0) {
        buttons[0].classList.add('inactive');
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove('inactive');
    }
};

function slideLeft() {
    if (currentPosition != slidesCount) {
        slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
        currentMargin -= (100 / slidesPerPage);
        currentPosition++;
    };
    if (currentPosition == slidesCount) {
        buttons[1].classList.add('inactive');
    }
    if (currentPosition > 0) {
        buttons[0].classList.remove('inactive');
    }
};