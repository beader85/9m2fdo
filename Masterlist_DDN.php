<?php require_once('Connections/Database.php'); ?>
<?php require_once('Connections/Database.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_UsernamePassword = "-1";
if (isset($_GET['username'])) {
  $colname_UsernamePassword = $_GET['username'];
}

$colname_Password = "-1";
if (isset($_GET['password'])) {
  $colname_Password = $_GET['password'];
}

$colname_UsernamePassword = "-1";
if (isset($_GET['username'])) {
  $colname_UsernamePassword = $_GET['username'];
}

$colname_Password = "-1";
if (isset($_GET['password'])) {
  $colname_Password = $_GET['password'];
}
mysql_select_db($database_Database, $Database);
$query_UsernamePassword = sprintf("SELECT * FROM usernamepassword WHERE Username = %s and Password =  $colname_Password", GetSQLValueString($colname_UsernamePassword, "text"));
$UsernamePassword = mysql_query($query_UsernamePassword, $Database) or die(mysql_error());
$row_UsernamePassword = mysql_fetch_assoc($UsernamePassword);
$totalRows_UsernamePassword = mysql_num_rows($UsernamePassword);

mysql_select_db($database_Database, $Database);
$query_ddn = "SELECT * FROM ddn";
$ddn = mysql_query($query_ddn, $Database) or die(mysql_error());
$row_ddn = mysql_fetch_assoc($ddn);
$totalRows_ddn = mysql_num_rows($ddn);

$queryString_ddn = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ddn") == false && 
        stristr($param, "totalRows_ddn") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ddn = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ddn = sprintf("&totalRows_ddn=%d%s", $totalRows_ddn, $queryString_ddn);




?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMiT | Service Migration TM | Main Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- Datatables style -->
  <link rel="stylesheet" href="dist/css/datatables.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

<link href="css/fixed_table_rc.css" type="text/css" rel="stylesheet" media="all" />
	<script src="https://code.jquery.com/jquery.min.js" type="text/javascript"></script>
	<script src="https://meetselva.github.io/fixed-table-rows-cols/js/sortable_table.js" type="text/javascript"></script>
	<script src="js/fixed_table_rc.js" type="text/javascript"></script>
	
	<script>
	$(function () {
		$('#fixed_hdr1').fxdHdrCol({
			fixedCols: 3,
			width:     '100%',
			height:    400,
			colModal: [
			   { width: 50, align: 'center' },
			   { width: 110, align: 'center' },
			   { width: 170, align: 'left' },
			   { width: 250, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 70, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 100, align: 'center' },
			   { width: 90, align: 'left' },
			   { width: 400, align: 'left' }
			]					
		});
		
		$('#fixed_hdr2').fxdHdrCol({
			fixedCols: 0,
			width: "100%",
			height: 400,
			colModal: [
			{ width: 50, align: 'center' },
			{ width: 110, align: 'center' },
			{ width: 170, align: 'left' },
			{ width: 250, align: 'left' },
			{ width: 100, align: 'left' },
			{ width: 70, align: 'left' },
			{ width: 100, align: 'left' },
			{ width: 100, align: 'center' },
			{ width: 90, align: 'left' },
			{ width: 400, align: 'left' }
			],
			sort: true
		});
		$('#fixed_hdr3').fxdHdrCol({
			fixedCols: 0,
			width: "100%",
			height: 200,
			colModal: [{width: 30, align: 'center'},
			{width: 90, align: 'center'},
			{width: 200, align: 'left'},
			{width: 100, align: 'center'},
			{width: 70, align: 'center'},
			{width: 250, align: 'center'}
			]
		});
		
		$('#fixed_hdr_test28').fxdHdrCol({
		    fixedCols: 4,
		    width: 700,
		    height: 300,
		    colModal: [
		      { width: 50, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }, 
		      { width: 70, align: 'center' }
		    ],
		    sort: false
		  })
	});
	</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SMi</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Service</b>MigrationTM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
      <span class="sr-only">Toggle navigation</span><a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
  
    <?php echo $row_UsernamePassword['Display']; ?>
     
      </a>
    </nav>
 
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
 
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="active">
         <a href="#">
            <i class="fa fa-dashboard"></i> <span>Main Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>LOBs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-star-half-o"></i> TM One</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-star-half-o"></i> TM unifi</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-star-half-o"></i> TM Global</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-star-half-o"></i> TM Internal</a></li>
            <li></li>
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li> -->
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span> -->
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>SMM Internal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
           <li class="treeview">
          <a href="#">
            <i class="fa fa-star-half-o"></i>
            <span>Masterlist</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-half-o"></i>DDN</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-half-o"></i>VSAT</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-half-o"></i>SILICA</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-half-o"></i>ATM</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-half-o"></i>BRI</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-half-o"></i>PRI</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-half-o"></i>CDMA</a></li>
            <li></li>
          </ul>
         
        </li>
            
            <li><a href="pages/charts/flot.html"><i class="fa fa-star-half-o"></i> Masterlist Query</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-star-half-o"></i> TM Global</a></li>
            
            
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li> -->
        <!-- <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
        <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Masterlist DDN<!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Main Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <table class="table table-striped" id="dt">
          <thead>
            <tr>
              <th scope="col">BAU Cct ID             </th>
                <th scope="col">Final Reported 2018    </th>
                <th scope="col">Final Reported Jan 2019</th>
                <th scope="col">Final Reported Feb 2019</th>
                <th scope="col">Final Reported Mar 2019</th>
                <th scope="col">Ongoing April 2019     </th>
                <th scope="col">Compare                </th>
                <th scope="col">ORDER NUMBER           </th>
                <th scope="col">NOVA SERVICE NO        </th>
                <th scope="col">DCSP NOVA SERVICE NO   </th>
                <th scope="col">TMN LEG A              </th>
                <th scope="col">STATE A                </th>
                <th scope="col">PTT A                  </th>
                <th scope="col">TMN LEG B              </th>
                <th scope="col">STATE B                </th>
                <th scope="col">PTT B                  </th>
                <th scope="col">CUSTOMER               </th>
                <th scope="col">GROUP NAME             </th>
                <th scope="col">PIC                    </th>
                <th scope="col">SPORTS TOTO CASE       </th>
                <th scope="col">SERVICE CONNECT DATE   </th>
                <th scope="col">CONTRACT START DATE    </th>
                <th scope="col">CONTRACT EXPIRY DATE   </th>
                <th scope="col">SEGMENT                </th>
                <th scope="col">LOB                    </th>
                <th scope="col">SPEED KBPS             </th>
                <th scope="col">PRODUCT                </th>
                <th scope="col">SLA/SLG edit           </th>
                <th scope="col">ALTERNATIVE PRODUCT    </th>
                <th scope="col">Cab need EFM card      </th>
                <th scope="col">Infra A                </th>
                <th scope="col">IPMSAN A               </th>
                <th scope="col">Infra B                </th>
                <th scope="col">Copper DP              </th>
                <th scope="col">FDP                    </th>
                <th scope="col">copper mining          </th>
                <th scope="col">IPMSAN B               </th>
                <th scope="col">Can offer EFM          </th>
                <th scope="col">Total port             </th>
                <th scope="col">Available port         </th>
                <th scope="col">Address A              </th>
                <th scope="col">Address B              </th>
                <th scope="col">NRP Exist              </th>
                <th scope="col">NRP for                </th>
                <th scope="col">Churn/NI to            </th>
                <th scope="col">E/T                    </th>
                <th scope="col">Project Info           </th>
                <th scope="col">PROJECT                </th>
                <th scope="col">DETAIL PROJECT         </th>
            </tr>
          </thead>
          <tbody>
            <?php do { ?>
            <tr>
              <th scope="row"><?php echo $row_ddn['BAU Cct ID']; ?></th>
              <td><?php echo $row_ddn['Final Reported 2018']; ?></td>                  
              <td><?php echo $row_ddn['Final Reported Jan 2019']; ?></td>
              <td><?php echo $row_ddn['Final Reported Feb 2019']; ?></td>
              <td><?php echo $row_ddn['Final Reported Mar 2019']; ?></td>
              <td><?php echo $row_ddn['Ongoing April 2019']; ?></td>
              <td><?php echo $row_ddn['Compare']; ?></td>
              <td><?php echo $row_ddn['ORDER NUMBER']; ?></td>
              <td><?php echo $row_ddn['NOVA SERVICE NO']; ?></td>
              <td><?php echo $row_ddn['DCSP NOVA SERVICE NO']; ?></td>
              <td><?php echo $row_ddn['TMN LEG A']; ?></td>
              <td><?php echo $row_ddn['STATE A']; ?></td>
              <td><?php echo $row_ddn['PTT A']; ?></td>
              <td><?php echo $row_ddn['TMN LEG B']; ?></td>
              <td><?php echo $row_ddn['STATE B']; ?></td>
              <td><?php echo $row_ddn['PTT B']; ?></td>
              <td><?php echo $row_ddn['CUSTOMER']; ?></td>
              <td><?php echo $row_ddn['GROUP NAME']; ?></td>
              <td><?php echo $row_ddn['PIC']; ?></td>
              <td><?php echo $row_ddn['SPORTS TOTO CASE']; ?></td>
              <td><?php echo $row_ddn['SERVICE CONNECT DATE']; ?></td>
              <td><?php echo $row_ddn['CONTRACT START DATE']; ?></td>
              <td><?php echo $row_ddn['CONTRACT EXPIRY DATE']; ?></td>
              <td><?php echo $row_ddn['SEGMENT']; ?></td>
              <td><?php echo $row_ddn['LOB']; ?></td>
              <td><?php echo $row_ddn['SPEED KBPS']; ?></td>
              <td><?php echo $row_ddn['PRODUCT']; ?></td>
              <td><?php echo $row_ddn['SLA/SLG edit']; ?></td>
              <td><?php echo $row_ddn['ALTERNATIVE PRODUCT']; ?></td>
              <td><?php echo $row_ddn['Cab need EFM card']; ?></td>
              <td><?php echo $row_ddn['Infra A']; ?></td>
              <td><?php echo $row_ddn['IPMSAN A']; ?></td>
              <td><?php echo $row_ddn['Infra B']; ?></td>
              <td><?php echo $row_ddn['Copper DP']; ?></td>
              <td><?php echo $row_ddn['FDP']; ?></td>
              <td><?php echo $row_ddn['copper mining']; ?></td>
              <td><?php echo $row_ddn['IPMSAN B']; ?></td>
              <td><?php echo $row_ddn['Can offer EFM']; ?></td>
              <td><?php echo $row_ddn['Total port']; ?></td>
              <td><?php echo $row_ddn['Available port']; ?></td>
              <td><?php echo $row_ddn['Address A']; ?></td>
              <td><?php echo $row_ddn['Address B']; ?></td>
              <td><?php echo $row_ddn['NRP Exist']; ?></td>
              <td><?php echo $row_ddn['NRP for']; ?></td>
              <td><?php echo $row_ddn['Churn/NI to']; ?></td>
              <td><?php echo $row_ddn['E/T']; ?></td>
              <td><?php echo $row_ddn['Project Info']; ?></td>
              <td><?php echo $row_ddn['PROJECT']; ?></td>
              <td><?php echo $row_ddn['DETAIL PROJECT']; ?></td>
              <td><?php echo $row_ddn['SPECIAL CASE']; ?></td>
              

            </tr>
            <?php } while ($row_ddn = mysql_fetch_assoc($ddn)); ?></td>
          </tbody>
        </table>
	</section>
  </div>
</div>
	
       <p>&nbsp;</p>
    </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
    <-- Create the tabs --
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <-- Tab panes --
    <div class="tab-content">
      <-- Home tab content --
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <-- /.control-sidebar-menu --

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <-- /.control-sidebar-menu --

      </div>
      <-- /.tab-pane --
      <-- Stats tab content --
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <-- /.tab-pane --
      <-- Settings tab content --
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <-- /.form-group --

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <-- /.form-group --

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <-- /.form-group --

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <-- /.form-group --

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <-- /.form-group --

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <-- /.form-group --
        </form>
      </div>
      <-- /.tab-pane --
    </div>
  </aside> -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/datatables.js"></script>
<script>
  $('#dt').DataTable();
</script>



});




</script>
</body>
</html>
<?php
mysql_free_result($UsernamePassword);

mysql_free_result($ddn);
?>
