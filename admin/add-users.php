<?php
session_start();
include ('../connection.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}
if(isset($_REQUEST['sbt-usr']))
{
   
	$user_name = $_POST['user_name'];
  $emailid = $_POST['emailid'];
  $pwd = md5($_POST['pwd']);
  $role = $_POST['role'];
  $status = $_POST['status'];

  $insert_user = mysqli_query($conn,"insert into tbl_users set user_name='$user_name', emailid='$emailid', password='$pwd', role='$role', status='$status'");

    if($insert_user > 0)
    {
        ?>
<script type="text/javascript">
    alert("User added successfully.")
</script>
<?php
}
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
            <a href="#" style="color: black;">Add User</a>
          </li>
          
        </ol>

  <div class="card mb-3" style="background-color: #e9dbb9ff; width: 80%; margin-left:10%;">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Submit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body" style="padding-left: 15%">
                                      
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">User Name <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name" style="background-color: #c0b59aff;" required>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">EmailId <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Enter EmailId" style="background-color: #c0b59aff;" required>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-4 col-form-label" for="remarks">Password <span class="text-danger">*</span></label>
                                       <div class="col-lg-6">
                                      <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" style="background-color: #c0b59aff;" required>
                                       </div>
                                  </div>
                                  
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Role <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="role" name="role" style="background-color: #c0b59aff;" required>
                                                    <option value="">Select Role</option>
                                                    <option  value="1">Admin</option>
                                                    <option  value="2">User</option>
                                                          
                                                </select>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="status" name="status" style="background-color: #c0b59aff;" required>
                                                    <option value="">Select Status</option>
                                                    <option  value="1">Active</option>
                                                    <option  value="0">Inactive</option>
                                                          
                                                </select>
                                            </div>
                                        </div>
                           
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="sbt-usr" class="btn btn-primary" style="background-color: #846a28ff; border: 1px solid black; margin-left:30%;">Submit</button>
                                            </div>
                                        </div>
                                    
                                </div>
                                </form>
                            </div>
                        
    </div>
         
        </div>
     
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
 <?php include('include/footer.php'); ?>