  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Staff
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff</a></li>
        <li class="active">View Staff</li>
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
              <h3 class="box-title">Staff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post" name="table">
              <div class="box-body">
<div class="w3-container">
  <table class="table table-striped">
    <tr>
      <th>Sl</th>
      <th>PHOTO</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>DESIGNATION</th>
      <th>view</th>
    </tr>
    <tbody>
         <?php  
           $i=1;
         foreach ($staff as $key=>$row)  
         {  
            ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><img class="profile-user-img img-responsive img-circle"src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $row['photo']?>" class="img-circle" width="30px" alt="User Image"></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['designation']?></td> 
                    <td><a class="btn btn-info" href="<?php echo base_url('StaffController/profileviewadmin/'. $row['Staff_id'].''); ?>">View</a> </td> 
                  </tr>
             <?php 
             $i++;}  
         ?>  
          </tbody>
    </table>


</div>
              </div>
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