    function create_project_carousel(){
       $args = array(
           "post_type" => "projects",
           "posts_per_page" => -1,
       );
       $wp_query = new WP_Query($args);
       if($wp_query->have_posts() ){
		   ?>
            <div id="project_carousel" class="owl-carousel post owl-theme">
			   <?php
           while($wp_query->have_posts()){
               $wp_query->the_post(); ?>
               <div class="item">
				   <a href = "<?= get_permalink() ?>">
                                <div class="user-info">
                                <div class="f-image">
                                <img src="<?= get_the_post_thumbnail_url() ?>"/>
                                </div>
                                <div class="info">
                                    <h4><?= get_the_title() ?></h4>
                                    <p class="content"><?= get_the_content() ?>'</p>
                                </div>
                                </div>
				   				<div class = "view">
				   					<a href = "<?= get_permalink() ?>">View Now</a>
									<a href = "<?= get_permalink() ?>"><img src="<?php echo home_url(); ?>/wp-content/uploads/2022/12/Vector-8.png"></a>
				   				</div>
				   </a>
                        </div>
<?php
           }
?>
           </div>
<?php
       }
	wp_reset_postdata();
    }
    add_shortcode("project-grid", "create_project_carousel");
 ?>
