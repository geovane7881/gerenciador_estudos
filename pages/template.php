<!doctype HTML>
<html>
    <head>
    <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="menu-topo">
            <a href="<?php echo URL;?>" class="btn btn-primary">Home</a>
            <a href="<?php echo URL;?>estudar.php" class="btn btn-primary">Estudar</a>
            <a href="<?php echo URL;?>programar.php" class="btn btn-primary">Programar</a>
            <a href="<?php echo URL;?>descansar.php" class="btn btn-primary">Descansar</a>
            <a id="botao-gerenciar" href="<?php echo URL;?>gerenciar.php"><img src="<?php echo URL;?>images/config.png"/></a>
        </div>
        <div class="container main">
        <?php loadViewInTemplate($viewName, $viewData);?>    
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
