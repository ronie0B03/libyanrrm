<?php
  require_once('process_post.php');
  include('sidebar.php');

  // $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  // $getURI = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  // $_SESSION['getURI'] = $getURI;

  // $getOwnStatus = mysqli_query($mysqli, "SELECT u.id, u.firstname, u.lastname, up.user_post, up.user_location, up.date_added
  //   FROM user_posts up
  //   JOIN users u
  //   ON u.id = up.user_id
  //   WHERE up.user_id='$user_id'
  //   ORDER BY date_added DESC
  //   LIMIT 1");

  // //Get user suggestions
  // $getUsersSuggestion = mysqli_query($mysqli, "SELECT * FROM users
  //   WHERE (id NOT IN (SELECT from_user_id FROM user_links WHERE from_user_id = '$user_id')
  //   AND id NOT IN (SELECT to_user_id FROM user_links WHERE from_user_id = '$user_id'))
  //   AND  
  //   (id NOT IN (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id')
  //   AND id NOT IN (SELECT to_user_id FROM user_links WHERE to_user_id = '$user_id'))
  //   AND id <> '$user_id'
  //   LIMIT 10");
  
  // //Get Friends Posts
  // $getFriendsPost = mysqli_query($mysqli, "SELECT * 
  //   FROM user_posts up
  //   JOIN users u
  //   ON u.id = up.user_id
  //   WHERE (up.user_id IN
  //          (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id' AND linked = 'true')
  //   OR up.user_id IN
  //          (SELECT to_user_id FROM user_links WHERE from_user_id = '$user_id' AND linked = 'true'))
  //   ORDER BY up.date_added DESC
  //   LIMIT 10");
  // #print_r($getFriendsPost);
  $user_post_locations = mysqli_query($mysqli, 
  "SELECT distinct user_status, user_long, user_lat
   FROM user_posts
   WHERE user_status is not null AND
          user_long is not null AND
          user_lat is not null");

?>
<title>Safe Locations - Map</title>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php require('topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php
        if(isset($_SESSION['message'])){?>
          <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>
          <?php } ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Safe Location</h1>
          </div>

        <div class="row">
            <div class="col-md-10" style="/* width: 70%;height:500px;background-color:green; */">
                <!-- Feed Container -->
                
                <div id="map" style="width:100%;height:500px;"></div>                
            </div>
            <div class="col-md-2">
                <div style="display:flex;height:30px;width:100%;box-sizing:border-box;">
                    <img src="img/safe_location.png" height="30" width="30" />
                    <span style="line-height:30px;font-weight:bold;margin:0px 10px"> Safe </span>
                </div>
                <div style="display:flex;height:30px;width:100%;box-sizing:border-box;">
                    <img src="img/danger_location.png" height="30" width="30" />
                    <span style="line-height:30px;font-weight:bold;margin:0px 10px"> Danger </span>
                </div>
            </div>
        </div>
<!-- Own Status always on on top -->

<?php
  include('footer.php');
?>

<script>
$(document).ready(function(){
    $("#nav-item-home").removeClass("active");
    $("#nav-item-safelocation").addClass("active");
});
var map;


function initMap() {
    
  //var libya = {lat: 26.0773223, lng: 16.1605419};
  var libya = {lat: 15.4130117, lng: 121.3646784};
    
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 9,  
      mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP]
      },
      streetViewControl: false,center: libya});      

      var safe_image = {
    url: 'img/safe_location.png',
    size: new google.maps.Size(50, 50),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(25, 25)
  };
  var danger_image = {
    url: 'img/danger_location.png',
    size: new google.maps.Size(50, 50),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(25, 25)
  };

  <?php 

    while($row = $user_post_locations->fetch_assoc()){
      
      $status_images = ["safe" => "safe_image",
      "danger"=>"danger_image"];
      $status_image = $status_images[$row["user_status"]];
      $lat = $row["user_lat"];
      $lng = $row["user_long"];
     

    echo "
    new google.maps.Marker({position: {lat: $lat, lng: $lng}, map: map , icon:$status_image});
    ";
    }

    // new google.maps.Marker({position: {lat: -26.344, lng: 132.036}, map: map , icon:danger_image});
    // new google.maps.Marker({position: {lat: -27.344, lng: 132.036}, map: map , icon:danger_image});
    // new google.maps.Marker({position: {lat: -28.344, lng: 134.036}, map: map , icon:danger_image});  
    // new google.maps.Marker({position: {lat: -25.344, lng: 134.036}, map: map , icon:safe_image});  
    // new google.maps.Marker({position: {lat: -28.544, lng: 130.036}, map: map , icon:safe_image});  
    // new google.maps.Marker({position: {lat: -31.344, lng: 134.036}, map: map , icon:safe_image});
  ?>

}
</script>
 <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyArrxFTbz_rmzdZg68nNyMmWkTARS_hfrY&callback=initMap' async defer></script>
