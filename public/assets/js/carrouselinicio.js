const carousel = document.querySelector('.carousel');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
let currentIndex = 0;

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentIndex < carousel.children.length - 1) {
        currentIndex++;
        updateCarousel();
    }
});

function updateCarousel() {
    const cardWidth = carousel.children[0].offsetWidth;
    const newTransformValue = -currentIndex * (cardWidth + 30); // 30 es el margen entre tarjetas
    carousel.style.transform = `translateX(${newTransformValue}px)`;
}


