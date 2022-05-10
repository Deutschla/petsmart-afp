<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_filter( 'get_search_form', 'yakeen_search_form' );
function yakeen_search_form(){
	$output =  '
	<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="custom-search-input">
			<div class="input-group">
			<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search Here ...', 'yakeen-core' ) . '" value="' . get_search_query() . '" name="s" />
				<button class="btn" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</form>
	';
	return $output;
}