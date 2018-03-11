<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else{
require "../include/db.php";
//Get List Kategori
$nomor=1;
$list_kategori= array();
$sql = "SELECT * FROM kategori";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $nama_kategori = $row['nama_kategori'];
	$list_kategori[] = array(
      'id' => $id,
      'nama_kategori' => $nama_kategori,
      'nomor' => $nomor
  );
  $nomor++;
    }
}
//Get List Kategori

if(isset($_POST['tambah'])){
$nama_kategori = $_POST['nama_kategori'];

$update = "INSERT INTO `kategori`(`nama_kategori`) VALUES ('$nama_kategori')";

if ($conn->query($update) === TRUE) {
   echo "<script>alert('Kategori berhasil ditambahkan!')</script>";
		echo "<script>window.open('kategori.php','_self')</script>";
} else {
    echo "Error updating record: " . $conn->error;
	  echo "<script>alert('Kategori tidak berhasil ditambahkan!')</script>";
		echo "<script>window.open('kategori.php','_self')</script>";
}

}else if($_GET['del']){

$del = $conn->real_escape_string($_GET['del']);
$sql = "DELETE FROM `kategori` WHERE id=$del";
$result = $conn->query($sql);
echo "<script>alert('Berhasil dihapus!')</script>";
echo "<script>window.open('kategori.php','_self')</script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hugaf.com">

    <title>Backend</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
       <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

       <!-- DataTables Responsive CSS -->
       <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Backend</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">



                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php
			  $menubar='kategori';
			  include("menu.php"); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kategori</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Kategori
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                          <thead>
                                                              <tr>
                                                                  <th>No</th>
                                                                  <th>ID Kategori</th>
                                                                  <th>Nama Kategori</th>
                                                                  <th>Action</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                              <?php foreach($list_kategori as $s){ ?>
                                                    <tr>
                                                          <td><?php echo $s['nomor']; ?></td>
                                                          <td><?php echo $s['id']; ?></td>
                                                          <td><?php echo $s['nama_kategori']; ?></td>
                                                          <td align="center"><?php echo "<a href='kategori-edit.php?id=".$s['id']."' class='btn btn-warning' style='margin-right:20px;'>Edit</a>";?><?php echo "<a href='kategori.php?del=".$s['id']."' class='btn btn-warning'>Hapus</a>"; ?></td>

                                                    </tr>
                              <?php } ?>


                                                          </tbody>
                                                      </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="row">
                  <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tambah Kategori
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form role="form" action="#" method="post">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input class="form-control" type="text" name="nama_kategori" placeholder="nama kategori" required>

                                            </div>

                                            <input class="btn btn-default" type="submit" name="tambah" value="Tambahkan">
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
            </div>


            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
       <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
       <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
       <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
