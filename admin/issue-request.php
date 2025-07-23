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
  <div id="wrapper">
    <?php include('include/side-bar.php'); ?>
    <div id="content-wrapper" style="background-color: #ebd49cff;">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="background-color: #ebd49cff; font-size: x-large; text-decoration: underline;">
          <li class="breadcrumb-item">
            <a href="#" style="color: black;">View Book Issue Requests</a>
          </li>
        </ol>
  <div class="card mb-3" style="background-color: #e9dbb9ff;" >
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Issue Requests</div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Book Name</th>
                        <th>User Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
										<?php 
										$select_query = mysqli_query($conn, "select tbl_issue.status, tbl_issue.book_id, tbl_book.book_name, tbl_issue.id, tbl_issue.user_name, tbl_book.quantity from tbl_issue inner join tbl_book on tbl_book.id=tbl_issue.book_id");
										$sn = 1;
										while($row = mysqli_fetch_array($select_query))
										{ ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    
                    <td><?php echo $row['user_name']; ?></td>
                    
                    <td><?php echo $row['quantity']; ?></td>
                    <?php
                    if(!empty($row['status']) && $row['status']==1)
                    {?>
                      <td><span class="badge badge-primary">Book Issued</span>
                   
                     </td>
                    <?php 
                    } else if($row['status']==2)
                    {?>
                    <td><span class="badge badge-danger">Rejected</span>
                       <a href="book-accept.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Accept</button></a>
                    </td>
                   <?php } else {?>
                  <td><a href="book-accept.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">Accept</button></a>
                   <a href="book-accept.php?ids=<?php echo $row['id']; ?>"><button class="btn btn-danger">Reject</button></a>
                   </td>
                 <?php } ?>
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