<?php 
session_start();
include ('connection.php');
$name = $_SESSION['user_name'];
$ids = $_SESSION['id'];
$id = $_GET['id'];
$issue_date = date('Y-m-d'); // Get today's date in YYYY-MM-DD format

// Set due date (example: 7 days after the issue date)
$due_date = date('Y-m-d', strtotime('+7 days', strtotime($issue_date)));

$insert_issue = mysqli_query($conn, "INSERT INTO tbl_issue (book_id, user_id, user_name, status, issue_date, due_date) 
                                     VALUES ('$id', '$ids', '$name', 3, '$issue_date', '$due_date')");

if ($insert_issue > 0) {
?>
<script type="text/javascript">
alert("Request sent successfully.");
window.location.href="book.php";
</script>
<?php
}
?>
