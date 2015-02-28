<?php $wl_theme_options = weblizar_get_options(); ?>
<?php get_header(); ?>
<!-- Slider ======================================= -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>        
        <li data-target="#myCarousel" data-slide-to="2"></li>        
        <li data-target="#myCarousel" data-slide-to="3"></li>        
      </ol>
      <div class="carousel-inner">		
        <div class="item active">
			<?php if($wl_theme_options['slide_image'] !='') { ?> 
			<img src="<?php echo $wl_theme_options['slide_image']; ?>" class="img-responsive" alt="First slide">	
			<?php } ?>
			<div class="container">
				<div class="carousel-caption">	
				<?php if($wl_theme_options['slide_title'] !='') { ?> <p><strong><?php echo  $wl_theme_options['slide_title']; ?></strong></p>	<?php } ?>
				<?php if($wl_theme_options['slide_desc'] !='') { ?>
				<p><?php echo  $wl_theme_options['slide_desc']; ?></p>
				<?php } ?>
				<?php if($wl_theme_options['slide_desc'] !='') { ?>
				<!--
				<p><a class="btn btn-lg btn-primary" target="_blank" href="<?php if($wl_theme_options['slide_btn_link'] !='') { echo $wl_theme_options['slide_btn_link']; }  ?>" role="button"><?php echo $wl_theme_options['slide_btn_text']; ?></a></p>
				-->
				<?php } ?>
				</div>
			</div>
        </div>
		 <div class="item">			
		  <?php if($wl_theme_options['slide_image_0'] !='') { ?><img src="<?php echo  $wl_theme_options['slide_image_0']; ?>" class="img-responsive" alt="First slide"><?php } ?>
			<div class="container">
				<div class="carousel-caption">	
					<?php if($wl_theme_options['slide_title_0'] !='') { ?> <p><strong><?php echo  $wl_theme_options['slide_title_0']; ?></strong></p>	<?php } ?>
					<?php if($wl_theme_options['slide_desc_0'] !='') { ?> <p><?php echo  $wl_theme_options['slide_desc_0']; ?></p><?php } ?>
					<?php if($wl_theme_options['slide_btn_text_0'] !='') { ?>
				<!--
					<p><a class="btn btn-lg btn-primary" target="_blank" href="<?php if($wl_theme_options['slide_btn_link_0'] !='') { echo $wl_theme_options['slide_btn_link_0']; }  ?>" role="button"><?php echo $wl_theme_options['slide_btn_text_0']; ?></a></p>
					-->
					<?php } ?>
				</div>
			</div>
        </div>	
		 <div class="item">			
		  <?php if($wl_theme_options['slide_image_1'] !='') { ?><img src="<?php echo  $wl_theme_options['slide_image_1']; ?>" class="img-responsive" alt="First slide"><?php } ?>
			<div class="container">
				<div class="carousel-caption">	
					<?php if($wl_theme_options['slide_title_1'] !='') { ?> <p><strong><?php echo  $wl_theme_options['slide_title_1']; ?></strong></p>	<?php } ?>
					<?php if($wl_theme_options['slide_desc_1'] !='') { ?> <p><?php echo  $wl_theme_options['slide_desc_1']; ?></p><?php } ?>
					<?php if($wl_theme_options['slide_btn_text_1'] !='') { ?>
				<!--
					<p><a class="btn btn-lg btn-primary" target="_blank" href="<?php if($wl_theme_options['slide_btn_link_1'] !='') { echo $wl_theme_options['slide_btn_link_1']; }  ?>" role="button"><?php echo $wl_theme_options['slide_btn_text_1']; ?></a></p>
					-->
					<?php } ?>
				</div>
			</div>
        </div>	
		<div class="item">			
			<?php if($wl_theme_options['slide_image_2'] !='') { ?><img src="<?php echo  $wl_theme_options['slide_image_2']; ?>" class="img-responsive" alt="First slide"><?php } ?>
			<div class="container">
				<div class="carousel-caption">	
					<?php if($wl_theme_options['slide_title_2'] !='') { ?> <p><strong><?php echo  $wl_theme_options['slide_title_2']; ?></strong></p><?php } ?>
					<?php if($wl_theme_options['slide_desc_2'] !='') { ?><p><?php echo  $wl_theme_options['slide_desc_2']; ?></p><?php } ?>
					<?php if($wl_theme_options['slide_btn_text_2'] !='') { ?>
					<!--
					<p><a class="btn btn-lg btn-primary" target="_blank" href="<?php if($wl_theme_options['slide_btn_link_2'] !='') { echo $wl_theme_options['slide_btn_link_2']; }  ?>" role="button"><?php echo $wl_theme_options['slide_btn_text_2']; ?></a></p>
					-->
					<?php } ?>
				</div>
			</div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
 </div><!-- /.carousel -->

