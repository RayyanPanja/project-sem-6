function Carousel() {

    let currentIndex = 0;
    function displayCurrentImage() {
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.innerHTML = `<img src="${images[currentIndex]}" alt="Carousel Image">`;
    }
    function nextImage() {
        currentIndex++;
        if (currentIndex === images.length) {
            currentIndex = 0;
        }
        displayCurrentImage();
    }
}