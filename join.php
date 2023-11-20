<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$capping = 500;
?>
<?php
//accion al usar el boton join
if(isset($_GET['join_user'])){
$side='';
$pin = mysqli_real_escape_string($con,$_GET['pin']);
$email = mysqli_real_escape_string($con,$_GET['email']);
$password = mysqli_real_escape_string($con,$_GET['password']);
$nombre = mysqli_real_escape_string($con,$_GET['nombre']);
$apellido = mysqli_real_escape_string($con,$_GET['apellido']);
$mobile = mysqli_real_escape_string($con,$_GET['mobile']);
$address = mysqli_real_escape_string($con,$_GET['address']);
$pais = mysqli_real_escape_string($con,$_GET['pais']);
$account = mysqli_real_escape_string($con,$_GET['account']);
$under_userid = mysqli_real_escape_string($con,$_GET['under_userid']);
$side = left;


$flag = 0;
if($pin!='' && $email!='' && $password!='' && $nombre!='' && $apellido!='' && $mobile!='' && $address!='' && $pais!='' && $account!='' && $under_userid!='' && $side!=''){
//User filled all the fields.
if(pin_check($pin)){
//Pin is ok
if(email_check($email)){
//Email is ok
if(!email_check($under_userid)){
//Under userid is ok
//if(side_check($under_userid,$side)){
//Side check
$flag=1;
//}
//else{
//echo '<script>alert("The side you selected is not available.");</script>';
//}
}
else{
//check under userid
echo '<script>alert("Invalid Under userid.");</script>';
}
}
else{
//check email
echo '<script>alert("This user id already availble.");</script>';
}
}
else{
//check pin
echo '<script>alert("Invalid pin");</script>';
}
}
else{
//check all fields are fill
echo '<script>alert("Please fill all the fields.");</script>';
}
//Now we are heree
//It means all the information is correct
//Now we will save all the information
if($flag==1){
//Insert into User profile
$query = mysqli_query($con,"insert into user(`email`,`password`,`nombre`,`apellido`,`mobile`,`address`,`pais`,`account`,`under_userid`,`side`) values('$email','$password','$nombre','$apellido','$mobile','$address','$pais','$account','$under_userid','$side')");
//Insert into Tree
//So that later on we can view tree.
$query = mysqli_query($con,"insert into tree(`userid`) values('$email')");
//Insert to side
$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
//Update pin status to close
$query = mysqli_query($con,"update pin_list set status='close' where pin='$pin'");
//Inset into Icome
$query = mysqli_query($con,"insert into income (`userid`) values('$email')");
//insertar en tabla plan
$query = mysqli_query($con,"insert into plan (`userid`) values('$email')");
//insertar en tabla extrac
$query = mysqli_query($con,"insert into extrac (`userid`) values('$email')");
//insertar en retiro_list
$query = mysqli_query($con,"insert into retiro_list (`userid`) values('$email')");
echo mysqli_error($con);
//This is the main part to join a user\
//If you will do any mistake here. Then the site will not work.
//Update count and Income.
$temp_under_userid = $under_userid;
$temp_side_count = $side.'count'; //leftcount or rightcount
$temp_side = $side;
$total_count=1;
$i=1;
while($total_count>0){
$i;
$q = mysqli_query($con,"select * from tree where userid='$temp_under_userid'");
$r = mysqli_fetch_array($q);
$current_temp_side_count = $r[$temp_side_count]+1;
$temp_under_userid;
$temp_side_count;
mysqli_query($con,"update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'");
//income
if($temp_under_userid!=""){
$income_data = income($temp_under_userid);
//check capping
//$income_data['day_bal'];
if($income_data['day_bal']<$capping){
$tree_data = tree($temp_under_userid);
//check leftplusright
//$tree_data['leftcount'];
//$tree_data['rightcount'];
//$leftplusright;
$temp_left_count = $tree_data['leftcount'];
$temp_right_count = $tree_data['rightcount'];
//Both left and right side should at least 1 user
if($temp_left_count>0 && $temp_right_count>0){
if($temp_side=='right'){
$temp_left_count;
$temp_right_count;
if($temp_left_count<=$temp_right_count){
$new_day_bal = $income_data['day_bal']+100;
$new_current_bal = $income_data['current_bal']+100;
$new_total_bal = $income_data['total_bal']+100;
//update income
mysqli_query($con,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");
}
}
else{
if($temp_right_count<=$temp_left_count){
$new_day_bal = $income_data['day_bal']+100;
$new_current_bal = $income_data['current_bal']+100;
$new_total_bal = $income_data['total_bal']+100;
$temp_under_userid;
//update income
if(mysqli_query($con,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid'")){
}
}
}
}//Both left and right side should at least 1 user
}
//change under_userid
$next_under_userid = getUnderId($temp_under_userid);
$temp_side = getUnderIdPlace($temp_under_userid);
$temp_side_count = $temp_side.'count';
$temp_under_userid = $next_under_userid;
$i++;
}
//Chaeck for the last user
if($temp_under_userid==""){
$total_count=0;
}
}//Loop

echo mysqli_error($con);
echo '<script>alert("Testing success.");</script>';
}
}
?><!--/join user-->
<?php 
//functions
function pin_check($pin){
global $con,$userid;
$query =mysqli_query($con,"select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
if(mysqli_num_rows($query)>0){
return true;
}
else{
return false;
}
}
function email_check($email){
global $con;
$query =mysqli_query($con,"select * from user where email='$email'");
if(mysqli_num_rows($query)>0){
return false;
}
else{
return true;
}
}
function side_check($email,$side){
global $con;
$query =mysqli_query($con,"select * from tree where userid='$email'");
$result = mysqli_fetch_array($query);
$side_value = $result[$side];
if($side_value==''){
return true;
}
else{
return false;
}
}
function income($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from income where userid='$userid'");
$result = mysqli_fetch_array($query);
$data['day_bal'] = $result['day_bal'];
$data['current_bal'] = $result['current_bal'];
$data['total_bal'] = $result['total_bal'];
return $data;
}
function tree($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from tree where userid='$userid'");
$result = mysqli_fetch_array($query);
$data['left'] = $result['left'];
$data['right'] = $result['right'];
$data['leftcount'] = $result['leftcount'];
$data['rightcount'] = $result['rightcount'];
return $data;
}
function getUnderId($userid){
global $con;
$query = mysqli_query($con,"select * from user where email='$userid'");
$result = mysqli_fetch_array($query);
return $result['under_userid'];
}
function getUnderIdPlace($userid){
global $con;
$query = mysqli_query($con,"select * from user where email='$userid'");
$result = mysqli_fetch_array($query);
return $result['side'];
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
                           
                            

                                <div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Ingreso Nuevo Usuario</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-4">
<form method="get">
<div class="form-group">
<label>Pin</label>
<input type="text" name="pin" class="form-control" required>
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>
<div class="form-group">
<label>nombre</label>
<input type="text" name="nombre" class="form-control" required>
</div>
<div class="form-group">
<label>apellido</label>
<input type="text" name="apellido" class="form-control" required>
</div>
<div class="form-group">
<label>Numero de whatsapp</label>
<input type="text" name="mobile" class="form-control" required>
</div>
<div class="form-group">
<label>Direccion</label>
<input type="text" name="address" class="form-control" required>
</div>
<div class="form-group">
<label>Pais</label>
<div class="form-group">
                    <br><select type="text" name="pais"> 
                    	<option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="4">American Samoa</option>
<option value="5">Andorra</option>
<option value="6">Angola</option>
<option value="7">Anguilla</option>
<option value="8">Antarctica</option>
<option value="9">Antigua And Barbuda</option>
<option value="10">Argentina</option>
<option value="11">Armenia</option>
<option value="12">Aruba</option>
<option value="13">Australia</option>
<option value="14">Austria</option>
<option value="15">Azerbaijan</option>
<option value="16">Bahamas</option>
<option value="17">Bahrain</option>
<option value="18">Bangladesh</option>
<option value="19">Barbados</option>
<option value="20">Belarus</option>
<option value="21">Belgium</option>
<option value="22">Belize</option>
<option value="23">Benin</option>
<option value="24">Bermuda</option>
<option value="25">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="27">Bosnia And Herzegovina</option>
<option value="28">Botswana</option>
<option value="29">Bouvet Island</option>
<option value="30">Brazil</option>
<option value="31">British Indian Ocean Territory</option>
<option value="32">Brunei Darussalam</option>
<option value="33">Bulgaria</option>
<option value="34">Burkina Faso</option>
<option value="35">Burundi</option>
<option value="36">Cambodia</option>
<option value="37">Cameroon</option>
<option value="38">Canada</option>
<option value="39">Cape Verde</option>
<option value="40">Cayman Islands</option>
<option value="41">Central African Republic</option>
<option value="42">Chad</option>
<option value="43">Chile</option>
<option value="44">China</option>
<option value="45">Christmas Island</option>
<option value="46">Cocos (keeling) Islands</option>
<option value="47">Colombia</option>
<option value="48">Comoros</option>
<option value="49">Congo</option>
<option value="50">Congo, The Democratic Republic Of The</option>
<option value="51">Cook Islands</option>
<option value="52">Costa Rica</option>
<option value="53">Cote D&#39;ivoire</option>
<option value="54">Croatia</option>
<option value="55">Cuba</option>
<option value="56">Cyprus</option>
<option value="57">Czech Republic</option>
<option value="58">Denmark</option>
<option value="59">Djibouti</option>
<option value="60">Dominica</option>
<option value="61">Dominican Republic</option>
<option value="62">East Timor</option>
<option value="63">Ecuador</option>
<option value="64">Egypt</option>
<option value="65">El Salvador</option>
<option value="66">Equatorial Guinea</option>
<option value="67">Eritrea</option>
<option value="68">Estonia</option>
<option value="69">Ethiopia</option>
<option value="70">Falkland Islands (malvinas)</option>
<option value="71">Faroe Islands</option>
<option value="72">Fiji</option>
<option value="73">Finland</option>
<option value="74">France</option>
<option value="75">French Guiana</option>
<option value="76">French Polynesia</option>
<option value="77">French Southern Territories</option>
<option value="78">Gabon</option>
<option value="79">Gambia</option>
<option value="80">Georgia</option>
<option value="81">Germany</option>
<option value="82">Ghana</option>
<option value="83">Gibraltar</option>
<option value="84">Greece</option>
<option value="85">Greenland</option>
<option value="86">Grenada</option>
<option value="87">Guadeloupe</option>
<option value="88">Guam</option>
<option value="89">Guatemala</option>
<option value="90">Guinea</option>
<option value="91">Guinea-bissau</option>
<option value="92">Guyana</option>
<option value="93">Haiti</option>
<option value="94">Heard Island And Mcdonald Islands</option>
<option value="95">Holy See (vatican City State)</option>
<option value="96">Honduras</option>
<option value="97">Hong Kong</option>
<option value="98">Hungary</option>
<option value="99">Iceland</option>
<option value="100">India</option>
<option value="101">Indonesia</option>
<option value="102">Iran, Islamic Republic Of</option>
<option value="103">Iraq</option>
<option value="104">Ireland</option>
<option value="105">Israel</option>
<option value="106">Italy</option>
<option value="107">Jamaica</option>
<option value="108">Japan</option>
<option value="109">Jordan</option>
<option value="110">Kazakstan</option>
<option value="111">Kenya</option>
<option value="112">Kiribati</option>
<option value="113">Korea, Democratic People&#39;s Republic Of</option>
<option value="114">Korea, Republic Of</option>
<option value="115">Kosovo</option>
<option value="116">Kuwait</option>
<option value="117">Kyrgyzstan</option>
<option value="118">Lao People&#39;s Democratic Republic</option>
<option value="119">Latvia</option>
<option value="120">Lebanon</option>
<option value="121">Lesotho</option>
<option value="122">Liberia</option>
<option value="123">Libyan Arab Jamahiriya</option>
<option value="124">Liechtenstein</option>
<option value="125">Lithuania</option>
<option value="126">Luxembourg</option>
<option value="127">Macau</option>
<option value="128">Macedonia, The Former Yugoslav Republic Of</option>
<option value="129">Madagascar</option>
<option value="130">Malawi</option>
<option value="131">Malaysia</option>
<option value="132">Maldives</option>
<option value="133">Mali</option>
<option value="134">Malta</option>
<option value="135">Marshall Islands</option>
<option value="136">Martinique</option>
<option value="137">Mauritania</option>
<option value="138">Mauritius</option>
<option value="139">Mayotte</option>
<option value="140">Mexico</option>
<option value="141">Micronesia, Federated States Of</option>
<option value="142">Moldova, Republic Of</option>
<option value="143">Monaco</option>
<option value="144">Mongolia</option>
<option value="146">Montenegro</option>
<option value="145">Montserrat</option>
<option value="147">Morocco</option>
<option value="148">Mozambique</option>
<option value="149">Myanmar</option>
<option value="150">Namibia</option>
<option value="151">Nauru</option>
<option value="152">Nepal</option>
<option value="153">Netherlands</option>
<option value="154">Netherlands Antilles</option>
<option value="155">New Caledonia</option>
<option value="156">New Zealand</option>
<option value="157">Nicaragua</option>
<option value="158">Niger</option>
<option value="159">Nigeria</option>
<option value="160">Niue</option>
<option value="161">Norfolk Island</option>
<option value="162">Northern Mariana Islands</option>
<option value="163">Norway</option>
<option value="164">Oman</option>
<option value="165">Pakistan</option>
<option value="166">Palau</option>
<option value="167">Palestinian Territory, Occupied</option>
<option value="168">Panama</option>
<option value="169">Papua New Guinea</option>
<option value="170">Paraguay</option>
<option value="171">Peru</option>
<option value="172">Philippines</option>
<option value="173">Pitcairn</option>
<option value="174">Poland</option>
<option value="175">Portugal</option>
<option value="176">Puerto Rico</option>
<option value="177">Qatar</option>
<option value="178">Reunion</option>
<option value="179">Romania</option>
<option value="180">Russian Federation</option>
<option value="181">Rwanda</option>
<option value="182">Saint Helena</option>
<option value="183">Saint Kitts And Nevis</option>
<option value="184">Saint Lucia</option>
<option value="185">Saint Pierre And Miquelon</option>
<option value="186">Saint Vincent And The Grenadines</option>
<option value="187">Samoa</option>
<option value="188">San Marino</option>
<option value="189">Sao Tome And Principe</option>
<option value="190">Saudi Arabia</option>
<option value="191">Senegal</option>
<option value="192">Serbia</option>
<option value="193">Seychelles</option>
<option value="194">Sierra Leone</option>
<option value="195">Singapore</option>
<option value="196">Slovakia</option>
<option value="197">Slovenia</option>
<option value="198">Solomon Islands</option>
<option value="199">Somalia</option>
<option value="200">South Africa</option>
<option value="201">South Georgia And The South Sandwich Islands</option>
<option value="202">Spain</option>
<option value="203">Sri Lanka</option>
<option value="204">Sudan</option>
<option value="205">Suriname</option>
<option value="206">Svalbard And Jan Mayen</option>
<option value="207">Swaziland</option>
<option value="208">Sweden</option>
<option value="209">Switzerland</option>
<option value="210">Syrian Arab Republic</option>
<option value="211">Taiwan, Province Of China</option>
<option value="212">Tajikistan</option>
<option value="213">Tanzania, United Republic Of</option>
<option value="214">Thailand</option>
<option value="215">Togo</option>
<option value="216">Tokelau</option>
<option value="217">Tonga</option>
<option value="218">Trinidad And Tobago</option>
<option value="219">Tunisia</option>
<option value="220">Turkey</option>
<option value="221">Turkmenistan</option>
<option value="222">Turks And Caicos Islands</option>
<option value="223">Tuvalu</option>
<option value="224">Uganda</option>
<option value="225">Ukraine</option>
<option value="226">United Arab Emirates</option>
<option value="227">United Kingdom</option>
<option value="229">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, British">Virgin Islands, British</option>
<option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
<option value="Wallis And Futuna">Wallis And Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                           <option value="EstadosUnidos" selected>Estados Unidos</option>
                          
                    </select>
                    </br>
</div>
<div class="form-group">
<label>Numero de ID</label>
<input type="num" name="account" class="form-control" required>
</div>
<div class="form-group">
<label>Patrocinador</label>
<input type="text" name="under_userid" class="form-control" required>
</div>
<!--<div class="form-group">
<label>Seleccione</label><br>
<input type="radio" name="side" value="left"> primer nievel 10%
<input type="radio" name="side" value="right"> segundo nivel 5%
</div>-->
<div class="form-group">
<input type="submit" name="join_user" class="btn btn-primary" value="Join">
</div>
</form>
</div>
</div><!--/.row-->
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