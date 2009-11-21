<?php
  /**
   * Get images from flickr 
   */
  require_once('phpFlickr/phpFlickr.php');
  class GetFlickrImages {
    public $images = array();
    public $owner;
    public function __construct(){
    }

    /**
     * get images from flickr
     * @author - Henry Addo
     * @access - public 
     * @return - Array of images
     */
    public function get_images() {
      $username = "73308752@N00";
      $photo_urls = "http://www.flickr.com/photos/eyedol/";
      $tags = "tedglobal2007";
      // create instance of phpFlickr class 
      $flickr = new phpFlickr('7ffd3c4b9d9f3a486b67124d5b530f11');
      
      //enable caching 
      $flickr->enableCache("db","mysql://addhog_webdb:webusr_p455wd@localhost/addhog_webby");
      
      //authenticate
      //$flickr->auth();
      
      //get token
      //$token = $token['user']['nsid'];

      // get NSID of the username
      //$nsid = $token['user']['nsid'];
      
      $user = $flickr->people_findByUsername($username);

      //get the friendly URL of the the users' photos
      $photos_url = $flickr->urls_getUserPhotos( $username );
      
      
      // get 20 images of public images of the user
      $photos = $flickr->photos_search( array( 'tags'=>$tags,
        'per_page'=> 200 ) );
      //$photos = $flickr->people_getPublicPhotos($username, NULL, 36);
      
      
      // loop through the photos 
      foreach( (array)$photos['photo'] as $photo ) {
        $this->images[] = "<li><a href=\"#\">
        <img  alt='$photo[title]' title='$photo[title]'
        src=\"".$flickr->buildPhotoURL($photo,'Square')."\" 
        onclick=\"get_image_id('".
        $flickr->buildPhotoURL($photo).
        "','$photo[title]')\"/></a></li>";
        $owner = $flickr->people_getInfo( $photo[owner] );
        $this->owner = $owner['username'];
      }

      return $this->images;

    }

    /** 
     * get flickr owner
     * @author - Henry Addo
     * @access - public 
     * @return - owner - owner of the photos
     */
    public function get_owner() {
      return $this->owner;
    }

  }
  $flickr_images = new GetFlickrImages();
?>
