<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- My CSS -->
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">

    <!-- Google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Segment links (links to controllers/functions) -->
    <!-- <a href="<?php //echo base_url()?>birds">Birds Main</a> -->

    <!-- IMG links -->
    <!-- <?php //echo base_url()?>img/picture.jpg"> -->

    <!-- JS links -->
    <!-- <script src="<?php //echo base_url(); ?>js/jquery.js"></script> -->

    <!-- Creating a dynamic title tag -->
	<title>
		<?php
			if(APP_NAME) { $title = APP_NAME; }
			if(isset($heading)){ $title = $title . " - " . $heading; }
			echo $title; 
		?>
	</title>

	<script type="text/javascript">
		// adding some jquery for styling purposes
		 $(document).ready(function(){
		 	console.log('ready');
		 	// fade #message if exists
			 if($('#message').length){
			 	$( "#message" ).delay(3000).fadeOut({}, 3000);
			 }
		 });


	 </script>

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="<?php echo base_url()?>"> <i class="material-icons">home</i></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <?php if ($this->ion_auth->logged_in()) : ?>
				<?php
					$user_id = $this->ion_auth->user()->row()->id ;
					$username = $this->ion_auth->user()->row()->username ;
				?>
				<!-- Here you do your links & Bootstrap for the Logged in part:
				Links to logout, change password, and create article would be nice.
				-->
				<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        Logged in as <?php echo $username; ?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		        	<a class="dropdown-item" href="<?php echo base_url()?>articles/write">Write Article</a>
		        	<a class="dropdown-item" href="<?php echo base_url()?>auth/change_password">Change Password</a>
		        	<a class="dropdown-item" href="<?php echo base_url()?>articles/logout">Logout</a>
		        	<!-- <a class="dropdown-item" href="<?php //echo base_url()?>crud/write">Write</a> -->
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url()?>articles/write">Insert</a>
		      </li> 
			<?php else: ?>
				<a href="<?php echo base_url()?>auth/login">Login </a>
			<?php endif; ?> 
		     
		      <!-- <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Birds
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo base_url(); ?>birds">Birds Main</a>
		          <a class="dropdown-item" href="<?php echo base_url(); ?>birds/loon">Loon</a> -->
		          <!-- <div class="dropdown-divider"></div> -->
		          <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>birds/sparrow">Sparrow</a>
		          <a class="dropdown-item" href="<?php echo base_url(); ?>birds/falcon">Falcon</a>
		        </div>
		      </li> -->
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
		</nav>	
		<!-- Here, we are using the flashdata method from the Session library
		This will set a session variable for the following one pageload only. 
		And, we can re-use this again and again since it echo’s out in our header which is global.

		So, anytime we want to set this, we use the $this->session->set_flashdata('message', 'Insert Successful') and then redirect the user (redirect('crud/index', 'location'). The message will show at the redirected page view and then disappear. -->
		<!-- Will give the user a message -->
		<?php $message = $this->session->flashdata('message'); ?>
		<?php if ($message): ?>

			<h3 class="alert alert-primary" id="message"> <i class="material-icons">thumb_up</i> <?php echo $message ?></h3>

		<?php endif; ?>

