<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else{
require "../include/db.php";


//Get Hot Rising New
$sql = "SELECT * FROM stories_settings WHERE id=1";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $total_hot = $row['hot'];
    $total_rising = $row['rising'];
    }
}
//Get Hot Rising New

if(isset($_POST['simpan'])){
require_once "../include/db.php";
$hot = $_POST['hot'];
$rising = $_POST['rising'];

$update = "UPDATE `stories_settings` SET `hot`='$hot',`rising`='$rising' WHERE id=1";

if($rising>=$hot){
  echo "<script>alert('Nilai rising tidak boleh lebih besar dibanding nilai hot!')</script>";
   echo "<script>window.open('setting.php','_self')</script>";
}else{
if ($conn->query($update) === TRUE) {
   echo "<script>alert('Setting Stories berhasil disimpan!')</script>";
		echo "<script>window.open('setting.php','_self')</script>";
} else {
    echo "Error updating record: " . $conn->error;
	  echo "<script>alert('Setting Stories tidak berhasil disimpan!')</script>";
		echo "<script>window.open('setting.php','_self')</script>";
}
}

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
			  $menubar='setting';
			  include("menu.php"); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stories Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Setting Hot & Rising
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="#" method="post">
                                        <div class="form-group">
                                            <label>Hot</label>
                                            <input class="form-control" type="number" name="hot" placeholder="default : 50" min="1" value="<?php echo $total_hot; ?>">
                                            <p class="help-block">Nilai ini harus lebih tinggi dibanding Rising.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Rising</label>
                                            <input class="form-control" type="number" name="rising" placeholder="default : 10" min="0" value="<?php echo $total_rising; ?>">
                                            <p class="help-block">Nilai ini harus lebih rendah dibanding Hot.</p>
                                        </div>
                                        <input class="btn btn-default" type="submit" name="simpan" value="Simpan">
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


    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
