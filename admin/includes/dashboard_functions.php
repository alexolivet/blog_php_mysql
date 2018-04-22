<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php 

if (!function_exists('mysqli_fetch_all')) { 
	function mysqli_fetch_all(mysqli_result $result) { 
		$data=array(); 
		while ($x=$result->fetch_assoc()) 
			if (!empty($x)) $data[]=$x; return $data; } 
	}



function getAllPostsCount()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['user']['role'] == "Admin") {
		$sql = "SELECT * FROM posts";
	} elseif ($_SESSION['user']['role'] == "Author") {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id='$user_id'";
	}
	$result = mysqli_query($conn, $sql);
	$rowcount=mysqli_num_rows($result);
	return $rowcount;
}

function getAllPostsCountUnPublished()
{
	global $conn;
	
	// Admin can view all posts 
	// Author can only view their posts
	if ($_SESSION['user']['role'] == "Admin") {
		$sql = "SELECT * FROM posts where published = 0" ;
	} elseif ($_SESSION['user']['role'] == "Author") {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id='$user_id'";
	}
	$result = mysqli_query($conn, $sql);
	$unPublishedCounts=mysqli_num_rows($result);
	return $unPublishedCounts;
}

function getAdminUsersCount(){
	global $conn, $roles;
	//$sql = "SELECT * FROM users WHERE role IS NOT NULL";
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$usersCount = mysqli_num_rows($result);

	return $usersCount;
}

function getAllTopicsCount() {
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topicsCount = mysqli_num_rows($result);
	return 	$topicsCount;
}

?>