<?php 

	if ($_SESSION['user_id']) {

		$user_id = $_SESSION['user_id'];

		$sql = "
			SELECT *, COUNT(read_comment) AS total_comments
			FROM comment, report
			WHERE read_comment = 0
			AND user_id = $user_id
			AND comment.report_id = report.report_id
			GROUP BY comment.report_id
			";

		$results = db::execute($sql);

		if ($row = $results->fetch_assoc()) {
			// echo $row['read_comment'];
			if($row['read_comment'] == 0) {
				$class = 'new-notification';
			} else {
				$class = '';
			}
		}
	}
?>
<header>
	<div class="top-nav">
		<div class="header-format">
			<div class="logo"><img src="/images/HIP_LOGO.png" alt="">ome Inspector Pro</div>
			<div class="header-login">
				<?php if ($_SESSION['user_id']) { ?>
				Welcome back, <?php echo ucwords(strtolower($_SESSION['first_name'])) ?> <a href="/notifications" class="no-notification <?php echo $class ?>"><i class="fa fa-comment"></i></a> <a href="/logout">Logout</a>
				<?php } else { ?>
					<a class="button">Login</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="main-nav">
		<nav class="header-format">
			<a href="/">Home</a>
			<a href="/dashboard">Dashboard</a>
			<a href="">Inspectors</a>
			<a href="">News</a>
			<a href="">About Us</a>
			<a href="">Contact Us</a>
		</nav>
	</div>

	<div class="hero">
		<div class="header-format">
			
		</div>
	</div>

	<div class="popup">
		<div class="home-login">
		<a href="#" class="close"><i class="fa fa-times"></i></a>
		<h1>Login</h1>
			<form action="/login" method="POST">
				<label>Email</label><input type="email" name="email" value="<?php echo htmlentities($email) ?>" placeholder="email" required><br>
				<label>Password</label><input type="password" name="password" placeholder="password" pattern="[a-zA-Z0-9]{6,20}" required><br>
				<button type="submit">Login</button>
			</form>
			<div>
				<a href="/create_user" title="">New User? Create Account</a><br>		
			</div>
		</div>
	</div>
</header>