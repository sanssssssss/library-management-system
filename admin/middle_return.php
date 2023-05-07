<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
    $s_no = "";
	$book_no = "";
	$book_name = "";
	$book_author = "";
	$student_id = "";
	$stat = "";
    $issue_date = "";
    $returned_date = "";
	$query = "select s_no,book_name,book_author,book_no,student_id,stat,issue_date from issued_books where book_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$s_no = $row['s_no'];
		$book_no = $row['book_no'];
		$book_name = $row['book_name'];
		$book_author = $row['book_author'];
		$student_id = $row['student_id'];
        $stat = $row['stat'];
        $issue_date = $row['issue_date'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="admin_dashboard.php" class="nav-link">Dashboard</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
				<div class="dropdown-menu">
					<a href="add_book.php" class="dropdown-item">Add New Book</a>
					<a href="manage_book.php" class="dropdown-item">Manage Books</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
				<div class="dropdown-menu">
					<a href="add_cat.php" class="dropdown-item">Add New Category</a>
					<a href="manage_cat.php" class="dropdown-item">Manage Category</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
				<div class="dropdown-menu">
					<a href="add_author.php" class="dropdown-item">Add New Author</a>
					<a href="manage_author.php" class="dropdown-item">Manage Authors</a>
				</div>
			</li>
			<li class="nav-item">
				<a href="issue_book.php" class="nav-link">Issue Book</a>
			</li>
			<li class="nav-item">
				<a href="return.php" class="nav-link">Return</a>
			</li>
			<li class="nav-item">
				<a href="delay_display.php" class="nav-link">Returned Records</a>
			</li>
			<li class="nav-item">
				<a href="Password_UpdationList.php" class="nav-link">PUL</a>
			</li>
		</ul>
	</div>
</nav>

	<span><marquee>This is library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group" style = "display:none">
					<label>s_no:</label>
					<input type="text" name="s_no" value="<?php echo $s_no;?>" class="form-control" required="">
				</div>
				<div class="form-group" style = "display:none">
					<label>Book_no:</label>
					<input type="text" name="book_no" value="<?php echo $book_no;?>" class="form-control" required="">
				</div>
				<div class="form-group" style = "display:none">
					<label>Book_name:</label>
					<input type="text" name="book_name" value="<?php echo $book_name;?>" class="form-control" required="">
				</div>
				<div class="form-group" style = "display:none">
					<label>book_author:</label>
					<input type="text" name="book_author" value="<?php echo $book_author;?>" class="form-control" required="">
				</div>
				<div class="form-group" style = "display:none">
					<label>student_id:</label>
					<input type="text" name="student_id" value="<?php echo $student_id;?>" class="form-control" required="">
				</div>
                <div class="form-group" style = "display:none">
					<label>stat:</label>
					<input type="text" name="stat" value="<?php echo $stat;?>" class="form-control" required="">
				</div>
                <div class="form-group" style = "display:none">
					<label>issue_date:</label>
					<input type="text" name="issue_date" value="<?php echo $issue_date;?>" class="form-control" required="">
				</div>
                <div class="form-group">
					<label>returned_date:</label>
					<input type="text" name="returned_date" value="<?php echo date("Y-m-d");?>" class="form-control" required="">
				</div>
				<script>
					function showAlert(){
						alert("Return successful. Please check Returned Records, Thank You!");
					}
				</script>
				<button class="btn btn-primary" name="return" onClick = "showAlert()">Return</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['return'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into returned_table values($_POST[s_no],$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_POST[student_id],1,'$_POST[issue_date]','$_POST[returned_date]')";
		$query_run = mysqli_query($connection,$query);
	    $query1 = "delete from issued_books where book_no = $_GET[bn]";
	    $query_run1 = mysqli_query($connection,$query1);
    }
?>
