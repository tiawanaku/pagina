<?php

include('php-includes/connect.php');
include('php-includes/check-login.php');
$email = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

   
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
                                    <li><a href="modificar.php">Editar Perfil</a></li>
                                    <!--<li><a href="#">Tu Cuenta</a></li>
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
                    
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <br></br>
                        <caption>para cambio de contraseña y dudas envie un correo a: support@33investing.com</caption>
                            <table class="table table-bordered table'striped">
                                <tr>
                                    <!--<th>No</th>-->
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>

                                </tr>
                                <?php
                                $i=1;
                                    $query = mysqli_query($con,"select * from user where email='$email'");
                                    if(mysqli_num_rows($query)>0){
                                        while($row=mysqli_fetch_array($query)){
                                            $nombre = $row['nombre'];
                                            $apellido = $row['apellido'];
                                            $mobile = $row['mobile'];
                                            $address = $row['address'];
                                        ?>
                                            <tr>
                                            <!--<td><?php echo $i; ?></td>-->
                                            <td><?php echo $nombre; ?></td>
                                            <td><?php echo $apellido; ?></td>
                                            <td><?php echo $mobile; ?></td>
                                            <td><?php echo $address; ?></td>
                                            </tr>
                                        <?php
                                            $i++;   
                                        }
                                    }
                                    else{
                                    ?>
                                        <tr>
                                            <td colspan="4">Tu no tienes datos registrados</td>
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