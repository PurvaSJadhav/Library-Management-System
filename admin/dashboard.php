<?php
session_start();
include '../connection.php';
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.php"); 
}

 $select_user = mysqli_query($conn,"select count(*) from tbl_users where role=2");
 $total_user = mysqli_fetch_row($select_user);

 $select_book = mysqli_query($conn,"select count(*) from tbl_book");
 $total_book = mysqli_fetch_row($select_book);

 $select_avail_book = mysqli_query($conn,"select count(*) from tbl_book where availability=1");
 $avail_book = mysqli_fetch_row($select_avail_book);

 $issued_book = mysqli_query($conn,"select count(*) from tbl_issue where status=1");
 $issued_book = mysqli_fetch_row($issued_book);

 $return_book = mysqli_query($conn,"select count(*) from tbl_return group by book_id");
 $return_book = mysqli_num_rows($return_book);

?>
<?php include('include/header.php'); ?>
<div id="wrapper" style="background-color: #ebd49cff;">
    <?php include('include/side-bar.php'); ?>
    <div id="content-wrapper" >
      <div class="container-fluid" >
        <ol class="breadcrumb" style="background-color: #ebd49cff; font-size: x-large; text-decoration: underline;">
          <li class="breadcrumb-item" >
            <a href="#" style="color: black;">Dashboard</a>
          </li>
        </ol>
<div class="row" >
  <div class="col-sm-4" >
  <section class="panel panel-featured-left panel-featured-primary" style="background-color: #ebd49cff;" >
      <div class="panel-body total" style="width: 320px; margin-top: 20px; margin-left: 30px; padding: 40px 20px; background-color: #f473b4ff; border: 1px solid black; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Total Books</h4>
              <div class="info">
                <strong class="amount"><?php echo $total_book[0]; ?></strong><br>  
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary" style="background-color: #ebd49cff;">
      <div class="panel-body available" style="width: 350px; margin-top: 20px; padding: 40px 20px; background-color: #e5b738ff; border: 1px solid black; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Available Books</h4>
              <div class="info">
                <strong class="amount"><?php echo $avail_book[0]; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<div class="col-sm-4">
   <section class="panel panel-featured-left panel-featured-primary" style="background-color: #ebd49cff;">
      <div class="panel-body issued" style="width: 350px; margin-top: 20px; padding: 40px 20px; background-color: #e0e633ff; border: 1px solid black; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Issued Books</h4>
              <div class="info">
                <strong class="amount"><?php echo $issued_book[0]; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary" style="background-color: #ebd49cff;">
      <div class="panel-body returned" style="width: 320px; margin-top: 20px; margin-left: 30px; padding: 40px 20px; background-color: #80dceeff; border: 1px solid black; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-book"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Returned Books</h4>
              <div class="info">
                <strong class="amount"><?php echo $return_book; ?></strong><br>                
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<div class="col-sm-4">
  <section class="panel panel-featured-left panel-featured-primary" style="background-color: #ebd49cff;">
      <div class="panel-body user" style="width: 350px; margin-top: 20px; padding: 40px 20px; background-color: #52b36cff; border: 1px solid black; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Total User</h4>
              <div class="info">
                <strong class="amount"><?php echo $total_user[0]; ?></strong><br>                 
              </div>
            </div>
            <div class="summary-footer">
              <a class="text-muted text-uppercase"></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
</div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php include('include/footer.php'); ?>