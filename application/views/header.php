<html lang="en">
<head>
    <meta charset="utf-8">
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	<style>
	.btn
	{
		padding: 6px 26px;
	}
	.navbar-inverse {
    background-color: #222;
	}
	.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
    color: #fff;
    background-color: #529c84;
	</style>
</head>
<body>
<div class="row">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid row">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					
					<li class="<?php echo ($this->uri->uri_string == "Display") ? "active" : "inactive"; ?>"><a href="http://localhost/employee_dashboard/Display" title="Order Delivery">Employee Selection</a></li>
					<li class="<?php echo ($this->uri->uri_string == "User") ? "active" : "inactive"; ?>"><a href="http://localhost/employee_dashboard/User" title="Pop Reach Report">Employee Dashboard</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>