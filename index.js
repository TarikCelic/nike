
// dom
const rightArrowScroll = document.querySelector('.switches .switch:last-child')

const leftArrowScroll = document.querySelector('.switches .switch:first-child')

const shoesGrid = document.querySelector('#shoes')


// scroll arrows
leftArrowScroll.addEventListener('click', () => {
  shoesGrid.scrollBy({ left: -420, behavior: 'smooth' });
});

rightArrowScroll.addEventListener('click', () => {
  shoesGrid.scrollBy({ left: 420, behavior: 'smooth' });
});