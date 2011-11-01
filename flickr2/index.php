<!DOCTYPE html> 
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FlickrViewer</title>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="js/floatbox/floatbox.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/floatbox/floatbox.js"></script>

</head>
<body>
<div class="topbar" >
      <div class="topbar-inner">
        <div class="container">         
            <a class="brand" href="#">FlickrViewer</a>
            <form class="pull-right" action="" method="post">
            <input type="text" name="tags" placeholder="Search" />
          </form>
        </div>
    </div>
</div>
<div class="inner">
    <div class="container">
        <h1>FlickrViewer</h1>
        <p class="lead">
            <br />
        </p>
    </div><!-- /container -->
</div><!-- content body -->
<div class="container">
    <ul class="media-grid">
        <?php 
        require_once('get_flickr_images.php');
        global $flickr_images;
        //check if user is search
        if((isset($_POST['tags'])) AND (strlen(trim($_POST['tags'])) > 0 )){
            $thumbnails = $flickr_images->get_images($_POST['tags']);
        }
        else {
            $thumbnails = $flickr_images->get_images();
        }
        foreach($thumbnails as $thumbnail) {
            print $thumbnail;
        }
        ?>
      </ul>
</div>

<div class="container">
    <footer class="footer">
        <div class="container">
            <div class="container">
                <div class="pull-right">
                    <a href="http://codedinafrica.appspot.com/">
                        <img src="images/coded_in_africa.png" border="0" alt="Made in Ghana" /></a> &nbsp;
                    <img src="images/ghana_made.jpg" border="0" alt="Made in Ghana" />
                </div> 
                <p>
                    Copyright &copy; 2007 - <?php echo date("Y"); ?> FlickrViewer
                </p>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
