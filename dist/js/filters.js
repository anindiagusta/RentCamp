const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector('.select');
  const caret = dropdown.querySelector('.caret');
  const menu2 = dropdown.querySelector('.menu2');
  const options = dropdown.querySelectorAll('.menu2 li');
  const selected = dropdown.querySelector('.selected');



  select.addEventListener('click', () => {
    select.classList.toggle('select-clicked');
    caret.classList.toggle('caret-rotate');
    menu2.classList.toggle('menu2-open');
  });

  options.forEach(option => {
    option.addEventListener('click', () => {
      selected.innerText = option.innerText;
      select.classList.remove('select-clicked');
      caret.classList.remove('caret-rotate');
      menu2.classList.remove('menu2-open');
      options.forEach(option => {
        option.classList.remove('active');
      });
      option.classList.add('active')
    });
  });
});