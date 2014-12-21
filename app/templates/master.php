<?php 

	$pages = explode('/', $_SERVER['REQUEST_URI']);
	$page = ucwords($pages[1]) ? ' - ' . ucwords($pages[1]) : null;
	$title = 'Home Inspector Pro' . $page;
?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title><?php echo $title; ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="/bower_components/ReptileForms/dist/reptileforms.min.css">
	<link rel="stylesheet" href="/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<!-- Carousel -->
	<!-- <link rel="stylesheet" type="text/css" href="cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/> -->
	<!-- // <script type="text/javascript" src="cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js"></script> -->

	<!-- // <script type="text/javascript" src="code.jquery.com/jquery-1.11.0.min.js"></script> -->
	<!-- // <script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="/js/slick-1.3.15/slick/slick.css"/>


	<!-- Font Awesome -->
	<link rel="stylesheet" href="/css/font-awesome-4.2.0/css/font-awesome.min.css">


	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

</head>
<body>
	<div class="page">
		<?php echo $primary_header; ?>
		<main>
			<?php echo $main_content; ?>
		</main>
	</div>
	<?php echo $primary_footer; ?>

	
	<!-- Include Common Scripts -->
	<script src="/bower_components/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="/js/slick-1.3.15/slick/slick.js"></script>
	<!-- Modernizr -->
	<script src="/bower_components/modernizr/modernizr.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	
	<!-- Main JS -->
	<script src="/js/main.js"></script>


</body>
</html>