<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
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
                                    <!--<li><a href="modificar.php">Editar Perfil</a></li>
                                    <li><a href="#">Tu Cuenta</a></li>
                                    <li class="divider"></li>-->
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
                                    solicita tu pin para activacion</b> </a></li>
                                <li><a href="pin.php"><i class="menu-icon icon-book"></i>Pin para Activacion<b class="label orange pull-right">
                                    </b> </a></li>
                                     <li><a href="arbol.php"><i class="menu-icon icon-user"></i>tu red de usuarios</a>
                                
                            </ul>
                            <!--/.widget-nav-->
                            
                               
                          

                            <!--acaba las pruebas-->
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
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a class="btn-box big span4"><i class="fa fa-shield"></i><b> <?php
                                    $i=1;
                                    $query = mysqli_query($con,"select * from plan where userid='$userid'");
                                    if(mysqli_num_rows($query)>0){
                                            while($row=mysqli_fetch_array($query)){
                                                $pin = $row['paquete'];
                                            ?>
                                                <tr>
                                                    
                                                    <td><?php echo $pin ?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="2">aun no tienes un paquete comprado</td>
                                        </tr>
                                    <?php
                                    }
                                ?></b>
                                        <p class="text-muted">
                                            Tu dinero en inversiones</p>
                                    </a><a class="btn-box big span4"><i class="fa fa-bank"></i><b><?php
                                    $i=1;
                                    $query = mysqli_query($con,"select * from plan where userid='$userid'");
                                    if(mysqli_num_rows($query)>0){
                                            while($row=mysqli_fetch_array($query)){
                                                $tre = $row['totalretiro'];
                                            ?>
                                                <tr>
                                                    
                                                    <td><?php echo $tre ?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="2">No tienes dinero para retirar</td>
                                        </tr>
                                    <?php
                                    }
                                ?></b>
                                        <p class="text-muted">
                                            Para retirar</p>
                                    </a><a class="btn-box big span4"><i class="fa fa-money"></i><b><?php
                                    $i=1;
                                    $query = mysqli_query($con,"select * from plan where userid='$userid'");
                                    if(mysqli_num_rows($query)>0){
                                            while($row=mysqli_fetch_array($query)){
                                                $pdi = $row['pagodiario'];
                                            ?>
                                                <tr>
                                                    
                                                    <td><?php echo $pdi ?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="2">estas suspendido</td>
                                        </tr>
                                    <?php
                                    }
                                ?></b>
                                        <p class="text-muted">
                                            pago diario</p>
                                    </a>
                                </div>
                                <!--<div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Clients</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
                                                    Rate</b> </a>
                                            </div>
                                        </div>
                                    </div> -->
                           <div class"row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped">
                                <tr>
                                    <th>S.n.</th>
                                    <th>Pin</th>
                                </tr>
                                <?php
                                    $i=1;
                                    $query = mysqli_query($con,"select * from pin_list where userid='$userid' and status='open'");
                                    if(mysqli_num_rows($query)>0){
                                            while($row=mysqli_fetch_array($query)){
                                                $pin = $row['pin'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $pin ?></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="2">Sorry you have no pin.</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div><!--/.row-->
                           
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
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