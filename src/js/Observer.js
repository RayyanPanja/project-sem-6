const Observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.replace('lazy', 'lazy-load');
        }
    })
});

const lazySet = document.querySelectorAll('.lazy');

lazySet.forEach((item) => {
    Observer.observe(item);
});