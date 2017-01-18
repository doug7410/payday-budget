import $ from 'jquery';

const hammer = new Hammer(document.getElementById('iceland'));
const images = [
  '/images/chile1.jpg',
  '/images/chile2.jpg',
  '/images/chile3.jpg',
  '/images/chile4.jpg',
  '/images/chile5.jpg',
  '/images/chile6.jpg'
];
let currentImage = 0;

$(document).ready(() => {
  const number = getRandomInt(0, images.length - 1);
  console.log(number);
  $('body').css('background-image', 'url(' + images[number] + ')');
});

hammer.on('swiperight', () => {
  (currentImage + 1 === images.length) ? currentImage = 0 : currentImage++;
  updateImage(images[currentImage]);
});

hammer.on('swipeleft', () => {
  (currentImage === 0) ? currentImage = images.length - 1 : currentImage--;
  updateImage(images[currentImage]);
});

window.setInterval(() => {
  (currentImage + 1 === images.length) ? currentImage = 0 : currentImage++;
  $('body').css('background-image', 'url(' + images[currentImage] + ')');
}, 10000);

function updateImage(image){
  $('body').css('background-image', 'url(' + images[currentImage] + ')');
}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

images.forEach((image) => {
  $.get(image);
});
