<DOCTYPE html>
<html lang="es">
    <head>
        <!-- Etiquetas meta requeridas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Estilos -->
        <?php if($option == 'index'){
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/main.css\">") ;
        }
        else if ($option == 'show' && is_numeric($item)) {
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/main.css\">") ;
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/article.css\">");
        }
        else if ($option == 'login') {
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/main.css\">") ;
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/user_area.css\">") ;
        }
        else {
            echo ("<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"views/css/print.css\">");
        }?>

        <!-- Tipografias -->
        <link href="https://fonts.googleapis.com/css?family=Lora|Playfair+Display|Roboto" rel="stylesheet">

        <!-- Font Awesome (usado solo para iconos -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="views/scripts/comments.js"></script>
        <script src="views/scripts/loadIcons.js"></script>

        <title>Arqueológico Granada</title>
    </head>
    <body>
        <header>

            <h1 class="brand-name"><a href="?option=index" style="text-decoration:none; color:black;">Arqueológico.</a></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="?option=index" class="<?php
                        if ($option == "index")
                            echo ("active");
                    ?>">EXPLORA</a></li>
                    <li><a href="?option=show&item=0" class="<?php
                        if ($option == "show")
                            echo ("active");
                    ?>">EXPOSICIONES</a></li>
                    <li><a href="#">TIENDA</a></li>
                    <li><a href="<?php
                        if(isset($_SESSION['user_name']))
                            echo("?option=login&item=userarea");
                        else
                            echo("?option=login&item=login");
                    ?>" class="<?php
                        if ($option == "login")
                            echo ("active");
                    ?>"><?php
                    require_once('controllers/article_controller.php');
                        if(isset($_SESSION['user_name'])){
                            echo(strtoupper($_SESSION['user_name']));
                        }   
                        else{
                            echo("ENTRAR");
                        }
                    ?></a></li>
                </ul>
            </nav>
            <div id="nav-strip"/>
        </header>

        <div class="sidebar">
            <ul>
                <?php if($option != 'login') { ?>
                    <li><a href="?option=index" class="<?php
                        if ($option == 'index')
                            echo ("active");
                        ?>">AHORA</a></li>
                    <li><a href="#">EVENTOS</a></li>
                    <li><a href="#">EL MUSEO</a></li>
                    <li><a href="#">PRÓXIMAMENTE</a></li>
                    <li><a href="#">PLANEA TU VISITA</a></li>
                    <li><a href="#">HORARIOS Y TICKETS</a></li>
                <?php } else {
                    require_once('views/user_area/customSidebar.php');
                } ?>
            </ul>
        </div>

        <?php require_once('routes.php'); ?>

        <footer>
            <ul class="list-footer">
                <li><img src="views/img/logos/junta.png" alt="Logo Junta de Andalucia"></li>
                <li><img src="views/img/logos/ugr.png" alt="Logo Universidad de Granada"></li>
                <li>
                    <h3>ENLACES DE INTERÉS</h3>
                    <p><a href="#">Cultura en Granada</a></p>
                    <p><a href="#">Museos de Andalucía</a></p>
                </li>
                <li>
                    <h3>ARQUEOLÓGICO SOCIAL</h3>
                    <p><i style="color: white; margin-right: 5px;" class="fab fa-facebook"></i> <a href="#">Facebook</a></p>
                    <p><i style="color: white; margin-right: 5px;" class="fab fa-twitter"></i> <a href="#">Twitter</a></p>
                    <p><i style="color: white; margin-right: 5px;" class="fab fa-instagram"></i> <a href="#">Instagram</a></p>
                </li>
            </ul>
        </footer>
    <body>
<html>
