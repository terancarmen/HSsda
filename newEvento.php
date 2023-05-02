<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nueva Evento</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo evento</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>Evento subido exitosamente</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> No se pudo subir, hubo un error.</p>";
                        }elseif (isset($_GET['error2']) && isset($_GET['max_size'])) {
                            echo "<p class='alert alert-info'> <i class=' fa fa-exclamation-circle'></i> Hubo un error el archivo supero el peso máximo.</p>";
                        }elseif (isset($_GET['error3']) && isset($_GET['fatal'])) {
                            echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> Error fatal, el archivo no se pudo cargar.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Nuevo Evento</h3>
                        </div><!-- /.box-header -->
                        <form enctype="multipart/form-data" action="action/AgregarEvento.php" method="POST"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="evento">Tipo Evento</label>
                                    <input type="text" name='tipo_evento' class="form-control" id="evento" placeholder="Nombre del evento">
                                </div>

                                <div class="form-group">
                                    <label for="fecha_ini">Fecha Inicial</label>
                                    <input type="date"  name='fecha_inicial' class="form-control" id="fecha_ini" >
                                </div>

                                <div class="form-group">
                                    <label for="fecha_end">Fecha Final</label>
                                    <input type="date" name='fecha_final' class="form-control" id="fecha_end" >
                                </div>

                                <div class="form-group">
                                    <label for="hora_ini">Hora Inicial</label>
                                    <input type="time" name='hora_inicial' class="form-control" id="hora_ini" >
                                </div>

                                <div class="form-group">
                                    <label for="hora_end">Hora Final</label>
                                    <input type="time" name='hora_final' class="form-control" id="hora_end" >
                                </div>

                                <div class="form-group">
                                    <label for="evento">salon</label>
                                    <input type="number" name='id_salon' class="form-control" id="evento" placeholder="Nombre del salon">
                                </div>

                               
                                    <div class="form-group ">
                                        <label class="" for="iptImagen"><i
                                                class="far fa-calendar-alt fs-6"></i>
                                            <span class="small">Imagen</span><span class="text-danger">*</span></label>
                                        <input type="file" min="0" class="form-control form-control-sm"
                                            id="iptImagen" name="imagen_evento"
                                            placeholder="fecha terminación" required>
                                        <div class="invalid-feedback">Elija una imagen</div>
                                    </div>
                              
                              
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" value='Guardar' class="btn btn-primary">Crear Evento</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>