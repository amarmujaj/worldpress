// Gold Gallery Lightbox
document.addEventListener('DOMContentLoaded', function() {
  // Create lightbox modal
  var lightbox = document.createElement('div');
  lightbox.className = 'gallery-lightbox';
  lightbox.innerHTML = '<button class="gallery-lightbox-close" aria-label="Close">&times;</button>' +
    '<div class="gallery-lightbox-content"><img class="gallery-lightbox-img" src="" alt=""><div class="gallery-lightbox-caption"></div></div>';
  document.body.appendChild(lightbox);
  var imgEl = lightbox.querySelector('.gallery-lightbox-img');
  var captionEl = lightbox.querySelector('.gallery-lightbox-caption');
  var closeBtn = lightbox.querySelector('.gallery-lightbox-close');

  function openLightbox(src, caption) {
    imgEl.src = src;
    captionEl.textContent = caption || '';
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox() {
    lightbox.classList.remove('active');
    imgEl.src = '';
    document.body.style.overflow = '';
  }
  document.querySelectorAll('.gallery-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      var src = link.getAttribute('href');
      var caption = link.getAttribute('data-caption') || '';
      openLightbox(src, caption);
    });
  });
  closeBtn.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', function(e) {
    if (e.target === lightbox) closeLightbox();
  });
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
  });
});

// Example theme script
(function($){
  $(function(){
    console.log('DS Theme script loaded.');
  });
})(jQuery);

// Simple slider functionality
document.addEventListener('DOMContentLoaded', function() {
  var slides = document.querySelectorAll('.slide');
  var prevBtn = document.querySelector('.slider-btn.prev');
  var nextBtn = document.querySelector('.slider-btn.next');
  var current = 0;
  var autoSlide = true;
  var slideInterval;

  function showSlide(idx) {
    slides.forEach(function(slide, i) {
      slide.classList.toggle('active', i === idx);
    });
    current = idx;
  }

  function nextSlide() {
    var next = (current + 1) % slides.length;
    showSlide(next);
  }

  function prevSlide() {
    var prev = (current - 1 + slides.length) % slides.length;
    showSlide(prev);
  }

  if (nextBtn && prevBtn && slides.length > 1) {
    nextBtn.addEventListener('click', function() {
      nextSlide();
      resetInterval();
    });
    prevBtn.addEventListener('click', function() {
      prevSlide();
      resetInterval();
    });
  }

  function startInterval() {
    if (autoSlide) {
      slideInterval = setInterval(nextSlide, 4000);
    }
  }
  function resetInterval() {
    if (slideInterval) clearInterval(slideInterval);
    startInterval();
  }
  showSlide(0);
  startInterval();
});
