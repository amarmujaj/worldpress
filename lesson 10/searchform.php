<?php

$unique_id = esc_attr(uniqid("search-from"));

?>
<form role="search" method="get" class="search-from"
 action ="<?php echo esc-url(home_url('/'));?>">
 <label class="screen-reader text " for="<?php echo $unique_id?>">
    <?php  _e('search form:','your-textdomain');?>
 </label>


 <input type="search" id="<?php echo $unique_id; ?>"
 class="search-field"
 placeholder="<?php esc_atter_e("search...","your-textdomain")?>"
 value="<?php echo get_search_query(); ?>" name="s"/>

 <input type="submit" 
 class="search-submit"
 value="<?php echo esc_attr_e('Search','your-textdomain');?>">
</form>





