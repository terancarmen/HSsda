<?php 
    $active1="active";
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 


    $count_files = mysqli_query($con, "select * from file");
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment");
    $count_eventos=mysqli_query($con, "select * from evento");

?>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">



<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <!-- Content Header (Page header) -->
        <h1>Dashboard<small>Panel de control</small> </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <!-- Main content -->
        <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo mysqli_num_rows($count_files); ?></h3>
                        <p>Archivos</p>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <!-- small box -->
                    <div class="inner">
                        <?php
                        //compruebo si hay archivos, sino hay muestro un cero
                            if (mysqli_num_rows($count_files)!=null){
                                 foreach ($count_download as $count) {  
                        ?>
                        <h3><?php echo $count['download']; ?></h3>
                        <?php 
                                } //end foreach
                            }else{

                        ?>
                        <h3>0</h3>
                        <?php        
                            }   

                        ?>
                        <p>Descargas</p>
                    </div>

                    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <!-- small box -->
                    <div class="inner">
                        <h3><?php echo mysqli_num_rows($count_user); ?></h3>
                        <p>Usuarios</p>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <!-- small box -->
                    <div class="inner">
                        <h3><?php echo mysqli_num_rows($count_eventos); ?></h3>
                        <p>Eventos</p>
                    </div>
                    <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->



        </div><!-- /.row -->
        <div class="row">
            <!-- .row -->
            <div class="col-md-4">
                <div class="image view view-first">
                    <img class="thumb-image" style="width: 100%; display: block;"
                        src="images/profiles/<?php echo $profile_pic ?>"" alt=" image">
                </div>
                <span class="btn btn-my-button btn-file" style="width: 345px; margin-top: 5px;">
                    <form method="post" id="formulario" enctype="multipart/form-data">
                        Cambiar Imagen de perfil: <input type="file" name="fi  m le">
                    </form>
                </span>
                <div id="respuesta"></div>
                <br>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <!-- <div id="result"></div> -->
                <div class="box box-primary">
                    <!-- general form elements -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Personales: </h3>
                    </div> <!-- /.box-header -->
                    <form role="form" method="post" action="action/updprofile2.php">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fullname">Nombre Completo</label>
                                <input name="fullname" type="text" class="form-control" id="fullname"
                                    value="<?php echo $fullname ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña Actual</label>
                                <input name="password" type="password" class="form-control" id="password"
                                    placeholder="*******">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Nueva Contraseña</label>
                                <input name="new_password" type="password" class="form-control" placeholder="*******"
                                    id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_new_password">Confirmar Nueva Contraseña</label>
                                <input name="confirm_new_password" type="password" class="form-control"
                                    placeholder="*******" id="confirm_new_password">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div><!-- /.row -->
    </section>
</div><!-- /.content -->


<?php include "footer.php"; ?>
<script>
$(function() {
    $("input[name='file']").on("change", function() {
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/uploadprofile.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos) {
                $("#respuesta").html(datos);
            }
        });
    });
});
</script>