const Wrapper = document.getElementById('card-wrap');
const ScratchCard = document.getElementById('scard');
const CardDetails = document.getElementById('det');
const CardCover = document.getElementById('overlay');

const XBtn = document.getElementById('x-btn');
XBtn.addEventListener('click', () => {
    ScratchCard.style.transform = "translateX(100vw)";
    setTimeout(() => {
        Wrapper.style.display = "none";
        ScratchCard.style.display = "none";
    }, 500);
})

let opacity = 1;
ScratchCard.addEventListener('mousemove', () => {
    if (opacity >= 0) {
        opacity -= 0.009;
        console.log(opacity);
        CardCover.style.opacity = `${opacity}`;
        if (opacity == 0.045999999999999264) {
            CardDetails.style.opacity = 1;
        }
    } else {
        CardCover.style.display = "none";
        console.log("Card Fully Revealed");
    }
})

