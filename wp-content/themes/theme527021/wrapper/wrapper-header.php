<?php /* Wrapper Name: Header */ ?>
<div class="header_top">
	<div class="row">
		<div class="span4">
			<div class="" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="header-sidebar-1">
				<?php dynamic_sidebar("header-sidebar-1"); ?>
			</div>
		</div>
		<div class="span2">
			<div class="" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="header-sidebar-1">
				<?php dynamic_sidebar("header-sidebar-2"); ?>
			</div>
		</div>
		<div class="span3">
			<div class="" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="header-sidebar-1">
				<?php dynamic_sidebar("header-sidebar-3"); ?>
			</div>
		</div>
		<div class="span4">
			<div class="" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="header-sidebar-4">
				<?php dynamic_sidebar("header-sidebar-4"); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span3">
		<div class="row">
			<div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
				<?php get_template_part("static/static-logo"); ?>
			</div>
			<div class="span3 hidden-phone" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
				<?php get_template_part("static/static-search"); ?>
			</div>
		</div>
	</div>
	
	<div class="span9" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
		<?php get_template_part("static/static-nav"); ?>
	</div>
</div>
