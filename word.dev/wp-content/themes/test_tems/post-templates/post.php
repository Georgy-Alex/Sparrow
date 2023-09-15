<article class="post">

                <div class="entry-header cf">

                   <h1>
                     <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
                  </h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24"><?php the_date( 'M jS, Y', true); ?></time>
                     /
                     <span class="categories">
                     <?php the_tags( '', ' / '); ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail('post_size') ?></a>
               </div>

               <div class="post-content">
                  <?php the_content(); ?>
               </div>
</article>