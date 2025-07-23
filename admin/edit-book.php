<?php
session_start();
include ('../connection.php');
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(empty($id))
{
    header("Location: index.php"); 
}
$id = $_GET['id'];
$fetch_query = mysqli_query($conn, "select * from tbl_book where id='$id'");
$row = mysqli_fetch_array($fetch_query);
if(isset($_REQUEST['save-book-btn']))
{
   
	$book_name = $_POST['book_name'];
    $category_name = $_POST['category_name'];
    $isbn = $_POST['isbn'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location_name = $_POST['location_name'];
    $availability = $_POST['availability'];
            
    $update_book = mysqli_query($conn,"update tbl_book set book_name='$book_name', category='$category_name', isbnno='$isbn', author='$author_name', publisher='$publisher_name', price='$price', quantity='$quantity', place='$location_name',  availability='$availability' where id='$id'");

    if($update_book > 0)
    {
?>
<script type="text/javascript">
    alert("Book updated successfully.");
    window.location.href='view-book.php';
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
            <a href="#" style="color: black;">Edit Book</a>
          </li>
          
        </ol>

  <div class="card mb-3" style="background-color: #e9dbb9ff; width: 80%; margin-left:10%;">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Edit Details</div>
             
            <form method="post" class="form-valide">
          <div class="card-body" style=" padding-left: 10%;">
  <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="item">Book Name <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="book_name" id="book_name" class="form-control" placeholder="Enter Book Name" style="background-color: #c0b59aff;" required value="<?php echo $row['book_name']; ?>">
           </div>
      </div>         
          <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="leave-type">Category <span class="text-danger">*</span>
                </label>
    <div class="col-lg-6">
        <select class="form-control" id="category_name" name="category_name" style="background-color: #c0b59aff;" required>
            <option value="">Select Category</option>
            <?php 
             $fetch_category = mysqli_query($conn, "select * from tbl_category where status=1");
             while($rows = mysqli_fetch_array($fetch_category)){
            ?>
 <option <?php if($rows['category_name']==$row['category']){ ?>
    selected="selected"; <?php } ?>><?php echo $rows['category_name'];?>
</option>
        <?php } ?>
         </select>
    </div>
      </div>    
          
            <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="price">ISBN <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Enter ISBN" style="background-color: #c0b59aff;" required value="<?php echo $row['isbnno'];?>">
           </div>
      </div> 
      <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="price">Author <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Enter Author Name" style="background-color: #c0b59aff;" required value="<?php echo $row['author'];?>">
           </div>
      </div> 
      <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="price">Publisher <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="publisher_name" id="publisher_name" class="form-control" placeholder="Enter Publisher Name" style="background-color: #c0b59aff;" required value="<?php echo $row['publisher'];?>">
           </div>
      </div> 
       <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="price">Price <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" style="background-color: #c0b59aff;" required value="<?php echo $row['price'];?>">
           </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-4 col-form-label" for="price">Quantity <span class="text-danger">*</span></label>
           <div class="col-lg-6">
          <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Number of Copy" style="background-color: #c0b59aff;" required value="<?php echo $row['quantity'];?>">
           </div>
      </div>
      <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="leave-type">Location <span class="text-danger">*</span>
                </label>
    <div class="col-lg-6">
        <select class="form-control" id="location_name" name="location_name" style="background-color: #c0b59aff;" required>
            <option value="">Select Location</option>
            <?php 
             $fetch_category = mysqli_query($conn, "select * from tbl_location where status=1");
             while($rows = mysqli_fetch_array($fetch_category)){
            ?>
            <option <?php if($rows['name']==$row['place']){ ?>
    selected="selected"; <?php } ?>><?php echo $rows['name'];?>
</option>
        <?php } ?>
         </select>
    </div>
      </div> 
      <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="status">availability <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <select class="form-control" id="availability" name="availability" style="background-color: #c0b59aff;" required>
                        <option value="">Select Status</option>
                       <option value="1" <?php if($row['availability'] == 1) { ?> selected="selected"; <?php } ?>>Available</option>
                       <option value="0" <?php if($row['availability'] == 0) { ?> selected="selected"; <?php } ?>>Not Available</option>
                              
                    </select>
                </div>
            </div>     
                                
            <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                    <button type="submit" name="save-book-btn" class="btn btn-primary" style="background-color: #846a28ff; border: 1px solid black; margin-left:30%;">Save</button>
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