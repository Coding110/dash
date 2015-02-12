<div class="site-search-area">
	<form method="post" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div>
        <input class="ainput-text" name="s" id="s" value="Enter Search Blog..."  onFocus="if (this.value == 'Enter Search Blog...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter Search Blog...';}" type="text" />
        <input id="searchsubmit" value="Search" type="submit" />
        </div>
    </form>
</div><!-- end site search -->