import $ from 'jquery';

const hammer = new Hammer(document.getElementById('iceland'));
const images = [
  '/images/iceland1.jpg',
  '/images/iceland2.jpg',
  '/images/iceland3.jpg',
  '/images/iceland4.jpg',
  '/images/iceland5.jpg',
  '/images/iceland6.jpg',
  '/images/iceland7.jpg',
  '/images/iceland8.jpg',
  '/images/iceland9.jpg',
  '/images/iceland10.jpg',
  '/images/iceland11.jpg',
  '/images/iceland12.jpg',
  '/images/iceland13.png',
  '/images/iceland14.jpg',
  '/images/iceland15.jpg',
  '/images/iceland16.png'
];
let currentImage = 0;

$(document).ready(() => {
  $('body').css('background-image', 'url(' + images[currentImage] + ')');
});

hammer.on('swiperight', () => {
  (currentImage + 1 === images.length) ? currentImage = 0 : currentImage++;
  updateImage(images[currentImage]);
});

hammer.on('swipeleft', () => {
  (currentImage === 0) ? currentImage = images.length - 1 : currentImage--;
  updateImage(images[currentImage]);
});

function updateImage(image){
  $('body').css('background-image', 'url(' + images[currentImage] + ')');
}

images.forEach((image) => {
  $.get(image);
});
