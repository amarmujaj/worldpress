document.addEventListener('DOMContentLoaded', function(){
  var btn = document.querySelector('.nav-toggle');
  if(!btn) return;
  btn.addEventListener('click', function(){
    var nav = document.querySelector('.site-nav');
    var expanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', String(!expanded));
    if(nav) nav.style.display = expanded ? 'none' : 'block';
  });
});

// Video modal and image lightbox
document.addEventListener('DOMContentLoaded', function(){
  var poster = document.querySelector('.video-poster');
  var modal = document.createElement('div');
  modal.className = 'video-modal';
  modal.innerHTML = '<div class="modal-inner"><button class="close-btn" aria-label="Close">&times;</button><div class="video-holder"></div></div>';
  document.body.appendChild(modal);

  function openModal(contentHtml){
    modal.querySelector('.video-holder').innerHTML = contentHtml;
    modal.classList.add('open');
  }
  function closeModal(){
    modal.classList.remove('open');
    modal.querySelector('.video-holder').innerHTML = '';
  }

  modal.addEventListener('click', function(e){
    if ( e.target === modal || e.target.classList.contains('close-btn') ) closeModal();
  });

  if ( poster ) {
    poster.addEventListener('click', function(){
      var src = poster.getAttribute('data-video-src');
      if ( src ) {
        openModal('<iframe width="100%" height="480" src="'+src+'" frameborder="0" allowfullscreen></iframe>');
      }
    });
  }

  // Image lightbox
  document.querySelectorAll('.gallery .item').forEach(function(item){
    item.addEventListener('click', function(){
      var img = item.querySelector('img');
      if ( img ) openModal('<img class="lightbox-img" src="'+img.src+'" alt="">');
    });
  });
});
