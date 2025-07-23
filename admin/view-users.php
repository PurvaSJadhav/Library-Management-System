<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
?>
<?php include('include/header.php'); ?>
  <div id="wrapper" style="background-color: #ebd49cff;">

    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="background-color: #ebd49cff; font-size: x-large; text-decoration: underline;">
          <li class="breadcrumb-item">
            <a href="#" style="color: black;">View Users</a>
          </li>
          
        </ol>

  <div class="card mb-3" style="background-color: #e9dbb9ff;">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            View Details</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>User Name</th>
                                                <th>EmailId</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
                    if(isset($_GET['ids'])){
                      $id = $_GET['ids'];
                      $delete_query = mysqli_query($conn, "delete from tbl_users where id='$id'");
                      }
										$select_query = mysqli_query($conn, "select * from tbl_users");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ 
										    
										?>
                                            <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $row['user_name']; ?></td>
                                                <td><?php echo $row['emailid']; ?></td>
                                                <?php if($row['role']==1){
                                                  ?><td>Admin</td>
                                        <?php } else { ?><td>User</td>
                                           <?php } ?>   
                                           <?php if($row['status']==1){
                                                  ?><td><span class="badge badge-success">Active</span></td>
                                        <?php } else { ?><td><span class="badge badge-danger">Inactive</span></td>
                                           <?php } ?>    
                                                  <td>
                                                  <a href="edit-user.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                  <a href="view-users.php?ids=<?php echo $row['id'];?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                  </td>
                                                </tr>
										<?php $sn++; } ?>
                                           
                                           
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>                   
                            </div>
                        
    </div>
         
        </div> 
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <?php include('include/footer.php'); ?>
 <script language="JavaScript" type="text/javascript">
function confirmDelete(){
    return confirm('Are you sure want to delete this User?');
}
</script>