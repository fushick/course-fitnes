window.addEventListener('load', () => {
  const left = document.querySelector('.btn-carusel-left');
  const right = document.querySelector('.btn-carusel-right');
  const slider = document.querySelector('.carusel-slide');
  const pic = document.querySelectorAll('.carusel-slide img');

  let counter = 0;
  const stepSize = pic[0].clientWidth;

  slider.style.transform = 'translateX(' + `${-stepSize * counter}px)`;

  right.addEventListener('click', () => {
    if(counter >= pic.length-1) counter =-1;
    counter++;
    slider.style.transform = 'translateX(' + `${-stepSize * counter}px)`;
  })

  left.addEventListener('click', () => {
    if(counter <= 0) counter = pic.length;
    counter--;
    slider.style.transform = 'translateX(' + `${-stepSize * counter}px)`;
  })

})
