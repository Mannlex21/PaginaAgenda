<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Agenda</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--
Concept Template
http://www.templatemo.com/tm-397-concept
-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800" rel="stylesheet" type="text/css">

    <!-- CSS Bootstrap & Custom -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/templatemo_style.css">
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-select.min.css">
    <!-- Latest compiled and minified CSS
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">-->

</head>

<body>
    <div class="site-header">
        <div class="main-navigation">
            <div class="responsive_menu">
                <ul>
                    <li><a class="show-1 templatemo_home" href="#">Agenda</a></li>
                    <li><a class="show-2 templatemo_page2" href="#">Visualizar</a></li>
                    <li><a class="show-3 templatemo_page3" href="#">Grafica</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 responsive-menu">
                        <a href="#" class="menu-toggle-btn"> <i class="fa fa-bars"></i> </a>
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-12 main_menu">
                        <ul>
                            <li><a class="show-1 templatemo_home" href="#">Agenda</a></li>
                            <li><a class="show-2 templatemo_page2" href="#">Visualizar</a></li>
                            <li><a class="show-3 templatemo_page3" href="#">Graficar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-container">
        <div class="content homepage" id="menu-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget-content">
                            <div class="page-title">Registrar</div>
                            <div class="contact-form">
                                    <form name="formulario" method="post" action="create.php">
                                        <fieldset>
                                            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                                                <label class="control-label">Nombre</label>
                                                <div class="controls">
                                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" maxlength="100" value="<?php echo !empty($nombre)?$nombre:'';?>">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="control-group <?php echo !empty($domicilioError)?'error':'';?>">
                                                <label class="control-label">Domicilio</label>
                                                <div class="controls">
                                                    <input type="text" name="domicilio" id="domicilio" placeholder="Domicilio" maxlength="250" value="<?php echo !empty($domicilio)?$domicilio:'';?>">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
                                                <label class="control-label">Telefono</label>
                                                <div class="controls">
                                                     <input type="tel" name="telefono" id="telefono" placeholder="Telefono" maxlength="30" value="<?php echo !empty($telefono)?$telefono:'';?>">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="control-group <?php echo !empty($ciudadError)?'error':'';?>">
                                                <label class="control-label">Ciudad</label>
                                                <div class="controls">
                                                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" maxlength="250" value="<?php echo !empty($ciudad)?$ciudad:'';?>">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input type="email" name="email" id="email" placeholder="Email" maxlength="100" value="<?php echo !empty($email)?$email:'';?>">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <label class="control-label">Tipo</label><br><br>
                                            <select name="opcion" class="selectpicker show-menu-arrow col-sm-6">
                                                  <option value="amigo">Amigo</option>
                                                  <option value="compañero">Compañero</option>
                                                  <option value="familia">Familiar</option>
                                            </select><br><br>

                                            <!--<div id="radios">
                                                Amigo<input type="radio" name="radio" value="amigo" class="idenT">
                                                Familiar<input type="radio" name="radio" value="familia">
                                                Compañero<input type="radio" name="radio" value="compañero">
                                            </div>-->
                                        </fieldset>

                                        <fieldset>
                                            <input type="submit" name="guardar" value="Guardar" id="submit" class="button">
                                        </fieldset>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content products" id="menu-2">
            <div class="container">
                <div class="row">
                        <table class="table table-striped table-bordered" id="tabla">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Domicilio</th>
                              <th>Telefono</th>
                              <th>Ciudad</th>
                              <th>Email</th>
                              <th>Tipo</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                           include 'database.php';
                           $pdo = Database::connect();
                           $sql = 'SELECT * FROM datos ORDER BY id DESC';
                           foreach ($pdo->query($sql) as $row) {
                                    echo '<tr>';
                                    echo '<td>'. $row['nombre'] . '</td>';
                                    echo '<td>'. $row['domicilio'] . '</td>';
                                    echo '<td>'. $row['telefono'] . '</td>';
                                    echo '<td>'. $row['ciudad'] . '</td>';
                                    echo '<td>'. $row['email'] . '</td>';
                                    echo '<td>'. $row['tipo'] . '</td>';
                                    echo '</tr>';
                           }
                           Database::disconnect();
                          ?>
                          </tbody>
                    </table>
                    <fieldset>
                        <input type="button" class="btn btn-success" onClick ="xml_generate ()" value="XML">
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="content services" id="menu-3">
            <div class="container">
                <div class="row">
                    <center><img src="grafico.php"/></center>
                </div>
            </div>
        </div>

    </div>

    <div id="templatemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Manuel Alejandro Murillo Macias</p>
                    <p>Taller de Plataformas Abiertas</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/tabs.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/templatemo_custom.js"></script>
    <script type="text/javascript" src="generarXML.js"></script>

    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <!-- Latest compiled and minified JavaScript
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>-->


</html>
