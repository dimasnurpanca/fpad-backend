<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else{
require "../include/db.php";
date_default_timezone_set('Asia/Jakarta');
//Get List Story
$nomor=1;
$list_story= array();
$sql = "SELECT * FROM stories WHERE status!='' ORDER BY date DESC";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $user_email = $row['user_email'];
    $kategori_id = $row['kategori_id'];
    $title = $row['title'];
    $description = $row['description'];
    $content = $row['content'];
    $date = $row['date'];
    $date = new DateTime('@'.$date, new DateTimeZone('Asia/Jakarta'));
    $date = $date->format('M j');
    $last_update = $row['last_update'];
    if($last_update!=''){
    $last_update = new DateTime('@'.$last_update, new DateTimeZone('Asia/Jakarta'));
    $last_update = $last_update->format('M j');
    }else{
        $last_update ='';
    }

    $status = $row['status'];
	$list_story[] = array(
      'id' => $id,
      'user_email' => $user_email,
      'kategori_id' => $kategori_id,
      'title' => $title,
      'description' => $description,
      'content' => $content,
      'date' => $date,
      'last_update' => $last_update,
      'status' => $status,
      'nomor' => $nomor
  );
  $nomor++;
    }
}
//Get List Story

if($_GET['acc']){

$id = $conn->real_escape_string($_GET['acc']);
$sql = "UPDATE `stories` SET `status`='Approved' WHERE id=$id";
$result = $conn->query($sql);
echo "<script>alert('Berhasil di Approved!')</script>";
echo "<script>window.open('story.php','_self')</script>";
}
else if($_GET['nonaktifkan']){
  $id = $conn->real_escape_string($_GET['nonaktifkan']);
  $sql = "UPDATE `stories` SET `status`='' WHERE id=$id";
  $result = $conn->query($sql);
  echo "<script>alert('Berhasil di Nonaktifkan!')</script>";
  echo "<script>window.open('story.php','_self')</script>";

}
else if($_GET['notif']){
  $id = $conn->real_escape_string($_GET['notif']);
  $title = $_GET['title'];

  notification($title,$id);

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
			  $menubar='story';
			  include("menu.php"); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Story</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Story
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                          <thead>
                                                              <tr>
                                                                  <th>No</th>
                                                                  <th>ID Story</th>
                                                                  <th>ID Kategori</th>
                                                                  <th>Creator</th>
                                                                  <th>Ttitle</th>
                                                                  <th>Description</th>
                                                                  <th>Date</th>
                                                                  <th>Last Update</th>
                                                                  <th>Status</th>
                                                                  <th>Action</th>
                                                                  <th>Notifikasi</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                              <?php foreach($list_story as $s){ ?>
                                                    <tr>
                                                          <td><?php echo $s['nomor']; ?></td>
                                                          <td><?php echo $s['id']; ?></td>
                                                          <td><?php echo $s['kategori_id']; ?></td>
                                                          <td><?php echo $s['user_email']; ?></td>
                                                          <td><?php echo $s['title']; ?></td>
                                                          <td><?php echo $s['description']; ?></td>
                                                          <td><?php echo $s['date']; ?></td>
                                                          <td><?php echo $s['last_update']; ?></td>
                                                          <td><?php echo $s['status']; ?></td>
                                                          <td align="center"><?php echo "<a href='story-details.php?id=".$s['id']."' class='btn btn-success'>View</a>";?></td>
                                                          <td align="center"><?php if($s['status']=='Approved'){ echo "<a href='story.php?notif=".$s['id']."'&title=".$s['title']."' class='btn btn-success'>Kirim Notifikasi</a>"; } ?></td>

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

<?php
function notification($story_name, $story_id){
$msg = array
(
'body' => $story_name,
'title' => 'Story Notification',
'priority' => 'high',
'sound' => 'default',
'time_to_live' => 3600
);

 $data = array
    (
         "story_id" => $story_id
    );

$fields = array('to' => '/topics/fpad', 'notification' => $msg, 'data' => $data);

$headers = array
(
'Authorization: key=AAAAy61DsVU:APA91bFU3nmd5fWeZx4EVqENaRKHiUbjHRQxX2ZZhPt6t5_3iJTO2l2348zV_QdmpvyK2AgVjjhCKJAPz5JTfMluaBF7UWR7cB6Qahy8FaEXaE4Sxf1dtL-LrxgcWMoSBejeUdvFtBEM',
'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
curl_close($ch);

echo "<script>alert('Berhasil Mengirim Notifikasi!')</script>";
echo "<script>window.open('story.php','_self')</script>";
}

?>
