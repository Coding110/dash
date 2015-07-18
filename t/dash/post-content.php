<?php
if(is_page()):
the_content();
else: ?>
<div class="blog_post">
		<div class="blog_postcontent">
        <?php if(has_post_thumbnail()) :?>
		<div class="image_frame">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('small_thumbs'); ?>
		</a>
		</div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
		<ul class="post_meta_links">
		<li><?php echo get_the_date(); ?></li>				
                <li class="post_by"><i><?php _e('by:',gr_td); ?>&nbsp;</i> <?php the_author(); ?></li>
				<?php if(get_the_tag_list() != '' ) { ?>
                <li class="post_categoty"><i><?php _e('in:',gr_td); ?>&nbsp;</i> <?php the_tags('', ' ', ''); ?></li>
				<?php } ?>
                <li class="post_comments"><i><?php _e('note:',gr_td); ?>&nbsp;</i><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
        </ul>
        <div class="clearfix"></div>
        <div class="margin_top1"></div>
		<?php endif; ?>            
		<?php the_content(__('Read more...',gr_td)); 
		$defaults = array(
              'before'           => '<div class="pagination">' . __( 'Pages:',gr_td ),
              'after'            => '</div>',
	          'link_before'      => '',
	          'link_after'       => '',
	          'next_or_number'   => 'number',
	          'separator'        => ' ',
	          'nextpagelink'     => __( 'Next page'  ,gr_td),
	          'previouspagelink' => __( 'Previous page' ,gr_td),
	          'pagelink'         => '%',
	          'echo'             => 1
	          );
	          wp_link_pages( $defaults );
			  ?>
		</div>
<style>
</style>
		<div name="dashmain" id="dash-main-id-aabbdd" class="dash-main-3 aabbdd-100"></div>
		<script type="text/javascript" charset="utf-8" src="/static/ds.js"></script>
</div>
<?php endif;?>
