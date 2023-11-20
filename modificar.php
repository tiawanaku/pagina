<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>33investing.com</title>
</head>
<body>
<table class="table table-bordered table striped">
                            <tbody style="background: rgba(51, 79, 255, 0.3); border: 4px solid rgba(100, 200, 0, 0.3);">
								<tr>
									<th>No</th>
									<th>usuario</th>
									<th>Contraseña actual</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Pais</th>
                                    <th>Tu Paquete</th>
                                    <th>Patrocinador</th>
                                    <th>Modificar contraseña</th>
								</tr>
                                </tbody>
                               
								<?php
								$i=1;
									$query = mysqli_query($con,"select * from user where email='$userid'");
									if(mysqli_num_rows($query)>0){
										while($row=mysqli_fetch_array($query)){
											$email = $row['email'];
											$password = $row['password'];
                                            $nombre = $row['nombre'];
                                            $apellido = $row['apellido'];
                                            $mobile =$row['mobile'];
                                            $address =$row['address'];
                                            $pais =$row['pais'];
                                            $account =$row['account'];
                                            $under_userid =$row['under_userid'];
										?>
                                         <tbody style="background: rgba(227, 250, 247, 0.3); border: 1px solid rgba(200, 100, 0, 0.3);">
											<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $password; ?></td>
                                            <td><?php echo $nombre; ?></td>
                                            <td><?php echo $apellido; ?></td>
                                            <td><?php echo $mobile; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $pais; ?></td>
                                            <td><?php echo $account; ?></td>
                                            <td><?php echo $under_userid; ?></td>

				<td><a href="modificar_usuario.php?ID=<?php echo $IDu;?>">modificar</a></td>
			  </tr>
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

			  

<a href="index.php">Regresar</a>

</body>
</html>