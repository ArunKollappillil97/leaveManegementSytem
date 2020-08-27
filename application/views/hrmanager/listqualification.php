  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Qualification
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">HR Manager</a></li>
        <li class="active">View Qualification</li>
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
              <h3 class="box-title">Qualification</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post" name="table">
              <div class="box-body">
<div class="w3-container">
  <table class="table table-striped">
    <tr>
      <th>Sl</th>
      <th>COURSE</th>
      <th>STREAM</th>
      
    </tr>
    <tbody>
         <?php  
           $i=1;
         foreach ($qual->result() as $row)  
         {  
            ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->course?></td>
                    <td><?php echo $row->stream;?></td> 
                    
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