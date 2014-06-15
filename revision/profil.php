<?php
include('../model/AuteurPrincipal.php');
session_start();
if(!isset($_SESSION["COMITE"]))
{
	header("location:index.php");
}
$user=$_SESSION['COMITE'];
@$submit=$_POST["send"];
@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$email=$_POST["email"];
@$adresse=$_POST["adresse"];
@$tel=$_POST["tel"];
@$pays=$_POST["pays"];
@$nationalite=$_POST["nationalite"];
@$laboratoire=$_POST["laboratoire"];
@$equipe=$_POST["equipe"];


if(isset($submit)){
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=cfp","root","");
		echo $user->getID();
		$req=$pdo->prepare("UPDATE membrecomite SET nom='".$nom."', prenom='"
			.$prenom."', email='".$email."', adresse='".$adresse."', tel='".$tel
			."', pays='".$pays."',nationalite='".$nationalite."', laboratoire='"
			.$laboratoire."', equipeTravaille='".$equipe."' WHERE ID=".$user->getID()." ;");
		$req->execute();

		header("location:profil.php");
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <title>Modifier le Profil</title>
	<meta name="description" content="">
<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	<!-- Page specific plugins -->
	<!-- Charts -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="plugins/flot/jquery.flot.growraf.min.js"></script>
	<script type="text/javascript" src="plugins/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

	<script type="text/javascript" src="plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="plugins/blockui/jquery.blockUI.min.js"></script>

	

	<!-- Noty -->
	<script type="text/javascript" src="plugins/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="plugins/noty/layouts/top.js"></script>
	<script type="text/javascript" src="plugins/noty/themes/default.js"></script>

	<!-- Forms -->
	<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="plugins/select2/select2.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>


</head>

<body>

 <header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="index.php">
				<img src="assets/img/logo.png" alt="logo" />
				<strong>Panel </strong>Comit&eacute
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="#">
						Home
					</a>
				</li>
				
			</ul>
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				

				

				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
						<i class="icon-male"></i>
						<span class="username"> <?php echo $user->getNom(); echo(" ") ;echo $user->getPrenom(); ?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="profil.php"><i class="icon-user"></i> My Profile</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->

	</header> <!-- /.header -->
	


 <div id="container">
	

		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				<form class="sidebar-search">
					<div class="input-box">
						<button type="submit" class="submit">
							<i class="icon-search"></i>
						</button>
						<span>
							<input type="text" placeholder="Search...">
						</span>
					</div>
				</form>

				<!-- Search Results -->
				 <!-- /.sidebar-search-results -->

				<!--=== Navigation ===-->
				<ul id="nav">
					<li class="current">
						<a href="revision.php">
							<i class="icon-dashboard"></i>
							Panel
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="icon-desktop"></i>
							Mes r&eacutevisions
							<span class="label label-info pull-right">2</span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="listeRevisions.php">
								<i class="icon-angle-right"></i>
								Liste de mes revisions
								<span></span>
								</a>
							</li>
							<li>
								<a href="note.php">
								<i class="icon-angle-right"></i>
								Notez mes revisions
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="icon-edit"></i>
							Mon Profil
							
						</a>
						<ul class="sub-menu">
							<li>
								<a href="password.php">
								<i class="icon-angle-right"></i>
								Modofier Mot de Passe
								</a>
							</li>
							<li>
								<a href="profil.php">
								<i class="icon-angle-right"></i>
								Modifier les informations
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
				
				<!-- /Navigation -->
				
				
				

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
			<div class="col-md-12">	
				<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Noter Un article</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
				<div class="widget-content ">
								<form class="form-horizontal row-border" id="validate-1" action="#">
									<div class="form-group">
										<label class="col-md-3 control-label">Nom<span class="required"></span></label>
										<div class="col-md-9"> 
										<input type="text" id="nomp" name="nom" class="form-control required" placeholder="Nom">
										</div>
										
									</div>
								
                 <div class="form-group">
                        <label class="col-md-3 control-label">Prenom :</label>
                        <div class="col-md-9">
                            <input type="text" id="prenomp" name="prenom" class="form-control required" placeholder="Prenom">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Adresse Email :</label>
                        <div class="col-md-9">
                            <input type="text" id="email" name="email" class="form-control required" placeholder="exemple@mail.com">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Adresse postale :</label>
                        <div class="col-md-9">
                            <input type="text" id="adresse" name="adresse" class="form-control required" placeholder="575 Avenue AbdelKarim Khattabi">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Num&eacute;ro de t&eacute;l&eacute;phone :</label>
                        <div class="col-md-9">
                            <input type="text" id="tel" name="tel" class="form-control required" placeholder="+212666232019">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Pays :</label>
                        <div class="col-md-9">
                            <input type="text" id="pays" name="pays" class="form-control required" placeholder="Maroc">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Nationalit&eacute; :</label>
                        <div class="col-md-9">
                            <input type="text" id="nationalite" name="nationalite" class="form-control required" placeholder="Marocaine">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Institution :</label>
                        <div class="col-md-9">
                            <input type="text" id="institut" name="institut" class="form-control required" placeholder="ENSA Marrakech">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Laboratoire :</label>
                        <div class="col-md-9">
                            <input type="text" id="labo" name="labo" class="form-control required" placeholder="GI">
                        </div>
                 </div>
                 <div class="form-group">
                        <label class="col-md-3 control-label">Equipe de travail :</label>
                        <div class="col-md-9">
                            <input type="text" id="equipe" name="equipe" class="form-control required" placeholder="Equipe">
                        </div>
                 </div>
                 <p><br>
        		
       			 </p>
            	 <br><br>
                 <div class="clear"></div>

        <p><br>
        <input id="SaveAccount" name="send" type="submit" class="right" value="Enregistrer" />
        </p>
        </form>
								
								
				</div>
			</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				
		</div> <!-- /.row -->

	</div> <!-- /.row -->
				<!-- /Page Content -->
	</div>
			<!-- /.container -->

</div>

</body>
</html>