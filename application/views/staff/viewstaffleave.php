  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Leave
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">HR Manager</a></li>
        <li class="active">View Leave</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

      <div class="row">

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Leave</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post" name="table">
              <div class="box-body">
<div class="w3-container">
  <table class="table table-striped">
    <tr>
      <th>Sl</th>
      <th>NAME</th>
      <th>REASON</th>
      <th>LEAVE TYPE</th>
      <th>LEAVE FROM</th>
      <th>LEAVE TO</th>
      <th>ACTIONS</th>
    </tr>
    <tbody>
         <?php  
           $i=1;
         foreach ($staffleave as $key=>$result)  
         {  
            ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['name']?></td>
                    <td><?php echo $result['leave_reason']?></td>
                    <td><?php echo $result['leave_type']?></td>
                    <td><?php echo $result['leave_fromdate']?></td>
                    <td><?php echo $result['leave_todate']?></td>
                    <td><?php if ($result['applystatus']=='N') 
                    {
                      echo'<a class="btn btn-success">Accpted</a>';
                    }elseif($result['applystatus']=='Y')
                    {
                      echo'<a class="btn btn-info">On processing</a>';
                    }
                      else
                      {
                      echo'<a class="btn btn-danger">Rejected</a>';
                      }?>
                       </td> 
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