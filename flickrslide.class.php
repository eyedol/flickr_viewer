<?php
/**
 * This class provides the necessary functions 
 * to display the flickr images
 * Copyright Henry Addo 2007
 */
 class FlickrSlide 
 {
    
    public $header = ""; // holds html header stuff
    public $body = ""; // body of the page
    public $footer = ""; // footer message
    
    // default constructor 
    public function __construct() {
    }
    /**
     * This set all the html header stuff to build 
     * the html page
     * @author - Henry Addo
     * @access - public 
     * @param - String title - the title of the page
     * @return - String the html header 
     */
    public function set_header( $title ) {
      $this->header = <<<HTML
        <html>
          <head>
            <title>$title</title>
            <link rel="stylesheet" type="text/css" 
              href="yui/container/assets/container.css">
            <link rel="stylesheet" type="text/css"
              href="css/style.css">
            <!-- including yui libraries -->
            <script type="text/javascript" src="yui/build/yahoo/yahoo.js">
            </script>
            <script type="text/javascript" src="yui/build/event/event.js">
            </script>
            <script type="text/javascript" src="yui/build/animation/animation.js">
            </script>
            <script type="text/javascript" src="yui/build/container/container.js">
            </script>
            <script type="text/javascript" src="yui/build/dragdrop/dragdrop.js">
            </script>
            <script type="text/javascript" src="yui/build/slider/slider.js">
            </script>
            <script type="text/javascript" src="yui/build/dom/dom.js">
            </script>
            <script type="text/javascript" src="js/flickrslide.js">
            </script>
          </head>
HTML;
      return $this->header;
    }
    
    /**
     * This builds the body of the page 
     * so we can view the slide show 
     * @author - Henry Addo
     * @access - public 
     * @param - thumbnails list of images return by phpflickr
     * @param - owner of the photos
     * @return - String the html page 
     */
    public function set_body( $thumbnails, $owner ) {
      $this->body = <<<HTML
        <body>
        <div id="page_wrapper">
          <div id="doc">
            <h3>$owner's flickr photos</h3>
            <div id="real_image">
             click on a thumbnail to view actual image
            </div>
            <div id="instructions">&nbsp;</div>
            <div id="info">
                <a href="#" id="move-left">&larr;</a>
                <div class="mod">
                  <ul id="themes">
HTML;
                    foreach( $thumbnails as $thumbnail ) {
                      $this->body .=$thumbnail;
                    }
       $this->body .= <<<HTML
                  </ul>
                </div>
                <a href='#' id="move-right">&rarr;</a>
            </div>
          </div>
HTML;
       return $this->body;      
    }
    
    /**
     * This builds the footer of the page 
     * @author - Henry Addo
     * @access - public 
     * @param - String footer_msg - the footer message
     * @return - String the footer details of the 
     * page
     */
    public function set_footer( $footer_msg ) {
      $this->footer = <<<HTML
            <div id="footer">
              $footer_msg
            </div>
          </div>
        </body>
       </html>
HTML;
      return $this->footer;
    }
 }
 $flickrslide = new FlickrSlide();
?>
