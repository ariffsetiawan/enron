<?php

/*global color*/
	
		if ( function_exists( 'ot_get_option' ) ) {
			  $color = ot_get_option( 'global_color' );			  
			  
		}
		

if($color){
?>
<style>
a {
color: <?php echo $color;?>;
text-decoration: none
}


.btn-orange {
color: #fff;
background: <?php echo $color;?>;
-webkit-font-smoothing: antialiased;
}

.btn-black i {
  color: <?php echo $color;?>;
}

.menu .current_page_item a,
.menu a:hover,
.menu .sfHover > a {
  color: #fff;
  background: <?php echo $color;?>;
  -webkit-font-smoothing: antialiased;
}


.menu .current_page_item:before,
.menu li:hover:before,
.menu .sfHover:before {
  content: "";
  position: absolute;
  border: 5px solid transparent;
  border-top: 0;
  border-bottom-color: <?php echo $color;?>;
  top: -5px;
  left: 50%;
  margin-left: -5px;
}

.menu .current_page_item a:after,
.menu a:hover:after,
.menu .sfHover a:after {
  content: "";
  position: absolute;
  border-style: solid;
  border-width: 3px;
  border-color: <?php echo $color;?> <?php echo $color;?> transparent transparent;
  bottom: -6px;
  left: -6px;
}


.menu .current_page_item a:before,
.menu a:hover:before,
.menu .sfHover a:before {
  content: "";
  position: absolute;
  height: 5px;
  background: <?php echo $color;?>;
  bottom: -5px;
  left: 0;
  width: 100%;
}


.menu ul ul {
  display: none;
  width: 150px;
  background: <?php echo $color;?>;
}

.slider-section .owl-page:hover span,
.portfolio-slider .owl-page:hover span,
.entry-post .media-slider .owl-page:hover span {
  background: <?php echo $color;?>
}

.slider-black-pattern .slide-title .color {
  color: <?php echo $color;?>;
}

.item-rounded-item:hover .item-rounded-title a {
  color: <?php echo $color;?>;
}

.enron-carousel .owl-prev:hover,
.enron-carousel .owl-next:hover {
  color: <?php echo $color;?>;
}

.blog-item-header a:hover {
  color: <?php echo $color;?>;
}

.blog-item-header a:hover .blog-item-icon {
  background: <?php echo $color;?>
}

.section-tabbed .tab-nav a:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background: <?php echo $color;?>;
  height: 1px;
  display: none;
}

.entry-title a:hover {
  color: <?php echo $color;?>;
}

.pagination a:hover {
  color: <?php echo $color;?>;
  border-color: #b8b8b8;
}

.comment-reply-link:hover,
.comment-entry .commenter-name a:hover {
  color: <?php echo $color;?>;
}

.price-header {
  color: #fff;
  background: <?php echo $color;?>;
  -webkit-font-smoothing: antialiased;
  text-shadow: 1px 1px 1px rgba(0,0,0,.15)
}

.widget-menu a:hover,
.widget_categories a:hover,
.widget-accordion .accordion-header:hover {
  color: <?php echo $color;?>;
}

.widget-contact .submit i {
  color: <?php echo $color;?>;
  position: relative;
  top: 2px;
  margin-left: 2px;
}


.social-links a:hover {
  color: <?php echo $color;?>;
}

</style>
<?php
}

?>