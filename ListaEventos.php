<?php 
require_once "modelos/conexion.php";
    $active2="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 

    

    $stmt = Conexion2::conectar()->prepare("SELECT * FROM evento");
    //$stmt = Conexion2::conectar()->prepare('call prc_eventos');
        
    $stmt->execute();
    
    $data = $stmt->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Eventos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   


</head>

<body>

    <div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
        <!-- Content Header (Page header) -->
        <h1>Mis Eventos </h1>
        

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="myfiles.php"><i class="fa fa-archive"></i> Mis eventos</a></li>

        </ol>
    </section>
            <div class="container mt-3">
                <div class="row">
                    <section class="content">
                        <?php foreach($data as $key):?>
                            <section class="content">
                        <div class="card mb-6" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                <img width="450" height="300"
                                        src=" data:image/png/jpeg/jpg;base64, <?php  echo  base64_encode( $key [ 'imagen_evento' ]); ?> ">

                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Tipo Evento: <?php echo $key['tipo_evento'] ?></h5>
                                        
                                        <div  class="col-md-5"><p class="card-text"><small class="text-muted">Fecha Inicial: <?php echo $key['fecha_inicial'] ?></small>
                                        </p></div>
                                        <p class="card-text"><small class="text-muted">Fecha Final: <?php echo $key['fecha_final'] ?></small>
                                        </p>

                                        <div  class="col-md-5"><p class="card-text"><small class="text-muted">Hora Inicial: <?php echo $key['hora_inicial'] ?></small>
                                        </p></div>
                                        <p class="card-text"><small class="text-muted">Hora Final: <?php echo $key['hora_final'] ?></small>
                                        </p>

                                   

                                            <a href="ListaEventos.php" class="btn btn-xs btn-"><i class=" fa fas fa-podcast "></i> <span>Transmitir</span></a>
                                          
                                    </div>
                                </div>
                            </div>
                        </div>

                        </section>

                        <?php endforeach; ?>

                    </section>


                </div>
            </div>
    </div>
</body>

</html>

<?php include "footer.php"; ?>