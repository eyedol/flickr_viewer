<?php
 require_once( "flickrslide.class.php" );
 require_once( "get_flickr_images.php" );
 global $flickrslide,$flickr_images;
 
 echo $flickrslide->set_header("flickrslide");
 echo $flickrslide->set_body( $flickr_images->get_images(), 
 
 $flickr_images->get_owner());
 $footer_msg ="&copy 2007 <img src=\"im/ghana_made.jpg\" />";
 
 echo $flickrslide->set_footer( $footer_msg );
?>
