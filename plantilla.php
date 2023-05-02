<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tongo Software</title>
    <link rel="shortcut icon" href="vistas/assets/dist/img/tongo6.png" type="image/x-icon">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
        include "head.php";
        include "header.php";
    ?>

    

    <?php include "footer.php"; ?>


    </div>
    <!-- ./wrapper -->

    <script>
    function CargarContenido(pagina_php, contenedor) {
        $("." + contenedor).load(pagina_php);
    }
    </script>


</body>

</html>