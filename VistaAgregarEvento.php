<?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>carpeta subido exitosamente</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> No se pudo subir, hubo un error.</p>";
                        }elseif (isset($_GET['error2']) && isset($_GET['max_size'])) {
                            echo "<p class='alert alert-info'> <i class=' fa fa-exclamation-circle'></i> Hubo un error el archivo supero el peso máximo.</p>";
                        }elseif (isset($_GET['error3']) && isset($_GET['fatal'])) {
                            echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> Error fatal, el archivo no se pudo cargar.</p>";
                        }
                    ?>

<form enctype="multipart/form-data" action="action/AgregarEvento.php" method="POST">

<p><b>Tipo Evento:</b><br /><input type='text' name='tipo_evento'/>
<p><b>Fecha inicial:</b><br /><input type='date' name='fecha_inicial'/>
<p><b>Fecha final:</b><br /><input type='date' name='fecha_final'/>
<p><b>Hora inicial:</b><br /><input type='time' name='hora_inicial'/>
<p><b>Hora final:</b><br /><input type='time' name='hora_final'/>
<p><b>Salon:</b><br /><input type='number' name='id_salon'/>
<p><b>imagen_evento:</b><br /><input name="imagen_evento" type="file" />
<p><input type='submit' value='Guardar' />
<input type='hidden' value='1' name='enviado' />
</form>