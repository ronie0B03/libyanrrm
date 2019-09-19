<?php
  require_once('dbh.php');
  include('sidebar.php');
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
                <div class="card shadow col-md-12">
                  <div class="card-header">
                  <h6 class="m-0 font-weight-bold" style="color: green;">Create Post</h6>
                </div>                   
                 <div class="card-body">
                  <div class="text-center">
                  </div>
                    <form>
                      <textarea class="form-control" placeholder="Write something about your status"></textarea>
                      <br/>
                      <button class="btn btn-sm ml-auto float-right" style="background-color: green; color: white;">POST</button>
                      <br/>
                    </form>
                </div>
                </div>
              </div>

              <div class="card shadow row mb-2" style="/*height:150px ; background-color: red;*/">
                <div class="card shadow col-md-12">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold" style="color: green;">Ronie Bituin</h6>
                </div>                  
                 <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                </div>
              </div>

              <div class="card shadow row mb-2" style="">
                <div class="card shadow col-md-12">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold" style="color: green; ">Agiela Omar</h6>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
              </div>
              <!-- End Feed Container -->
            </div>

            <div class="col-md-4">
                <div class="card shadow col-md-12">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold" style="color: green;">Suggestions</h6>
                </div>
                <div class="card-body">
                  <!-- Content Suggestions -->
                  <div class="card shadow mb-2">
                    <div class="alert alert-dismissible" style="font-size: 12px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <img style="width: 2rem;" src="img/img_avatar.png"> Santiago James
                       <br/>
                       <a href="#" class="" style="color: green;">+ Add Link</a>
                    </div>
                  </div>
                  <div class="card shadow mb-2">
                    <div class="alert alert-dismissible" style="font-size: 12px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <img style="width: 2rem;" src="img/img_avatar.png"> Peter Pedro
                       <br/>
                       <a href="#" class="" style="color: green;">+ Add Link</a>
                    </div>
                  </div>
                  <div class="card shadow mb-2">
                    <div class="alert alert-dismissible" style="font-size: 12px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <img style="width: 2rem;" src="img/img_avatar.png"> Peter Pedro
                       <br/>
                       <a href="#" class="" style="color: green;">+ Add Link</a>
                    </div>
                  </div>
                  <div class="card shadow mb-2">
                    <div class="alert alert-dismissible" style="font-size: 12px;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <img style="width: 2rem;" src="img/img_avatar.png"> Peter Pedro
                       <br/>
                       <a href="#" class="" style="color: green;">+ Add Link</a>
                    </div>
                  </div>                                        
                  <!-- End Content Suggestions -->
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