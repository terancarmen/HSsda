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



    <aside class="main-sidebar"><!-- Left side column. contains the logo and sidebar -->
        <section class="sidebar"><!-- sidebar: style can be found in sidebar.less -->
            <div class="user-panel"> <!-- Sidebar user panel -->
                <div class="pull-left image">
                    <img src="images/profiles/<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $fullname; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu"><!-- sidebar menu: : style can be found in sidebar.less -->
                <li class="header">NAVEGACIÓN</li>

                <li class="<?php if(isset($active1)){echo $active1;}?>">
                    <a href="home.php"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
                </li>

                <li class="<?php if(isset($active2)){echo $active2;}?>">
                    <a href="myfiles.php"><i class="fa fa-archive"></i> <span>Mis archivos</span></a>
                </li>

                <li class="<?php if(isset($active3)){echo $active3;}?>">
                    <a href="shared.php"><i class="fa fa-globe"></i> <span>Compartidos conmigo</span></a>
                </li>

                <li class="<?php if(isset($active4)){echo $active4;}?>">
                    <a href="newfolder.php"><i class="fa fa-folder"></i> <span>Nueva carpeta</span></a>
                </li>

                <li class="<?php if(isset($active5)){echo $active5;}?>">
                    <a href="newfile.php"><i class="fa fa-upload"></i> <span>Nuevo Archivo</span></a>
                </li>

                <li class="<?php if(isset($active5)){echo $active5;}?>">
                    <a href="Eventos.php"><i class="fa fas fa-bullhorn"></i> <span>Programar Evento</span></a>
                </li>

                <li class="<?php if(isset($active5)){echo $active5;}?>">
                    <a href="ListaEventos.php"><i class="fa far fa-calendar"></i> <span> Eventos</span></a>
                </li>



            </ul>
        </section><!-- /.sidebar -->
    </aside>
