<?php
//session_start();

if (isset($_SESSION['ss_mb_name']) == false)
	exit;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ohui mall - Admin</title>
	<!-- jQuery Version 1.11.0 -->
	<script src="js/jquery-1.11.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="daily_influx_count.php">Ohui mall - Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['ss_mb_name']?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a  href="admin_exec.php?exec=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
          <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li class="active">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Daily Count<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                  <li>
                    <a href="daily_influx_count.php">일자별 매체 유입자 수</a>
                  </li>
                  <li>
                    <a href="daily_buyer_count.php">일자별 마음 구매자 수</a>
                  </li>                                   
                  <li>
                    <a href="daily_share_count.php">일자별 SNS 공유 수</a>
                  </li> 
                </ul>
              </li>
              <li>
                <a href="buyer_list.php"><i class="fa fa-fw fa-table"></i> 이벤트 참여자 목록</a>
              </li>
              <li>
                <a href="winner_list.php"><i class="fa fa-fw fa-table"></i> 이벤트 당첨자 목록</a>
              </li>
              <li>
                <a href="goods_info.php"><i class="fa fa-fw fa-edit"></i> 상품별 당첨 정보</a>
              </li>
              <li>
                <a href="share_media_count.php"><i class="fa fa-fw fa-bar-chart-o"></i> 공유 정보</a>
              </li>
            </ul>
          </div>
        <!-- /.navbar-collapse -->
        </nav>