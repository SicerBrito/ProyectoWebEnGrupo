const loader = document.querySelector("#loader");
const video = document.querySelector("#videoenter");
video.src = '../Inicio/videos/logo_horizontal.mp4'
video.play();
video.setAttribute('muted','');
video.addEventListener('ended', (e)=>{
  loader.style.display='none';
})


$(document).ready(function() {
 
  var videos = $('.carousel').find('video');
  videos.each(function() {
    this.pause();
  });
  
  var firstVideo = videos.first();
  var interval = firstVideo.parent().data('interval');
  firstVideo[0].currentTime = 0;
  firstVideo[0].play();
  setTimeout(function() {
    // firstVideo[0].pause();
  }, interval);
  
  $('.carousel').on('slide.bs.carousel', function (event) {
    var currentSlide = $(event.relatedTarget);
    var interval = currentSlide.data('interval');
    var video = currentSlide.find('video')[0];
    
    
    videos.each(function() {
      if (this !== video) {
        this.pause();
      }
    });
    
    video.currentTime = 0;
    video.play();
    
    setTimeout(function() {
      video.pause();
    }, interval);
  });
});


var imageContainer = document.querySelector('.image-container');
var overlayImage = document.querySelector('.overlay-image');
var audioElement = document.getElementById('audio-element');

imageContainer.addEventListener('mouseover', function() {
  overlayImage.style.display = 'block';
  audioElement.play();
});

imageContainer.addEventListener('mouseout', function() {
    overlayImage.style.display = 'none';
    audioElement.pause();
  });
  