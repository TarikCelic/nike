const rightArrowScroll = document.querySelector('.switches .switch:last-child')

const leftArrowScroll = document.querySelector('.switches .switch:first-child')

leftArrowScroll.addEventListener('click', () => {
  document.querySelector('#shoes').scrollBy({ left: -420, behavior: 'smooth' });
});

rightArrowScroll.addEventListener('click', () => {
  document.querySelector('#shoes').scrollBy({ left: 420, behavior: 'smooth' });
});