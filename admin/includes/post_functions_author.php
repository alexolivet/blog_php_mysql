<?php
error_reporting(-1);
ini_set("display_errors", 1); ?>
    <?php

// Post variables

$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$post_topic = "";
/* - - - - - - - - - -
-  PHP Debug to console
- - - - - - - - - - -*/

function debug_to_console($data)
	{
	$output = $data;
	if (is_array($output)) $output = implode(',', $output);
	echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

// then use this with the item you want to check

/* - - - - - - - - - -
-  Post functions
- - - - - - - - - - -*/

if (!function_exists('mysqli_fetch_all'))
	{
	function mysqli_fetch_all(mysqli_result $result)
		{
		$data = array();
		while ($x = $result->fetch_assoc())
		if (!empty($x)) $data[] = $x;
		return $data;
		}
	}

// get all posts from DB

function getAllPosts()
	{
	global $conn;

	// Admin can view all posts
	// Author can only view their posts

	if ($_SESSION['user']['role'] == "Admin")
		{
		$sql = "SELECT * FROM posts";
		}
	elseif ($_SESSION['user']['role'] == "Author")
		{
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id='$user_id'";
		}

	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_posts = array();
	foreach($posts as $post)
		{
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
		}

	return $final_posts;
	}

// get the author/username of a post

function getPostAuthorById($user_id)
	{
	global $conn;
	$sql = "SELECT username FROM users WHERE id='$user_id'";
	$result = mysqli_query($conn, $sql);
	if ($result)
		{

		// return username

		return mysqli_fetch_assoc($result) ['username'];
		}
	  else
		{
		return null;
		}
	}

/* - - - - - - - - - -
-  Post actions
- - - - - - - - - - -*/

// if user clicks the create post button

if (isset($_POST['create_post']))
	{
	createPost($_POST);
	}

// if user clicks the Edit post button

if (isset($_GET['edit-post']))
	{
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
	}

// if user clicks the update post button

if (isset($_POST['update_post']))
	{
	updatePost($_POST);
	}

// if user clicks the Delete post button

if (isset($_GET['delete-post']))
	{
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
	}

/* - - - - - - - - - -
-  Post functions
- - - - - - - - - - -*/

function createPost($request_values)
	{
	global $conn, $errors, $title, $featured_image, $topic_id, $body, $published;
	$title = esc($request_values['title']);
	$body = htmlentities(esc($request_values['body']));
	if (isset($request_values['topic_id']))
		{
		$topic_id = esc($request_values['topic_id']);
		}

	if (isset($request_values['publish']))
		{
		$published = esc($request_values['publish']);
		}

	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug

	$post_slug = makeSlug($title);

	// validate form

	if (empty($title))
		{
		array_push($errors, "Post title is required");
		}

	if (empty($body))
		{
		array_push($errors, "Post body is required");
		}

	if (empty($topic_id))
		{
		array_push($errors, "Post topic is required");
		}

	// Get image name

	$featured_image = $_FILES['featured_image']['name'];
	if (empty($featured_image))
		{
		array_push($errors, "Featured image is required");
		}

	// image file directory

	$target = "../static/images/" . basename($featured_image);
	debug_to_console($_FILES['featured_image']['tmp_name'], $target);
	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target))
		{
		array_push($errors, "Failed to upload image. Please check file settings for your server");
		}

	// Ensure that no post is saved twice.

	$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
	$result = mysqli_query($conn, $post_check_query);
	if (mysqli_num_rows($result) > 0)
		{ // if post exists
		array_push($errors, "A post already exists with that title.");
		}

	// create post if there are no errors in the form

	if (count($errors) == 0)
		{
		$user_id = $_SESSION['user']['id'];
		$query = "INSERT INTO posts (user_id, title, slug, image, body, published, created_at, updated_at) VALUES('$user_id', '$title', '$post_slug', '$featured_image', '$body', $published, now(), now())";
		if (mysqli_query($conn, $query))
			{ // if post created successfully
			$inserted_post_id = mysqli_insert_id($conn);

			// create relationship between post and topic

			$sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
			mysqli_query($conn, $sql);
			$_SESSION['message'] = "Post created successfully";
			header('location: ../index.php');
			exit(0);
			}
		}
	}

