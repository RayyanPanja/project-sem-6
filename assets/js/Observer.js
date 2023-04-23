const LazySet = document.querySelectorAll('.lazy');

const Observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('lazy-load');
            console.log("Inserceting");
        }
    })
});

LazySet.forEach(Lazy => {
    Observer.observe(Lazy);
});