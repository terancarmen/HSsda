<?php 
require_once "modelos/conexion.php";
    $active2="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 

    

    
    $stmt = Conexion2::conectar()->prepare('call prc_eventos');
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $con1 = Conexion2::conectar()->prepare("SELECT * FROM salon");
    $con1->execute();
    $data2 = $con1->fetchAll(PDO::FETCH_ASSOC);


?>

<?php 
    $alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
    $token = "";
    for($i=0;$i<6;$i++){
        $token .= $alphabeth[rand(0,strlen($alphabeth)-1)];
    }
    $_SESSION["tkn"]=$token;
 
  

?>




<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <!-- Content Header (Page header) -->
        <h1>Mis Eventos </h1>
         
        <a href="newEvento.php" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Agregar Evento</a>
                                            


        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="myfiles.php"><i class="fa fa-archive"></i> Mis eventos</a></li>

        </ol>
    </section>

    <section class="content">
        <!-- Main content -->
        <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header">

                        <h3 class="box-title">Mis Eventos <i class="fa fa-file"></i></h3>

                    </div><!-- /.box-header -->



                    <div class="box-body no-padding">
                        <table id="tbl_eventos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id_evento</th>
                                    <th>tipo_evento</th>
                                    <th>fecha_inicial</th>
                                    <th>fecha_final</th>
                                    <th>hora_inicial</th>
                                    <th>hora_final</th>
                                    <th>nombre_salon</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $key):?>
                                <tr>
                                    <td><?php echo $key['id_evento'] ?></td>
                                    <td><?php echo $key['tipo_evento'] ?></td>
                                    <td><?php echo $key['fecha_inicial'] ?></td>
                                    <td><?php echo $key['fecha_final'] ?></td>
                                    <td><?php echo $key['hora_inicial'] ?></td>
                                    <td><?php echo $key['hora_final'] ?></td>
                                    <td><?php echo $key['nombre_salon'] ?></td>

                                    <td style="width:223px;">
                                        <a href="action/ver_evento.php?id=<?php echo $key['id_evento']; ?>"
                                            class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Ver</a>
                                        <a href="editarEventoVista.php?id=<?php echo $key['id_evento'];?>"
                                            class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                        <a href="action/eliminarEvento.php?id=<?php echo $key['id_evento']; ?>&tkn=<?php echo $_SESSION["tkn"]?>"
                                            class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                                    </td>


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div><!-- /.box-body --><br>
                </div><!-- /.box -->

            </div>
        </div><!-- /.row -->



        
    </section>
</div><!-- /.content -->



<script>
$(document).ready(function() {
    $('#tbl_eventos').DataTable();
});


var accion;
var table;




/*===================================================================*/
//INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
/*===================================================================*/
var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});


document.getElementById("btnGuardarEvento").addEventListener("click", function() {

// Get the forms we want to add validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {

    if (form.checkValidity() === true) {
        console.log("Listo para registrar el producto")

        Swal.fire({
            title: 'Está seguro de registrar el evento?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo registrarlo!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                if (accion == 2) {
                    //var titulo_msj = "El producto se registró correctamente"
                    $.ajax({
                        url: "ajax/evento.ajax.php",
                        method: "POST",
                        data: {
                            'accion': accion,
                            'iptTipoEvento': $("#iptTipoEvento").val(),
                            'selSalon': $("#selSalon").val(),
                            'iptFechaCreacion': $("#iptFechaCreacion").val(),
                            'iptFechaTerminacion': $("#iptFechaTerminacion").val(),
                            'iptHoraInicio': $("#iptHoraInicio").val(),
                            'iptHoraFinal': $("#iptHoraFinal").val(),
                            'iptImagen': $("#iptImagen").val()
                        },
                        dataType: 'json',
                        success: function(respuesta) {
                            if (respuesta == "ok") {

                                //  alert("evento Registrado");
                                Swal.fire({

                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'evento Registrado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })



                                table.ajax.reload();

                                $("#mdlGestionarEvento").modal('hide');

                                $("#iptTipoEvento").val("");
                                $("#selSalon").val("");
                                $("#iptFechaCreacion").val("");
                                $("#iptFechaTerminacion").val("");
                                $("#iptHoraInicio").val("");
                                $("#iptHoraFinal").val("");
                                $("#iptImagen").val("");
                               

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El evento  no se pudo registrar'
                                });
                            }
                        }
                    });

                }
            }
        })
    } else {
        console.log("No paso la validacion")
    }

    form.classList.add('was-validated');

    return false;

});
})

$('#mdlGestionarEvento').on('shown.bs.modal', function () {
  $('#btnCancelarRegistro').trigger('focus')
})


document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })
</script>


<?php include "footer.php"; ?>