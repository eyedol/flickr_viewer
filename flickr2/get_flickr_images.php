<?php
/**
 * Get images from flickr 
 */
require_once('lib/phpflickr-3-1/phpFlickr.php');
class GetFlickrImages {
    private $images = array();
    private $username;
    private $owner;
    private $flickr;
    private $photo_urls;
    
    public function __construct(){
        
        $this->username = "73308752@N00";
        
         // create instance of phpFlickr class 
        $this->flickr = new phpFlickr('7ffd3c4b9d9f3a486b67124d5b530f11');     
        //enable caching 
        //$this->flickr->enableCache("db","mysql://addhog_webdb:webusr_p455wd@localhost/addhog_webby");

    }

    /**
     * get images from flickr
     * @author - Henry Addo
     * @access - public 
     * @return - Array of images
     */
    public function get_images($tags="") {
      
        //get the friendly URL of the the users' photos

        $photos_url = $this->flickr->urls_getUserPhotos( $this->username );
      
      
        // get 200 images of public images of the user
        if( strlen($tags) > 0 ) {
            $ph = $this->flickr->photos_search( array( 'tags'=>$tags,
                'per_page'=> 200 ) );
            $photos =  $ph['photo'];
        } else {
            $ph = $this->flickr->people_getPublicPhotos($this->username, NULL, 200);
            $photos = $ph['photos']['photo'];
        }
        // loop through the photos 
        foreach( $photos as $photo ) {
            $this->images[] = "<li><a href=\"".$this->flickr->buildPhotoURL($photo)."\" class=\"floatbox\" rev=\"group:pix\">
            <img border=\"0\" class=\"thumbnail\"  alt=\"$photo[title]\" title=\"$photo[title]\"
            src=\"".$this->flickr->buildPhotoURL($photo,'Square')."\" 
            onclick=\"get_image_id('".
            $this->flickr->buildPhotoURL($photo).
            "','$photo[title]')\"/></a></li>";
            $owner = $this->flickr->people_getInfo( $photo['owner'] );
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
