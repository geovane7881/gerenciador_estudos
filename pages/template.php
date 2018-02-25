<html>
    <head>
    <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="menu-topo">
            <a href="http://localhost/gerenciador/" class="btn btn-primary">Home</a>
            <a href="http://localhost/gerenciador/estudar.php" class="btn btn-primary">Estudar</a>
            <a href="http://localhost/gerenciador/programar.php" class="btn btn-primary">Programar</a>
            <a href="http://localhost/gerenciador/descansar.php" class="btn btn-primary">Descansar</a>
            <a id="botao-gerenciar" href="http://localhost/gerenciador/gerenciar.php"><img src="http://localhost/gerenciador/images/config.png"/></a>
        </div>
        <div class="container main">
        <?php loadViewInTemplate($viewName, $viewData);?>    
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
