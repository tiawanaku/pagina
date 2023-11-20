<?php

require('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];
?>
<?php
//pin request
if(isset($_GET['pin_request'])){
	$amount = mysqli_real_escape_string($con,$_GET['amount']);
	$date = date("y-m-d");
    $banco = mysqli_real_escape_string($con,$_GET['banco']);
	
	if($amount!=''){
			//Insert the value to pin request
			$query = mysqli_query($con,"insert into pin_request(`email`,`amount`,`date`,`banco`) values('$email','$amount','$date','$banco')");
			if($query){
				echo '<script>alert("Pin send successfully.");window.location.assing("pin-request.php");</script>';
			}
			else{
				echo mysqli_error($con);
				//echo '<script>alert("Unknown error occure.");window.location.assing("pin-request.php");</script>';
			}
	}
	else{
		echo '<script>alert("Please fill all the fields");</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>33 investing</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

</head>

<body>

 <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="ingre.php">33investing.com </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                    <img src="images/PNG/32/blue-26.png" />
                       <!--
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        -->
                        <ul class="nav pull-right">
                            
                                
                            </li>
                            <!-- <li><a href="#">Soporte tecnico </a></li> -->
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="usuario.php">Datos Personales</a></li>
                                    <!--<li><a href="#">Editar Perfil</a></li>
                                    <li><a href="#">Tu Cuenta</a></li>
                                    <li class="divider"></li> -->
                                    <li><a href="logout.php">Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="home.php"><i class="menu-icon icon-home"></i>Dashboard
                                </a></li>
                                <li><a href="join.php"><i class="menu-icon icon-user"></i>Nuevo registro</a>
                                </li>
                                <li><a href="pin-request.php"><i class="menu-icon icon-lock"></i>solicitar pin <b class="label green pull-right">
                                    </b> </a></li>
                                <li><a href="pin.php"><i class="menu-icon icon-book"></i>Pin para activacion <b class="label orange pull-right">
                                    </b> </a></li>
                                    <li><a href="arbol.php"><i class="menu-icon icon-user"></i>tu red de usuarios</a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                           <ul class="widget widget-menu unstyled">
                                <li><a href="retiro.php"><i class="menu-icon icon-bold"></i> Billetera </a></li>
                                <li><a href="retiro-request.php"><i class="menu-icon icon-book"></i>Solicitud de Retiro </a></li>
                               
                            </ul>
                            <!--/.widget-nav-->
                           
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    <!--    <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-shield"></i><b>500$</b>
                                        <p class="text-muted">
                                            PACK-1</p>
                                    </a><a class="btn-box big span4"><i class="fa fa-bank"></i><b>300$</b>
                                        <p class="text-muted">
                                            Monto para Retirar</p>
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i><b>5$</b>
                                        <p class="text-muted">
                                            pago diario</p>
                                    </a>-->
                               
                                   				<div class="row">
					<div class="col-lg-4">
					<form method="get">

						<div class="form-group">
                         <center><label>Seleccione Paquete</label>
                    <div class="form-group">
                        <select type="text" name="amount"> 
                           <option value="500" selected>500usd</option>
                           <option value="1000">1000usd</option>
                           <option value="2000">2000usd</option>
                          
                    </select>
							
						</div>
                         <center><label>Seleccione Banco a Depositar</label>
                    <div class="form-group">
                        <select type="text" name="banco"> 
                           <option value="banco union no de cuenta 3243156132" selected>Banco Union</option>
                           <option value="banco ganadero no de cuenta 251-1239-2 en dolares">Banco Ganadero</option>
                           <option value="banco fie no de cuenta 123456-2 en dolares">Banco Fie</option>
                          
                    </select>
                    
                </div></center>
               
                    
                </div></center>
							<div class="form-group">
							<center><input type="submit" name="pin_request" class="btn btn-primary" value="Solicitar Pin"></center>
							</div>
					</form>
					</div>
				</div>
					<div class="row">
						<div class="col-lg-6">
						<div class="table-responsive">
                        <center><caption>Extracto de tus Solicitudes <img src="images/PNG/32/blue-39.png"></caption></center>
                        
							<table class="table table-bordered table striped">
                            <tbody style="background: rgba(51, 79, 255, 0.3); border: 4px solid rgba(100, 200, 0, 0.3);">
								<tr>
									<th>No</th>
									<th>Pack</th>
									<th>Fecha</th>
                                    <th>Banco y cuenta</th>
                                    <th>Estado</th>
								</tr>
                                </tbody>
                               
								<?php
								$i=1;
									$query = mysqli_query($con,"select * from pin_request where email='$email' order by id desc");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
											$amount = $row['amount'];
											$date = $row['date'];
                                            $banco = $row['banco'];
                                            $status = $row['status'];
										?>
                                         <tbody style="background: rgba(227, 250, 247, 0.3); border: 1px solid rgba(200, 100, 0, 0.3);">
											<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $amount; ?></td>
											<td><?php echo $date; ?></td>
                                            <td><?php echo $banco; ?></td>
                                            <td><?php echo $status; ?></td>
											</tr>
                                            </tbody>
										<?php
											$i++;	
										}
									}
									else{
									?>
										<tr>
											<td colspan="4">Tu no tienes pin's pendientes</td>
										</tr>
									<?php
									}
								?>
							</table>
                            
					</div>	
			 
                            <!--/#btn-controls-->
                           
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2017 33 investing - www.33investing.com </b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

</body>

</html>