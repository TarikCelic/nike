document.querySelector('.switches .switch:first-child').addEventListener('click', () => {
  document.querySelector('#shoes').scrollBy({ left: -420, behavior: 'smooth' });
});

document.querySelector('.switches .switch:last-child').addEventListener('click', () => {
  document.querySelector('#shoes').scrollBy({ left: 420, behavior: 'smooth' });
});