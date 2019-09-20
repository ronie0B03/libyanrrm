<?php
  require_once('process_post.php');
  include('sidebar.php');
  $getOwnStatus = mysqli_query($mysqli, "SELECT u.id, u.firstname, u.lastname, up.user_post, up.user_location, up.date_added
    FROM user_posts up
    JOIN users u
    ON u.id = up.user_id
    WHERE up.user_id='$user_id'
    ORDER BY date_added DESC
    LIMIT 3");
  $getUsersSuggestion = mysqli_query($mysqli, "SELECT * FROM users
    WHERE (id NOT IN (SELECT from_user_id FROM user_links WHERE from_user_id = '$user_id')
    AND id NOT IN (SELECT to_user_id FROM user_links WHERE from_user_id = '$user_id'))
    AND
    (id NOT IN (SELECT from_user_id FROM user_links WHERE to_user_id = '$user_id')
    AND id NOT IN (SELECT to_user_id FROM user_links WHERE to_user_id = '$user_id'))
    AND id <> '$user_id'
    LIMIT 10");
?>
<title>Home</title>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php require('topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">News Feed</h1>
          </div>

          <div class="row">
            <div class="col-md-8" style="/* width: 70%;height:500px;background-color:green; */">
              <!-- Feed Container -->
              <div class="card shadow row mb-2" style="/*height:150px ; background-color: red;*/">
                <div class="card shadow">
                  <div class="card-header" style="width: 100%;">
                    <h6 class="m-0 font-weight-bold" style="color: green;">Create Post</h6>
                  </div>                   
                 <div class="card-body">
                  <div class="text-center">
                  </div>
                    <form accept-charset="UTF-8" action="process_post.php" method="post">
                      <textarea class="form-control" placeholder="Write something about your status" id="status_text" name="status_text" style="min-height: 100px; max-height: 100px;" required></textarea>
                      <br/>
                      <button type="submit" class="btn btn-sm ml-auto float-right" style="background-color: green; color: white;" name="status_post">POST</button>
                      <br/>
                    </form>
                </div>
                </div>
              </div>
<?php while($newOwnStatus=$getOwnStatus->fetch_assoc()){
  $getDateAdded = date_create($newOwnStatus['date_added']);
  $date_added = date_format($getDateAdded, 'F j, Y');
  $time_added = date_format($getDateAdded, 'h:i A');
  $newDateAdded = $date_added.' at '.$time_added;
  ?>
            <div class="card shadow row mb-2">
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold"><a href="#" style="color: green;"><?php echo $newOwnStatus['firstname'].' '.$newOwnStatus['lastname'];  ?></a>
                    <span class="float-right font-weight-normal" style="font-size: 12px;"><?php echo $newDateAdded; ?></span></h6>
                </div>
                <div class="card-body">
                <!--  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div> -->
                  <p>
                    <?php echo  $newOwnStatus['user_post'];?>
                  </p>
                  <span style="font-size: 10px;" class="float-right">
                    <i class="far fa-compass"></i><!-- ADD LOCATION HERE --> Philippines</span>
                </div>
              </div>
            </div>
<?php } ?>
              <div class="card shadow row mb-2">
                <div class="card shadow">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold" style="color: green; ">Agiela Omar</h6>
                  </div>
                  <div class="card-body">
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>

                  </div>
                </div>
              </div>
              <!-- End Feed Container -->
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold" style="color: green;">Suggestions</h6>
                </div>
                <div class="card-body">
<?php while($newUsersSuggestion=$getUsersSuggestion->fetch_assoc()){ ?>                  
                  <!-- Content Suggestions -->
                  <div class="mb-2">
                    <div class="shadow alert alert-dismissible" style="font-size: 13px;" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <img style="width: 2rem;" src="img/img_avatar.png"> <?php echo $newUsersSuggestion['firstname'].' '.$newUsersSuggestion['lastname']; ?>
                       <br/>
                       <a href="process_post.php?addlink=<?php echo $newUsersSuggestion['id']; ?>" class="" style="color: green;">+ Send Link Request</a>
                    </div>
                  </div>                                       
                  <!-- End Content Suggestions -->
<?php } ?>
                 <center style="font-size: 11px;">--- NOTHING FOLLOWS ---</center>                   
                </div>                
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
  include('footer.php');
?>