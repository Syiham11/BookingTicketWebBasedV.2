<?php
include "../inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon"  href="../images/logo.jpg"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script language='javascript' >
        var txt=' Selamat Datang di Website Primajasa *****';
        var speed=300;var refresh=null;function move() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresh=setTimeout("move()",speed);}move();
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../images/primajasa.jpg" alt="" width="250" height="200" class="navbar-brand">
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        <li class="utama">
                            <a href="../inc/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-desktop"></i> Home</a>
                    </li>
                    <li>
                        <a href="datauser.php"><i class="fa fa-fw fa-edit"></i> Data User </a>
                    </li>
                    <li>
                        <a href="datasupir.php"><i class="fa fa-fw fa-edit"></i> Data Supir </a>
                    </li>
                    <li class="active">
                        <a href="datapegawai.php"><i class="fa fa-fw fa-edit"></i> Data Kondektur </a>
                    </li>
                    <li>
                        <a href="datajadwal.php"><i class="fa fa-fw fa-edit"></i> Data Jadwal </a>
                    </li>
                    <li>
                        <a href="datalokasi.php"><i class="fa fa-fw fa-edit"></i> Data Lokasi </a>
                    </li>
                    <li>
                        <a href="datakendaraan.php"><i class="fa fa-fw fa-edit"></i> Data Kendaraan </a>
                    </li>
                    <li>
                        <a href="datakursi.php"><i class="fa fa-fw fa-edit"></i> Data Kursi </a>
                    </li>
                    <li>
                        <a href="databookinguser.php"><i class="fa fa-fw fa-edit"></i> Data Booking Non Member </a>
                    </li>
                    <li>
                        <a href="databookingmember.php"><i class="fa fa-fw fa-edit"></i> Data Booking Member </a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Pegawai
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class=""></i> Menu
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Data Pegawai
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                    
                    <?php
                        $id = @$_POST['id'];
                        $id = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($id<>"")){
                            $sql_delete = "delete from tb_pegawai where id='$id'" or die (mysqli_error());
                            $delete = mysqli_query($con, $sql_delete);
                            echo "<script type=text/javascript>window.location.href='http://r-fauzi.xyz/admin/datapegawai.php';</script>" ;
                        }
                        ?>

  
                    <div class="jumbotron">
                    <fieldset>
                        <form action="" method="post" role="form">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <tr style="background-color:#fc0;">
                                <th>Id</th>
                                <th>Nama Pegawai</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                            <?php
                            $sql = "select * from tb_pegawai" or die (mysqli_error());
                            $datauser = mysqli_query($con, $sql); 
                            while($data = mysqli_fetch_array($datauser)) {        
                            ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['nohp']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['confirmed']; ?></td>
                                <td align="center">
                                <a  href="editpegawai.php?id=<?php echo $data['id']; ?>" class="btn btn-xs btn-default" title="Edit" ><i class="fa fa-edit fa-fw"></i></a>
                                <a onclick="return confirm('Anda yakin akan menghapus');" href="datapegawai.php?id=<?php echo $data['id']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus"><i class="fa fa-times fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </table>
                            </form>
                            </fieldset>
                            </div>


                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <p><font face="Time New Roman" color="#000000"><center>Copyright ©2016 Primajasa All Rights Reserved </center></font></p>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>