<?php include_once "server/database.php"; ?>
<?php

// Escape the page name for safe-keeping
$db_pname = mysqli_real_escape_string($db_connection, $_GET["v"]);

// Build query, push to server and get results
$db_query = "SELECT pname, title, header, body FROM blog_posts WHERE pname = \"$db_pname\";";
$db_result = mysqli_query($db_connection, $db_query);

// Make variables so we can close the DB connection ASAP
$page_title;
$page_header;
$page_body;

// If there is a page, pull it
if (mysqli_num_rows($db_result) == 1)
while ($row = mysqli_fetch_assoc($db_result))
{
	$page_title = $row["title"];
	$page_body = $row["body"];
	$page_header = $row["header"];
}
else
{
	$page_title = "404 Not Found";
	$page_body = "<p>404 Not Found</p>";
	$page_header = "";
}

// Extract first paragraph
function extractFirstPara($input) {

	// Set the text start and stop positions
	$start = strpos($input, "<p>");
	$end = strpos($input, "</p>", $start);

	// Extract text (using the pointers)
	// and return to caller
	return substr($input, $start+3, $end-$start-3);

}

$page_description = extractFirstPara($page_body);

// Database kill
mysqli_close($db_connection);

?>

<!DOCTYPE html>
<html>

	<head>
		
		<?php include_once 'server/snippets/head.php'; ?>
		<title><?php echo $page_title; ?></title>
		<?php echo $page_header; ?>
		<meta name="description" content="<?php echo $page_description; ?>">
		<meta name="keywords" content="Design,Programming,Words,Paper,Photography,Raresh,Nistor">
		<meta name="author" content="Raresh Nistor">

	</head>

	<body>
		
		<?php include_once 'server/snippets/navbar.php'; ?>

		<div class="splash-padding"></div>

		<div class="container"><div style="padding:10px;" class="card">
			<?php echo $page_body; ?>
		</div></div>

		<?php include_once 'server/snippets/footer.php'; ?>

	</body>

</html>