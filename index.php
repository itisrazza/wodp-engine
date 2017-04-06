<!DOCTYPE html>
<html>

	<head>
		
		<title>Words to Digital Paper</title>
		<?php include_once 'server/snippets/head.php'; ?>
		<meta name="keywords" content="Welcome to Words on Digital Paper. A blog by Raresh Nistor. This is where you can see technology, photography, design related posts alongside some other things.">
		<meta name="author" content="Raresh Nistor">

	</head>

	<body>
		
		<?php include_once 'server/snippets/navbar.php'; ?>

		<div class="splash-padding"></div>

		<?php include_once "server/database.php"; ?>

		<div class="container">
			
		</div>

		<div class="container">
			<div class="row">
				<div class="split-third">
					<div class="card page-list top">
						<div class="header" style="background-image:url(assets/img/media/wodp_main.png)">
							<div class="shader">
								<div class="title">Words on Digital&nbsp;Paper</div>
							</div>
						</div>
						<div class="blurb">Welcome to Words on Digital Paper. A blog by Raresh Nistor. This is where you can see technology, photography, design related posts alongside some other things.</div>
					</div>
				</div>

				<?php

				/** Query for the latest post */

				// Build query and submit it
				$db_query = "SELECT id, pname, title, body FROM blog_posts ORDER BY id DESC LIMIT 1;";
				$db_result = mysqli_query($db_connection, $db_query);

				// If there is more than one row
				if (mysqli_num_rows($db_result) > 0)
				{
					
					while ($row = mysqli_fetch_assoc($db_result)) { ?>
						
					<div class="split-two-thirds">
						<a class="no-css" href="page.php?v=<?php echo $row["pname"]; ?>">
							<div class="card page-list top">
								<div class="header" style="background-image:url(assets/img/media/<?php echo $row["pname"] ?>.png)">
									<div class="shader">
										<div class="title"><?php echo $row["title"]; ?></div>
									</div>
								</div>
								<div class="blurb"><?php echo extractFirstPara($row["body"]); ?></div>
							</div>
						</a>
					</div>

					<?php }

				}

				?>

				
			</div>
			<div class="row">

			<?php

			$db_query = "SELECT id, pname, title, body FROM blog_posts ORDER BY id DESC LIMIT 5000 OFFSET 1";
			$db_result = mysqli_query($db_connection, $db_query);

			if (mysqli_num_rows($db_result) > 0)
			{
				while ($row = mysqli_fetch_assoc($db_result))
				{ ?>

					<div class="split-half">
						<a class="no-css" href="page.php?v=<?php echo $row["pname"]; ?>">
							<div class="card page-list">
								<div class="header">
									<div class="shader">
										<div class="title"><?php echo $row["title"]; ?></div>
									</div>
								</div>
								<div class="blurb"><?php echo extractFirstPara($row["body"]); ?></div>
							</div>
						</a>
					</div>	

				<?php }
			}

			?>
				
			</div>
		</div>

		<?php include_once 'server/snippets/footer.php'; ?>

	</body>

</html>
<?php

// Extract first paragraph
function extractFirstPara($input) {

	// Set the text start and stop positions
	$start = strpos($input, "<p>");
	$end = strpos($input, "</p>", $start);

	// Extract text (using the pointers)
	// and return to caller
	return substr($input, $start+3, $end-$start-3);

}

// Close the database connection
mysqli_close($db_connection);


?>