/* * * * * * * * * * * * * * * * * * * * *
* - Takes post id as parameter
* - Fetches the post from database
* - sets post fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */

function editPost($role_id)
	{
	global $conn, $title, $post_slug, $featured_image, $body, $published, $isEditingPost, $post_id, $topic_name;

	// get the posts

	$sql = "SELECT * FROM posts WHERE id='$role_id' LIMIT 1";

	// get the topic name assigned to each

	$sql1 = "SELECT too.name FROM post_topic pt 
	JOIN topics  too on pt.topic_id = too.id 
	JOIN posts pot on pt.post_id=pot.id
	where pot.id='$post_id' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	$post = mysqli_fetch_assoc($result);
	$post1 = mysqli_fetch_assoc($result1);

	// set form values on the form to be updated

	$title = $post['title'];
	$body = $post['body'];
	$published = $post['published'];
	$featured_image = $post['image'];
	$topic_name = $post1['name'];
	debug_to_console($topic_name);
	}

function updatePost($request_values)
	{
	global $conn, $errors, $post_id, $title, $featured_image, $topic_id, $body, $published;
	$title = esc($request_values['title']);
	$body = esc($request_values['body']);
	$post_id = esc($request_values['post_id']);
	if (isset($request_values['topic_id']))
		{
		$topic_id = esc($request_values['topic_id']);
		}

	// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug

	$post_slug = makeSlug($title);
	if (empty($title))
		{
		array_push($errors, "Post title is required");
		}

	if (empty($body))
		{
		array_push($errors, "Post body is required");
		}

	if (empty($topic_id))
		{
		array_push($errors, "Post topic is required");
		}

	// if new featured image has been provided

	if (!$_FILES['featured_image']['name'])
		{

		// register topic if there are no errors in the form

		if (count($errors) == 0)
			{
			$query = "UPDATE posts SET title='$title', slug='$post_slug', views=0, body='$body', published=$published, updated_at=now() WHERE id='$post_id'";

			// attach topic to post on post_topic table

			if (mysqli_query($conn, $query))
				{ // if post created successfully
				if (isset($topic_id))
					{
					$inserted_post_id = mysqli_insert_id($conn);

					// create relationship between post and topic
					// $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES('$inserted_post_id', '$topic_id')";
					// $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";

					$sql = "UPDATE post_topic SET topic_id='$topic_id' WHERE post_id='$post_id'";
					mysqli_query($conn, $sql);
					$_SESSION['message'] = "Post created successfully";
					header('location: posts_author.php');
					exit(0);
					}
				}

			$_SESSION['message'] = "Post updated successfully";
			header('location: posts_author.php');
			exit(0);
			}
		}
	  else
		{
		if (isset($_POST['featured_image']))
			{

			// Get image name

			$featured_image = $_FILES['featured_image']['name'];

			// image file directory

			$target = "../static/images/" . basename($featured_image);
			if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target))
				{
				array_push($errors, "Failed to upload image. Please check file settings for your server");
				}
			}

		// register topic if there are no errors in the form

		if (count($errors) == 0)
			{
			$query = "UPDATE posts SET title='$title', slug='$post_slug', views=0, image='$featured_image', body='$body', published=$published, updated_at=now() WHERE id='$post_id'";

			// attach topic to post on post_topic table

			if (mysqli_query($conn, $query))
				{ // if post created successfully
				if (isset($topic_id))
					{
					$inserted_post_id = mysqli_insert_id($conn);

					// create relationship between post and topic
					// $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES('$inserted_post_id', '$topic_id')";
					// $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";

					$sql = "UPDATE post_topic SET topic_id='$topic_id' WHERE post_id='$post_id'";
					mysqli_query($conn, $sql);
					$_SESSION['message'] = "Post created successfully";
					header('location: posts.php');
					exit(0);
					}
				}

			$_SESSION['message'] = "Post updated successfully";
			header('location: posts_author.php');
			exit(0);
			}
		}
	}

// delete blog post

function deletePost($post_id)
	{
	global $conn;
	$sql = "DELETE FROM posts WHERE id='$post_id'";
	if (mysqli_query($conn, $sql))
		{
		$_SESSION['message'] = "Post successfully deleted";
		header("location: posts_author.php");
		exit(0);
		}
	}

?>