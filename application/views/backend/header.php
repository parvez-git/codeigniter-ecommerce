<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>

	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assets/css/dashboard.css'); ?>

</head>

<body>
	<nav class="navbar navbar-light fixed-top bg-light flex-md-nowrap p-0 shadow-sm">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">E-COMMERCE</a>
		<input class="form-control form-control-light w-100" type="text" placeholder="Search" aria-label="Search">
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link text-uppercase" href="<?php echo base_url('/users/logout') ?>">
					<span data-feather="log-out"></span> 
					<span>Sign out</span>
				</a>
			</li>
		</ul>
	</nav>