<div class="feature_section1">
	<div class="container">
		<h2><?php 			
			if($wl_theme_options['home_service_title'] !='') { 	echo $wl_theme_options['home_service_title']; } 
			if($wl_theme_options['home_service_description'] !='') {  ?>
			<b><?php echo $wl_theme_options['home_service_description']; ?></b>
			<?php } ?>
		</h2>
		<div class="margin_top3"></div>		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="100">		
			<div class="arrow_box"><?php if($wl_theme_options['service_1_icons'] !='') { echo "<i class='".$wl_theme_options['service_1_icons']. "'></i>";  }?></div>			
			<?php if($wl_theme_options['service_1_title'] !='') { ?><a href="<?php echo $wl_theme_options['service_1_link'];  ?>"><h5 class="caps"><?php echo $wl_theme_options['service_1_title'];  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_1_text'] !='') { echo "<p>".apply_filters('the_content', $wl_theme_options['service_1_text'], true). "</p>"; } ?>
		</div>		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="100">		
			<div class="arrow_box"><?php if($wl_theme_options['service_2_icons'] !='') { echo "<i class='".$wl_theme_options['service_2_icons']. "'></i>"; } ?></div>			
			<?php if($wl_theme_options['service_2_title'] !='') { ?><a href="<?php echo $wl_theme_options['service_2_link'];  ?>"><h5 class="caps"><?php echo $wl_theme_options['service_2_title'];  ?></a></h5><?php } ?>
			<?php if($wl_theme_options['service_2_text'] !='') { echo "<p>".apply_filters('the_content', $wl_theme_options['service_2_text'], true). "</p>";  }?>
		</div>		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="100">			
			<div class="arrow_box"><?php if($wl_theme_options['service_3_icons'] !='') { echo "<i class='".$wl_theme_options['service_3_icons']. "'></i>"; } ?></div>			
			<?php if($wl_theme_options['service_3_title'] !='') { ?><a href="<?php echo $wl_theme_options['service_3_link'];  ?>"><h5 class="caps"><?php echo $wl_theme_options['service_3_title'];  ?></a></h5><?php } ?>
			<?php if($wl_theme_options['service_3_text'] !='') { echo "<p>".apply_filters('the_content', $wl_theme_options['service_3_text'], true). "</p>"; } ?>	
		</div>		
		<div class="one_fourth last animate" data-anim-type="fadeIn" data-anim-delay="400">		
			<div class="arrow_box"><?php if($wl_theme_options['service_4_icons'] !='') { echo "<i class='".$wl_theme_options['service_4_icons']. "'></i>"; } ?></div>			
			<?php if($wl_theme_options['service_4_title'] !='') { ?><a href="<?php echo $wl_theme_options['service_4_link'];  ?>"><h5 class="caps"><?php echo $wl_theme_options['service_4_title'];  ?></h5></a><?php } ?>
			<?php if($wl_theme_options['service_4_text'] !='') { echo "<p>".apply_filters('the_content', $wl_theme_options['service_4_text'], true). "</p>"; } ?>	
		</div>				
	</div>
	<div class="margin_top5"></div>
</div><!-- end of service section1 -->
<div class="clearfix"></div>
<?php get_footer(); ?>
