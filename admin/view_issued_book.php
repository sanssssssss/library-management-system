<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$student_name = "";
	$query = "select issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name from issued_books left join users on issued_books.student_id = users.id";
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
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form id="PrintTable">
			<h3 style='text-align:center'><b>Issued Books</b></h3>
			<table class="table-bordered" width="900px" style="text-align: center">
				<tr>
					<th>Name:</th>
					<th>Author:</th>
					<th>Number:</th>
					<th>Student Name:</th>
				</tr>
				<?php
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						$book_name = $row['book_name'];
						$book_author = $row['book_author'];
						$book_no = $row['book_no'];
						$student_name = $row['name'];
				?>
						<tr>
							<td><?php echo $book_name;?></td>
							<td><?php echo $book_author;?></td>
							<td><?php echo $book_no;?></td>
							<td><?php echo $student_name;?></td>

						</tr>
						<?php
					}
				?>
			</table>
		</form>
		<script>
			function printFunction() {
 			var printContents = document.getElementById('PrintTable').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
}
</script>
<input type="button" value="Print" onclick="printFunction()">
	</div>
	<div class="col-md-2"></div>
</div>
	
</body>
</html>