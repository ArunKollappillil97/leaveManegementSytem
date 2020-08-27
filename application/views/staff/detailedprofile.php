  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff</a></li>
        <li class="active">Staff Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="post">
               <?php  
         foreach ($staff->result() as $row)  
         {  
            ?>
            <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle"src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $row->photo ?>" class="img-circle" width="50px" alt="User Image">
              <h3 class="profile-username text-center"><?php echo $row->name?></h3>

              <p class="text-muted text-center"><?php echo $row->designation?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $row->email?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo $row->phone?></a>
                </li>
                <li class="list-group-item">
                  <b>DOB</b> <a class="pull-right"><?php echo $row->dob?></a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="pull-right"><?php echo $row->address?></a>
                </li>
                <li class="list-group-item">
                  <b>University</b> <a class="pull-right"><?php echo $row->university?></a>
                </li>
                <li class="list-group-item">
                  <b>Stream</b> <a class="pull-right"><?php echo $row->stream?></a>
                </li>
                <li class="list-group-item">
                  <b>Course</b> <a class="pull-right"><?php echo $row->course?></a>
                </li>
                <li class="list-group-item">
                  <b>Institute</b> <a class="pull-right"><?php echo $row->institution?></a>
                </li>
                <li class="list-group-item">
                  <b>Year of pass</b> <a class="pull-right"><?php echo $row->yop?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <?php 
          }  
         ?> 
              </form>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  