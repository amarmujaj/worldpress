<!-- Testimonials Section -->
<section class="testimonials-section" data-aos="fade-up" data-aos-delay="600">
  <h2 class="testimonials-title">What Our Users Say</h2>
  <div class="testimonials-grid">
    <?php
    $testimonials = new WP_Query(array(
      'post_type' => 'testimonial',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order' => 'DESC',
    ));
    if ( $testimonials->have_posts() ) :
      while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
        <div class="testimonial">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="testimonial-img"><?php the_post_thumbnail('thumbnail'); ?></div>
          <?php endif; ?>
          <div class="testimonial-content">
            <div class="testimonial-text">“<?php the_content(); ?>”</div>
            <div class="testimonial-author">— <?php the_title(); ?></div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata();
    endif;
    ?>
  </div>
</section>
<?php get_header(); ?>




<section class="hero-slider-wrap" data-aos="fade-up">
  <div class="hero-section best-hero">
    <div class="hero-content">
      <h1 class="hero-title">Build Your Dream Website</h1>
      <p class="hero-sub">A premium, modern WordPress theme for creators, businesses, and portfolios.</p>
      <a href="#" class="hero-btn">Start Now</a>
    </div>
  </div>
  <section class="slider-section best-slider" data-aos="fade-up" data-aos-delay="200">
    <div class="slider-container">
  <button class="slider-btn prev" aria-label="Previous Slide">&#10094;</button>
  <div class="slider-track">
        <div class="slide active">
          <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" alt="Nature">
          <div class="slide-caption">
            <h2>Stunning Nature</h2>
            <p>Experience breathtaking landscapes and vibrant colors.</p>
          </div>
        </div>
        <div class="slide">
          <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80" alt="Workspace">
          <div class="slide-caption">
            <h2>Creative Workspace</h2>
            <p>Design, create, and collaborate in inspiring environments.</p>
          </div>
        </div>
        <div class="slide">
          <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1200&q=80" alt="Design">
          <div class="slide-caption">
            <h2>Modern Design</h2>
            <p>Clean, elegant, and fully responsive layouts for any project.</p>
          </div>
        </div>
        <div class="slide">
          <img src="https://images.unsplash.com/photo-1465101178521-cb6e446a8fdf?auto=format&fit=crop&w=1200&q=80" alt="City Night">
          <div class="slide-caption">
            <h2>City Nights</h2>
            <p>Vibrant cityscapes and urban adventures after dark.</p>
          </div>
        </div>
        <div class="slide">
          <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80" alt="Mountains">
          <div class="slide-caption">
            <h2>Majestic Mountains</h2>
            <p>Explore the beauty and serenity of mountain peaks.</p>
          </div>
        </div>
  </div>
  <button class="slider-btn next" aria-label="Next Slide">&#10095;</button>
</section>

<!-- Featured Videos Section -->
<section class="featured-videos-section" data-aos="fade-up" data-aos-delay="400">
  <h2 class="featured-videos-title">Featured Videos</h2>
  <div class="featured-videos-grid">
    <div class="featured-video">
      <iframe width="360" height="215" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Inspiration for Creators</div>
    </div>
    <div class="featured-video">
      <iframe width="360" height="215" src="https://www.youtube.com/embed/ysz5S6PUM-U" title="YouTube video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Modern Web Design Trends</div>
    </div>
    <div class="featured-video">
      <iframe width="360" height="215" src="https://player.vimeo.com/video/76979871" title="Vimeo video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Creative Motion Graphics</div>
    </div>
    <div class="featured-video">
      <iframe width="360" height="215" src="https://www.youtube.com/embed/3fumBcKC6RE" title="YouTube video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Amazing Nature Documentary</div>
    </div>
    <div class="featured-video">
      <iframe width="360" height="215" src="https://www.youtube.com/embed/tgbNymZ7vqY" title="YouTube video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Travel the World</div>
    </div>
    <div class="featured-video">
      <iframe width="360" height="215" src="https://player.vimeo.com/video/137857207" title="Vimeo video" frameborder="0" allowfullscreen></iframe>
      <div class="video-caption">Art & Animation</div>
    </div>
  </div>

<!-- Gallery Section -->
<section class="gallery-section">
  <h2 class="gallery-title">Photo Gallery</h2>
  <div class="gallery-grid gold-gallery">
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1465101178521-cb6e446a8fdf?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="City Night">
        <img src="https://images.unsplash.com/photo-1465101178521-cb6e446a8fdf?auto=format&fit=crop&w=600&q=80" alt="City Night" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">City Night</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Mountains">
        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80" alt="Mountains" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Mountains</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Nature">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Nature" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Nature</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Workspace">
        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80" alt="Workspace" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Workspace</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Design">
        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Design" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Design</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1465101178521-cb6e446a8fdf?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="City Night 2">
        <img src="https://images.unsplash.com/photo-1465101178521-cb6e446a8fdf?auto=format&fit=crop&w=600&q=80" alt="City Night 2" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">City Night 2</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Mountains 2">
        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80" alt="Mountains 2" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Mountains 2</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Nature 2">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Nature 2" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Nature 2</span>
      </a>
    </div>
    <!-- Add more images for a fuller gallery -->
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Workspace 2">
        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80" alt="Workspace 2" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Workspace 2</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Design 2">
        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Design 2" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Design 2</span>
      </a>
    </div>
    <div class="gallery-item gold-item">
      <a href="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" class="gallery-link" data-caption="Nature 3">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Nature 3" loading="lazy" onerror="this.src='https://via.placeholder.com/220x150?text=No+Image';">
        <span class="gallery-caption">Nature 3</span>
      </a>
    </div>
  </div>
</section>
</section>
      <button class="slider-btn prev" aria-label="Previous slide">&#10094;</button>
      <button class="slider-btn next" aria-label="Next slide">&#10095;</button>
    </div>
  </section>
</section>

<?php if ( have_posts() ) : ?>
  <div class="row">
    <div class="col-md-8">
      <div class="row g-4">
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class('col-12'); ?> id="post-<?php the_ID(); ?>">
          <div class="card h-100">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="thumbnail-img"><?php the_post_thumbnail('medium_large', array('class'=>'card-img-top')); ?></div>
            <?php endif; ?>
            <div class="card-body">
              <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <small class="text-muted d-block mb-2">
                Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(', '); ?>
              </small>
              <div class="card-text"><?php the_excerpt(); ?></div>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      </div>
      <div class="my-4"><?php mytheme_pagination(); ?></div>
    </div>
    <aside class="col-md-4">
      <?php get_sidebar( 'primary' ); ?>
    </aside>
  </div>
<?php else : ?>
  <p><?php _e('No posts found.', 'your-textdomain'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
