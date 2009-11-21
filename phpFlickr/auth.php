<?
    /* Last updated with phpFlickr 1.3.1
     *
     * Edit these variables to reflect the values you need. $default_redirect 
     * and $permissions are only important if you are linking here instead of
     * using phpFlickr::auth() from another page or if you set the remember_uri
     * argument to false.
     */
    $api_key                 = "7ffd3c4b9d9f3a486b67124d5b530f11";
    $api_secret              = "cb0165b38f2041c1";
    $default_redirect        = "/";
    $permissions             = "read";
    $path_to_phpFlickr_class = "./";

    ob_start();
    require_once($path_to_phpFlickr_class . "phpFlickr.php");
    unset($_SESSION['phpFlickr_auth_token']);
     
	if (!empty($_GET['extra'])) {
		$redirect = $_GET['extra'];
	}
    
    $f = new phpFlickr($api_key, $api_secret);
 
    if (empty($_GET['frob'])) {
        $f->auth($permissions, false);
    } else {
        $f->auth_getToken($_GET['frob']);
	}
    
    if (empty($redirect)) {
		header("Location: " . $default_redirect);
    } else {
		header("Location: " . $redirect);
    }
 
?>
