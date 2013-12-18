<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title . ' - ' . $this->config->item('site_name');?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>

<div class="container">

	<header>
		<h1><?php echo $this->config->item('site_name');?></h1>
	</header>

	<nav class="navbar navbar-default" role="navigation">
		<ul class="nav navbar-nav">
			<li<?php if($page_title == 'Home') echo ' class="active"'; ?>><a href="<?php echo base_url();?>">Home</a></li>
			<li<?php if($page_title == 'Employees') echo ' class="active"'; ?>><a href="<?php echo base_url();?>employee_manage/employee_list">Employees</a></li>
			<li<?php if($page_title == 'Add') echo ' class="active"'; ?>><a href="<?php echo base_url();?>employee_manage/add">Add</a></li>
		</ul>
	</nav>

	<div id="main-content">
