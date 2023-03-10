<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets2/images/icons/favicon.png">

    <title>TS </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="<?=base_url()?>assets-dark/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?=base_url()?>css-dark/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>css-dark/master_style.css">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="<?=base_url()?>css-dark/skins/_all-skins.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="<?=base_url()?>images-dark/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="<?=base_url()?>images-dark/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="<?=base_url()?>images-dark/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="<?=base_url()?>images-dark/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		  <li class="search-box">
            <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
            <form class="app-search" style="display: none;">
                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
			</form>
          </li>			
		  
          <!-- Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-email"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 5 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>images-dark/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Lorem Ipsum
                          <small><i class="fa fa-clock-o"></i> 15 mins</small>
                         </h4>
                         <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>images-dark/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Nullam tempor
                          <small><i class="fa fa-clock-o"></i> 4 hours</small>
                         </h4>
                         <span>Curabitur facilisis erat quis metus congue viverra.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>images-dark/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Proin venenatis
                          <small><i class="fa fa-clock-o"></i> Today</small>
                         </h4>
                         <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>images-dark/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Praesent suscipit
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                         </h4>
                         <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url()?>images-dark/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Donec tempor
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                         </h4>
                         <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See all e-Mails</a></li>
            </ul>
          </li>
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 7 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-message"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 6 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Lorem ipsum dolor sit amet
                        <small class="pull-right">30%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">30% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Vestibulum nec ligula
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Donec id leo ut ipsum
                        <small class="pull-right">70%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">70% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Praesent vitae tellus
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Nam varius sapien
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Nunc fringilla
                        <small class="pull-right">90%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">90% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>images-dark/user5-128x128.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>images-dark/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image">

                <p>
                  Romi Roy
                  <small class="mb-5">jb@gmail.com</small>
                  <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-person"></i> My Profile</a>
                  </div>
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-email-unread"></i> Inbox</a>
                  </div>
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-settings"></i> Setting</a>
                  </div>
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="#"><i class="ti-settings"></i> Account Setting</a>
                  </div>
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="#"><i class="fa fa-power-off"></i> Logout</a>
                  </div>				
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="index.html">
			  <!-- logo for regular state and mobile devices -->
			  <span><b>Crypto </b>Admin</span>
			</a>
		</div>
        <div class="image">
          <img src="<?=base_url()?>images-dark/user2-160x160.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
          <p>Admin Template</p>
			<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ion ion-gear-b"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ion ion-android-mail"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        </div>
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="nav-devider"></li>
        <li class="header nav-small-cap">PERSONAL</li>
        <li>
          <a href="<?=base_url()?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="icon-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>">Transactions</a></li>
            <li><a href="#">Top Gainers/Losers</a></li>
            <li><a href="#">Market Capitalizations</a></li>
            <li><a href="#">Crypto Stats</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="icon-compass"></i>
            <span>Initial Coin Offering</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Countdown</a></li>
            <li><a href="#">Roadmap/Timeline</a></li>
            <li><a href="#">Progress Bar</a></li>
            <li><a href="#">Details</a></li>
            <li><a href="#">ICO Listing</a></li>
            <li><a href="#">ICO Listing - Filters</a></li>			  
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="icon-refresh"></i> <span>Currency Exchange</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="icon-people"></i>
            <span>Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Members Grid</a></li>
            <li><a href="#">Members List</a></li>
            <li><a href="#">Member Profile</a></li>			  
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="icon-equalizer"></i>
            <span>Tickers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Ticker</a></li>
            <li><a href="#">Live Crypto Prices</a></li>		  
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="icon-wallet"></i>
            <span>Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Transactions Tables</a></li>
            <li><a href="#">Transactions Search</a></li>	
            <li><a href="#">Single Transaction</a></li>
            <li><a href="#">Transactions Counter</a></li>	  
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="icon-graph"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="chartjs.html">ChartJS</a></li>
            <li class="active"><a href="flot.html">Flot</a></li>
            <li><a href="inline.html">Inline charts</a></li>
            <li><a href="morris.html">Morris</a></li>
            <li><a href="peity.html">Peity</a></li>
            <li><a href="chartist.html">Chartist</a></li>
            <li><a href="rickshaw-charts.html">Rickshaw Charts</a></li>
            <li><a href="nvd3-charts.html">NVD3 Charts</a></li>
			<li><a href="echart.html">eChart</a></li>
			<li><a href="../amcharts/amcharts.html">amCharts Charts</a></li>
			<li><a href="../amcharts/amstock-charts.html">amCharts Stock Charts</a></li>
			<li><a href="../amcharts/ammaps.html">amCharts Maps</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>App</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../app/app-chat.html">Chat app</a></li>
            <li><a href="../app/project-table.html">Project</a></li>
            <li><a href="../app/app-contact.html">Contact / Employee</a></li>
            <li><a href="../app/app-ticket.html">Support Ticket</a></li>
			<li><a href="../app/calendar.html">Calendar</a></li>
            <li><a href="../app/profile.html">Profile</a></li>
            <li><a href="../app/userlist-grid.html">Userlist Grid</a></li>
			<li><a href="../app/userlist.html">Userlist</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../mailbox/mailbox.html">Inbox</a></li>
            <li><a href="../mailbox/compose.html">Compose</a></li>
            <li><a href="../mailbox/read-mail.html">Read</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/badges.html">Badges</a></li>
            <li><a href="../UI/border-utilities.html">Border</a></li>
            <li><a href="../UI/buttons.html">Buttons</a></li>
            <li><a href="../UI/bootstrap-switch.html">Bootstrap Switch</a></li>
            <li><a href="../UI/cards.html">User Card</a></li>
            <li><a href="../UI/color-utilities.html">Color</a></li>
			<li><a href="../UI/date-paginator.html">Date Paginator</a></li>
            <li><a href="../UI/dropdown.html">Dropdown</a></li>
            <li><a href="../UI/dropdown-grid.html">Dropdown Grid</a></li>
            <li><a href="../UI/general.html">General</a></li>
            <li><a href="../UI/icons.html">Icons</a></li>
            <li><a href="../UI/media-advanced.html">Advanced Medias</a></li>
			<li><a href="../UI/modals.html">Modals</a></li>
            <li><a href="../UI/nestable.html">Nestable</a></li>
            <li><a href="../UI/notification.html">Notification</a></li>
            <li><a href="../UI/portlet-draggable.html">Draggable Portlets</a></li>
            <li><a href="../UI/ribbons.html">Ribbons</a></li>
            <li><a href="../UI/sliders.html">Sliders</a></li>
            <li><a href="../UI/sweatalert.html">Sweet Alert</a></li>
            <li><a href="../UI/tab.html">Tabs</a></li>
            <li><a href="../UI/timeline.html">Timeline</a></li>
            <li><a href="../UI/timeline-horizontal.html">Horizontal Timeline</a></li>			  
          </ul>
        </li>
        <li class="header nav-small-cap">FORMS, TABLE & LAYOUTS</li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Widgets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../widgets/blog.html">Blog</a></li>
            <li><a href="../widgets/chart.html">Chart</a></li>
            <li><a href="../widgets/list.html">List</a></li>
            <li><a href="../widgets/social.html">Social</a></li>
            <li><a href="../widgets/statistic.html">Statistic</a></li>
            <li><a href="../widgets/tiles.html">Tiles</a></li>
            <li><a href="../widgets/weather.html">Weather</a></li>
            <li><a href="../widgets/widgets.html">Widgets</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../layout/boxed.html">Boxed</a></li>
            <li><a href="../layout/fixed.html">Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html">Collapsed Sidebar</a></li>
          </ul>
        </li>		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-square-o"></i>
            <span>Box</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../box/advanced.html">Advanced</a></li>
            <li><a href="../box/basic.html">Boxed</a></li>
            <li><a href="../box/color.html">Color</a></li>
			<li><a href="../box/group.html">Group</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/advanced.html">Advanced Elements</a></li>
            <li><a href="../forms/code-editor.html">Code Editor</a></li>
            <li><a href="../forms/editor-markdown.html">Markdown</a></li>
            <li><a href="../forms/editors.html">Editors</a></li>
            <li><a href="../forms/form-validation.html">Form Validation</a></li>
            <li><a href="../forms/form-wizard.html">Form Wizard</a></li>
            <li><a href="../forms/general.html">General Elements</a></li>
            <li><a href="../forms/mask.html">Formatter</a></li>
            <li><a href="../forms/premade.html">Pre-made Forms</a></li>
            <li><a href="../forms/xeditable.html">Xeditable Editor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../tables/simple.html">Simple tables</a></li>
            <li><a href="../tables/data.html">Data tables</a></li>
            <li><a href="../tables/editable-tables.html">Editable Tables</a></li>
            <li><a href="../tables/table-color.html">Table Color</a></li>
          </ul>

        </li>
		<li>
          <a href="../email/index.html">
            <i class="fa fa-envelope-open-o"></i> <span>Emails</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li class="header nav-small-cap">EXTRA COMPONENTS</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map"></i> <span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../map/map-google.html">Google Map</a></li>
            <li><a href="../map/map-vector.html">Vector Map</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-plug"></i> <span>Extension</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../extension/fullscreen.html">Fullscreen</a></li>
          </ul>
        </li>        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Sample Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../samplepage/blank.html">Blank</a></li>
            <li><a href="../samplepage/coming-soon.html">Coming Soon</a></li>
            <li><a href="../samplepage/custom-scroll.html">Custom Scrolls</a></li>
			<li><a href="../samplepage/faq.html">FAQ</a></li>
			<li><a href="../samplepage/gallery.html">Gallery</a></li>
			<li><a href="../samplepage/invoice.html">Invoice</a></li>
			<li><a href="../samplepage/lightbox.html">Lightbox Popup</a></li>
			<li><a href="../samplepage/pace.html">Pace</a></li>
			<li><a href="../samplepage/pricing.html">Pricing</a></li>
            <li class="treeview">
              <a href="#">Authentication 
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../samplepage/login.html">Login</a></li>
                <li><a href="../samplepage/register.html">Register</a></li>
                <li><a href="../samplepage/lockscreen.html">Lockscreen</a></li>
                <li><a href="../samplepage/user-pass.html">Recover password</a></li>				  
              </ul>
            </li>            
			<li class="treeview">
              <a href="#">Error Pages 
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="../samplepage/404.html">404</a></li>
                <li><a href="../samplepage/500.html">500</a></li>
                <li><a href="../samplepage/maintenance.html">Maintenance</a></li>		  
              </ul>
            </li> 
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>        
        
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$dd_evento->evento?>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Charts</a></li>
        <li class="breadcrumb-item active">Flot</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-lg-3 col-md-6">
          <div class="box pull-up">
          <div class="box-body">
            <div class="media align-items-center p-0">
            <div class="text-center">
              <a href="#"><i class="cc BTC mr-5" title="BTC"></i></a>
            </div>
            <div>
              <h3 class="no-margin text-bold">Bitcoin BTC</h3>
            </div>
            </div>
            <div class="flexbox align-items-center mt-5">
            <div>
              <p class="no-margin font-weight-600"><span class="text-yellow">0.00000434 </span>BTC<span class="text-info">$0.04</span></p>
            </div>
            <div class="text-right">
              <p class="no-margin font-weight-600"><span class="text-success">+1.35%</span></p>
            </div>
            </div>
        </div>
        <div class="box-footer p-0 no-border">
          <div class="chart"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><canvas id="chartjs1" class="h-80" style="display: block; width: 232px; height: 80px;" width="232" height="80"></canvas></div>
        </div>
       </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="box pull-up">
          <div class="box-body">
            <div class="media align-items-center p-0">
            <div class="text-center">
              <a href="#"><i class="cc LTC mr-5" title="LTC"></i></a>
            </div>
            <div>
              <h3 class="no-margin text-bold">Litecoin LTC</h3>
            </div>
            </div>
            <div class="flexbox align-items-center mt-5">
            <div>
              <p class="no-margin font-weight-600"><span class="text-yellow">0.00000434 </span>LTC<span class="text-info">$0.04</span></p>
            </div>
            <div class="text-right">
              <p class="no-margin font-weight-600"><span class="text-danger">-1.35%</span></p>
            </div>
            </div>
        </div>
        <div class="box-footer p-0 no-border">
          <div class="chart"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><canvas id="chartjs2" class="h-80" style="display: block; width: 232px; height: 80px;" width="232" height="80"></canvas></div>
        </div>
       </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="box pull-up">
          <div class="box-body">
            <div class="media align-items-center p-0">
            <div class="text-center">
              <a href="#"><i class="cc NEO mr-5" title="NEO"></i></a>
            </div>
            <div>
              <h3 class="no-margin text-bold">Neo NEO</h3>
            </div>
            </div>
            <div class="flexbox align-items-center mt-5">
            <div>
              <p class="no-margin font-weight-600"><span class="text-yellow">0.00000434 </span>NEO<span class="text-info">$0.04</span></p>
            </div>
            <div class="text-right">
              <p class="no-margin font-weight-600"><span class="text-danger">-1.35%</span></p>
            </div>
            </div>
        </div>
        <div class="box-footer p-0 no-border">
          <div class="chart"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><canvas id="chartjs3" class="h-80" style="display: block; width: 232px; height: 80px;" width="232" height="80"></canvas></div>
        </div>
       </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="box pull-up">
          <div class="box-body">
            <div class="media align-items-center p-0">
            <div class="text-center">
              <a href="#"><i class="cc DASH mr-5" title="DASH"></i></a>
            </div>
            <div>
              <h3 class="no-margin text-bold">Dash DASH</h3>
            </div>
            </div>
            <div class="flexbox align-items-center mt-5">
            <div>
              <p class="no-margin font-weight-600"><span class="text-yellow">0.00000434 </span>DASH<span class="text-info">$0.04</span></p>
            </div>
            <div class="text-right">
              <p class="no-margin font-weight-600"><span class="text-success">+1.35%</span></p>
            </div>
            </div>
        </div>
        <div class="box-footer p-0 no-border">
          <div class="chart"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><canvas id="chartjs4" class="h-80" style="display: block; width: 232px; height: 80px;" width="232" height="80"></canvas></div>
        </div>
       </div>
      </div>
     </div>
    
      <div class="row tb_partidas">
            <div class="col-lg-6 col-12">
              <!-- Default box -->
              <div class="box box-solid bg-dark">
              <div class="box-header with-border">
                <h3 class="box-title">Mercado Back</h3>

                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                  <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered no-margin">
                    <tbody>

    
              <?
              require_once('includes/betapi/jsonrpc-futbol.php'); 
              $APP_KEY = 'qD8D8WZ300PJGjbN';
              foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 
                $marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
                function mostrar($odd, $marketBook,$id_mkt,$id_jogo){
                    $dd_odds = array();
                function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo){
                    // Get selection
                    $f = 0;
                    $ff = 0;
                    foreach ($marketBook->runners as $runner) 
                    if ($runner->selectionId == $selectionId) break;
                      $total_size_back = 0;
                      foreach ($runner->ex->availableToBack as $availableToBack){$f++;
                          $total_size_back += $availableToBack->size; 
                          if($f == 1){
              ?>
                                    
                                      <td>

                                        
                                        <a href="#" title="Soma dos valores correspondidos nas Seleções BACK dividido pela quantidade de seleções BACK" >
                                          <div class="tile-header total_somaback<?=$selectionId?>" >
                                          ¨¨¨¨
                                          </div>
                                         
                                        
                                        <span class="" data-placement="bottom" title="Soma correspondido nos últimos preços em Back">
                                          Back: 
                                          <i class="glyph-icon icon-linecons-money"></i>
                                          <label id="somaback<?=$selectionId?>"><? #=number_format($soma_total_sel_back['soma'], 2, ',', '.')?> </label>
                                        </span>
                                        <input type="hidden" id="sel_<?=$selectionId?>_back" class="somaback<?=$selectionId?> sel_soma_back" value="0" >
                                        </a>


                                      </td>
                                      <td>
                                        <div class="set_odd back" lang="<?=$availableToBack->price;?>" title="<?=$selectionId?>">
                                            <div class="">
                                              BACK
                                            </div>
                                            <div class="">
                                              
                                              <div class="">
                                              
                                              <?
                                              // defini classes dinamicas
                                              $nm_class_last_preco = "last_".$selectionId.'_b';
                                              $nm_class_preco = "p_".$selectionId.'_b';
                                              $nm_class_volume = "v_".$selectionId.'_b';
                                              ?>
                                                
                                                <label class="preco <?=$nm_class_preco?> back" style="font-weight: bold"><?=$availableToBack->price;?></label>
                                              </div>
                                              <small>
                                                <i class=""></i>
                                                <label id="volume" class="<?=$nm_class_volume?> back"><?=$availableToBack->size?></label>
                                              </small>
                                            </div>
                                            <a href="#" class="" data-placement="bottom" title="">
                                              <? #=$total_size_back?>
                                              <? #=$soma_total_sel_back['soma']?>
                                            <!--  Last:
                                              <label class="<?=$nm_class_last_preco?>"></label>
                                              <i class="glyph-icon icon-linecons-tag"></i>
                                            -->
                                            </a>
                                          </div>

                                      </td>
                                      </tr>
                                <? } // x foreach runner ?>
                              <? } // x foreach runner ?>
                         <? } // x if $f == 1 ?>     

                      
     

                            <?
                            foreach ($odd->runners as $runner) {
                          ?>  
                
                                
                
                
                      
                      <? #=print_r($runner)?>
                      <tr>
                      <td><h3 id="sel<?=$runner->selectionId?>" class='tb_partidas title-hero content-box-header' title="<?=$runner->selectionId?>"><?=$runner->runnerName?> <? if($runner->handicap != 0){ echo $runner->handicap; } ?> </h3>
                      <? # if( $runner->$handicap <> '0' ){ echo  $runner->$handicap; } ?>
                       </td>
                    <!--    <table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:black 0px solid;width:100%'> -->
                        <?=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo); ?>
                       <!-- </table>-->
                <? } // x foreach ?>





                 <? } // x mostrar ?>
                 <? $data = mostrar($odd, $marketBook,$id_mkt,$id_jogo); ?>
                 </tbody>
            </table>
              <? } // x foreach ?>

            
        </div>
      
      </div>
      
      <!-- /.box-body -->
      </div>

      <!-- /.box -->
    </div>
    
    <div class="col-lg-6 col-12">
      <!-- Default box -->
      <div class="box box-solid bg-dark">
      <div class="box-header with-border">
        <h3 class="box-title">Market Summary</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
          <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered no-margin">
            <tbody>
              <tr>
                            <td>Market Price</td>
                            <td>$19,234.37</td>
                            <td><a href="#" class="text-yellow hover-warning">View Chart</a></td>
                          </tr>
                          <tr>
                            <td>Trade Volume</td>
                            <td>$345,765,760.27</td>
                            <td><a href="#" class="text-yellow hover-warning">View Chart</a></td>
                          </tr>
                          <tr>
                            <td>Trade Volume</td>
                            <td>213,345.32893873 BTC</td>
                            <td><a href="#" class="text-yellow hover-warning">View Chart</a></td>
                          </tr>
            </tbody>
            </table>
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
    </div>
    
      
      
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- interactive chart -->
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-line-chart"></i>

              <h3 class="box-title">Interactive Area Chart</h3>

              <div class="box-tools pull-right">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default bg-green btn-sm active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default bg-red btn-sm" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div id="interactive100" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-12 col-lg-6">
          <!-- Line chart -->
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-line-chart"></i>

              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

          <!-- Area chart -->
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-area-chart"></i>

              <h3 class="box-title">Full Width Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->

        <div class="col-12 col-lg-6">
          <!-- Bar chart -->
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

          <!-- Donut chart -->
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  
   
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2018 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-cog fa-spin"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be July 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

                <p>New Email : jhone_doe@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

                <p>disha@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Code Change</h4>

                <p>Execution time 15 Days</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Web Design
                <span class="label label-danger pull-right">40%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Data
                <span class="label label-success pull-right">75%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 75%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Order Process
                <span class="label label-warning pull-right">89%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Development 
                <span class="label label-primary pull-right">72%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="report_panel" class="chk-col-grey" >
			<label for="report_panel" class="control-sidebar-subheading ">Report panel usage</label>

            <p>
              general settings information
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="allow_mail" class="chk-col-grey" >
			<label for="allow_mail" class="control-sidebar-subheading ">Mail redirect</label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="expose_author" class="chk-col-grey" >
			<label for="expose_author" class="control-sidebar-subheading ">Expose author name</label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="show_me_online" class="chk-col-grey" >
			<label for="show_me_online" class="control-sidebar-subheading ">Show me as online</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="off_notifications" class="chk-col-grey" >
			<label for="off_notifications" class="control-sidebar-subheading ">Turn off notifications</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">              
              <a href="javascript:void(0)" class="text-red margin-r-5"><i class="fa fa-trash-o"></i></a>
              Delete chat history
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?=base_url()?>assets-dark/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="<?=base_url()?>assets-dark/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="<?=base_url()?>assets-dark/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="<?=base_url()?>assets-dark/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="<?=base_url()?>assets-dark/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- Crypto_Admin App -->
	<script src="<?=base_url()?>js-dark/template.js"></script>
	
	<!-- Crypto_Admin for demo purposes -->
	<script src="<?=base_url()?>js-dark/demo.js"></script>
	
	<!-- FLOT CHARTS -->
	<script src="<?=base_url()?>assets-dark/vendor_components/Flot/jquery.flot.js"></script>
	
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="<?=base_url()?>assets-dark/vendor_components/Flot/jquery.flot.resize.js"></script>
	
	<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
	<script src="<?=base_url()?>assets-dark/vendor_components/Flot/jquery.flot.pie.js"></script>
	
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
	<script src="<?=base_url()?>assets-dark/vendor_components/Flot/jquery.flot.categories.js"></script>
	
	<!-- Crypto_Admin for flot Chart purposes -->
	<script src="<?=base_url()?>js-dark/pages/widget-flot-charts.js"></script>
  

  <!--  NOVOS GRÁFICOS DE VOLUME -->
  <script src="<?=base_url()?>assets-dark/vendor_components/chart.js-master/Chart.min.js"></script>
  <script src="<?=base_url()?>js-dark/pages/chartjs-int.js"></script>

  

<!-- PEGANDO DADOS DO MERCADO -->
<script type="text/javascript">
        $(document).ready(function(){

          //alert("opa 1");
          /*
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
            */
          
    //  setInterval(function(){  
          /*  $.get("<?=base_url()?>bet/get_odds_only/<?=$id_jogo?>/<?=$id_mkt?>/<?=$type?>" , function(data){
          $("#loading_cont").hide();
          $(".tb_partidas").remove();
          $("#odds").append(data);
          $(".pisc").show('slow');
          //return false;
      }); */
      //  } , 3000);


      // get odds
      var contador = 0;
      var n_runner = "";
      var s_sel_json = "";
      var u_last_odd_json = "";
      var u_last_size_json = "";
      var nm_class_odd = "";
      var odd_now = ""; // verificar se esta usando 
      var nm_last_price = 0;
      var odd_atual = 0;
      var size_now = "";
      var existe = 0;
      // array precos e volumes
      var preco_back_arr = [];
      var vol_back_arr = [];
      var preco_lay_arr = [];
      var vol_lay_arr = [];
      var cont_b = 0;
      var cont_l = 0;
      var somaback = 0;
      var somalay = 0;
      
      setInterval(function(){  contador++;

        //alert(<?=$type?>);
        $.get("<?=base_url()?>bet/get_odds_sel/<?=$id_jogo?>/<?=$id_mkt?>" , function(data){
          
          //alert("opa 4"+"<?=$id_jogo?> - <?=$id_mkt?>");
          var ss = 0;
           $.each(data, function( ticker, last ){
                  //ultimo_btc = last;
                 //console.log(ticker+" - "+last);
                 if(ticker == 'numberOfRunners'){
                  n_runner = last;
                 }
                 // pegar status
                 if(ticker == 'status'){
                  $("#status_now").html(last);
                 }

                  if(ticker == 'betDelay'){
                  $("#delay").html(last);
                 }
                 //status
                 // 
                 if(ticker == "runners"){ 
                   for(var r=0; r<n_runner;r++){
                    somaback = 0;
                    somalay = 0;
                     $.each(last[r], function( ticker2, last2 ){
                      if(ticker2 == "selectionId"){
                        s_sel_json = last2;
                      }
                      if(ticker2 == "lastPriceTraded"){                        
                        odd_atual = last2;                        
                      }
                      var cont_b = 0;
                      var cont_l = 0;
                      if(ticker2 == "ex"){
                        $.each(last2.availableToBack, function( tickerb, lastb ){
                            $.each(lastb, function( tickerbb, lastbb ){
                                // get odd
                                if(tickerbb == 'price'){
                                  cont_b++;
                                  preco_back_arr[cont_b] = lastbb;
                                  odd_now = lastbb;
                                  alert("BACK: "+odd_now);
                                  var u_last_str = String(odd_now);
                                  u_last_trat = u_last_str.replace(".","_");
                                  if("<?=$type?>" == 'vertical'){
                                    nm_class_odd = "o_"+s_sel_json+"_"+u_last_trat+"b";
                                  }

                                  if("<?=$type?>" == 'box'){
                                    nm_last_price = "last_"+s_sel_json+"_b";
                                    nm_class_odd = "v_"+s_sel_json+"_b";
                                    nm_class_odd_atual = "p_"+s_sel_json+"_b";
                                    if(cont_b == 1){
                                      $("."+nm_class_odd_atual).html(lastbb);
                                    }
                                  }
                                  
                                }
                                // get volume
                                if(tickerbb == 'size'){
                                  size_now = lastbb;
                                  if("<?=$type?>" == 'vertical'){
                                    $(".volume"+nm_class_odd).html(size_now);
                                  }
                                  if("<?=$type?>" == 'box'){
                                    $("."+nm_last_price).html(odd_atual);
                                    $("."+nm_class_odd).html(size_now);
                                    somaback += size_now;
                                    
                                  }
                                }
                               
                                
                            }) // x each lastb
                            //console.log(n_runner+" BACK "+s_sel_json);
                            var str_soma = somaback.toFixed(2).split('.');
                          str_soma[0] = str_soma[0].split(/(?=(?:...)*$)/).join('.');
                          str_soma = str_soma.join(',');
                            $(".somaback"+s_sel_json).val(str_soma);
                            $("#somaback"+s_sel_json).html(str_soma);
                            $(".total_somaback"+s_sel_json).html("$"+str_soma);
                            //alert(tickerb+" "+lastb);
                        })
                        $.each(last2.availableToLay, function( tickerl, lastl ){
                            $.each(lastl, function( tickerll, lastll ){
                                //alert("Lay: "+tickerll+" "+lastll+" Class: "+nm_class_odd);
                            
                              $.each(lastl, function( tickerll, lastll ){
                                  if(tickerll == 'price'){
                                    odd_now = lastll;
                                    var u_last_str = String(odd_now);
                                    u_last_trat = u_last_str.replace(".","_");
                                    nm_class_odd = "o_"+s_sel_json+"_"+u_last_trat+"l";
                                  }
                                  if("<?=$type?>" == 'box'){
                                    nm_last_price = "last_"+s_sel_json+"_l";
                                    nm_class_odd = "v_"+s_sel_json+"_l";
                                    nm_class_odd_atual = "p_"+s_sel_json+"_l";
                                  }
                                  if(tickerll == 'size'){
                                    size_now = lastll;
                                    //$(".volume"+nm_class_odd).html(size_now);
                                    if("<?=$type?>" == 'vertical'){
                                      $(".volume"+nm_class_odd).html(size_now);
                                    }
                                    if("<?=$type?>" == 'box'){
                                      $("."+nm_last_price).html(odd_atual);
                                      $("."+nm_class_odd).html(size_now);
                                      $("."+nm_class_odd_atual).html(odd_atual);
                                      somalay += size_now;
                                    }


                                  }
                                  /* fim linha 292
                                  if(size_now > 5000){  
                                    
                                  var jaentrou = $("#jaentrou").val();
                                  if(jaentrou == 0){
                                    
                                    //alert("-> @"+odd_now+"("+s_sel_json+")");

                                    // realiza entrada
                                    var id_mkt = "<?=$this->uri->segment(4)?>";
                                var id_selection = s_sel_json;
                                var tipo = "BACK";
                                var size = odd_now;
                              $("#horse_entrada").html(size_now+" "+id_selection);
                                //var valor = 2;
                                var valor = 0.10;
                                // if( $("#check_vol"+id_selection).is(':checked') ){
                                  $("#jaentrou").val("1");
                                  $("#estasel").html("Entrando (Size) em.... "+s_sel_json);
                                  $.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) , 'bot_tipo' : 'por volume' } , function(data){
                                    //alert(data);
                                    
                                    $("#callback").html(data);
                                    $("#selecao_select").val(id_selection);
                                    $("#jaentrou").val("1");
                                    $("#horse_entrada").html(" Por volume -> @"+size+"("+id_selection+")");
                                    //jaentrou = 1;
                                    //$("#jaentrou").val("1");
                                    $("#jaentrou").val("1");
                                    $("#horse_vol").val(id_selection);
                                  });
                                  
                                //}else{
                                //  alert("n selecionado");
                                //  $("#jaentrou").val("0");
                                //}

                                
                                
                              } // x if entrou
                                } // x if */
                                  //alert($("."+nm_class_odd+" > .volume ").html());
                                  //alert("Back: "+tickerbb+" "+lastbb+" Class: "+nm_class_odd+" Size: "+size_now);
                                  //console.log("Lay: "+tickerll+" "+lastll+" Class: "+nm_class_odd+" Size: "+size_now);
                              })

                          //console.log(" LAY "+s_sel_json);  
                          var str_soma = somalay.toFixed(2).split('.');
                        str_soma[0] = str_soma[0].split(/(?=(?:...)*$)/).join('.');
                        str_soma = str_soma.join(',');
                          //$(".somalay"+s_sel_json).html(str_soma);
                          $(".somalay"+s_sel_json).val(str_soma);
                          $("#somalay"+s_sel_json).html(str_soma);
                          $(".total_somalay"+s_sel_json).html("$"+str_soma);
                         }) // x each lay lastll
                            //alert(tickerl+" "+lastl);
                        }) // x each lastl
                        
                      }
                        //alert(r+" - "+ticker2+ " " + last2+"( "+ n_runner +" )");
                   });
                  // alert("ID seleção: "+s_sel_json+" | @"+u_last_odd_json+" Class:"+nm_class_odd);
                   $("."+nm_class_odd+" > .preco ").css("color:blue");
                   
                 } // x for
               }

               /////////// TESTE SOMA BACK/LAY
               // CALCULO BACK
                var total_sel_back = 0;
                var total_sel_lay = 0;
                var qtd_sel_back = $(".sel_soma_back").length;
                var subtotal = 0;
                var size_back = 0;
                var size_lay = 0;
                console.log(" opa 2 "+qtd_sel_back);
              for(var s=0; s<qtd_sel_back; s++){
                  subtotal =  $(".sel_soma_back").eq(s).val(); 
                  subtotal = parseFloat(subtotal);
                  total_sel_back = parseFloat(total_sel_back);
                  total_sel_back += subtotal;
                  var id_sel = $(".sel_soma_back").eq(s).attr('id');  
                  //console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel_back);
                  //size_back = $("#somaback"+s_sel_json).html();
                  //$("#somaback"+s_sel_json).html(sizeback+subtotal);
                }
              //console.log(total_sel);
              for(var s=0; s<qtd_sel_back; s++){
                var id_sel = $(".sel_soma_back").eq(s).attr('id');  
                var subt = parseFloat($(".sel_soma_back").eq(s).val()); 
                //subt = Math.round(subt);
                var pecentual_back = (subt * 100) / total_sel_back;
                var str_porc = Math.round(pecentual_back);
                $("#"+id_sel+"_porc_b").html(str_porc);
                //console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_back+"% Total: "+total_sel_back);
              }

              // CALCULO LAY
              var total_sel_lay = 0;
                var qtd_sel_lay = $(".sel_soma_lay").length;
                var subtotal = 0;
                //console.log(" opa 2 "+qtd_sel_back);
              for(var s=0; s<qtd_sel_lay; s++){
                subtotal =  $(".sel_soma_lay").eq(s).val(); 
                subtotal = parseFloat(subtotal);
                total_sel_lay = parseFloat(total_sel_lay);
                total_sel_lay += subtotal;
                var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
                //console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
              }
              //console.log(total_sel);
              for(var s=0; s<qtd_sel_lay; s++){
                var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
                var subt = parseFloat($(".sel_soma_lay").eq(s).val()); 
                //subt = Math.round(subt);
                var pecentual_lay = (subt * 100) / total_sel_lay;
                var str_porc = Math.round(pecentual_lay);
                //var str_porc = parseInt(pecentual_lay);
                $("#"+id_sel+"_porc_l").html(str_porc);
                //console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_lay+"% Total: "+total_sel);
              }
              console.log(s_sel_json+" - "+total_sel_back);
              $(".totalback_perc"+s_sel_json).html("Back:::"+total_sel_back);
              // XXXX SOMA BACK*LAY

              

                 //alert(ticker+" "+last);
                 /* if(ticker == 'selectionId')  { ss++;
                    var selection_id = last;
                    alert("Sel: "+ss+" "+selection_id);
                  }  
                  */
                  
                  //alert(ticker+" - "+last);
             });   
          
          //
          //var obj = JSON.parse(data);
          //var qtd = obj.length;
             // alert(qtd);
             
          //$("#valor_total_only").text(data);
          
          //$("#loading_cont").hide();
          //$(".tb_partidas").remove();
          //$("#odds").append(data);
          //$(".pisc").show('slow');
          //return false;
          
          // por MIM
          //alert("OK 1 a");
          
          $(".set_odd").click(function(){
            //alert("OK 2 b");
            // RESET
            $("#valor_place").val("");
            $("#lay_responsabilidade").html("");
            $("#dd_lay").val("");
            $("#calc").html("");
            $("#result_place").html("Resultado");
            var id_select = $(this).attr('title');
            //var odd = $(this).parent().text();
            //var odd = $(this).children().first().html();
            var odd = $(this).attr('lang');
            
            // pega o nome  da selação
            var tit_sel = $("#sel"+id_select).html();
            //alert(tit_sel);
            <? if($this->uri->segment('5') == 'vertical'){ ?>
            // balanço
              var balanco_atual = $("#balanco_atual").text();
              //alert(balanco_atual);
              $("#valor_place").val(balanco_atual);
            <? } ?>
            //alert(odd);
            
            //alert(odd);
            //var odd =  = $(this).attr('dir');
            //var odd = $(this+":first").html();
            
            if($(this).hasClass('back')){
              var tipo = 'BACK';
              //$("#dd_lay").hide();
            }
            
            if($(this).hasClass('lay')){
              var tipo = 'LAY';
              //$("#dd_lay").show();
            }
            //alert(odd);
            
            $("#bt_place").text('Apostar: '+tit_sel+" - "+tipo);
            
            $("#odd_place").val(odd);
            $("#id_select").val(id_select);
            $("#tipo").val(tipo);
            
                           
           
            
            $("#valor_place").focus();
            
            //#valor_place #odd_place
            /*
            $("#valor_place").keyup(function() {
              var odd_place = $(this).val();
              alert(val_odd);
            });
            */
            $("#valor_place").keyup(function() {
              
              //alert( "Handler for .keydown() called." );
              var aposta_valor = $("#valor_place").val();
              var lucro_calc =  aposta_valor * odd;
              //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
              var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
              //var lucro_float = lucro.replace(".","");
                //lucro_float = lucro_float.replace(",",".");
              //lucro_float =  parseFloat(lucro_float);
              //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
              $("#calc").html(parseFloat(lucro));
              $("#sel_balanco_"+id_select).html(parseFloat(lucro));
              // percentual
              var soma_t = lucro - aposta_valor;
              //var soma_total_lay = mysql_fetch_assoc($soma_lay);
              var pecentual_ganho = (lucro * 100) / soma_t;
              //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
              var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
              //$("#lucro_percentual").html(parseFloat(soma_t_t));
              var lucro_percentual = parseFloat(soma_t_t);
              //alert(lucro_percentual);
              $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
              
              if(tipo == "BACK"){
                $("#lucro_percentual").html("Lucro: "+lucro_percentual);
              }
              
              if(tipo == "LAY"){
              $("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
              }
              
              
            });
            $('#valor_place').on('change',function() {
              //alert( "Handler for .keydown() called." );
              var aposta_valor = $("#valor_place").val();
              var lucro_calc =  aposta_valor * odd;
              //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
              var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
              //var lucro_float = lucro.replace(".","");
                //lucro_float = lucro_float.replace(",",".");
              //lucro_float =  parseFloat(lucro_float);
              //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
              $("#calc").html(parseFloat(lucro));
              
              // percentual
              var soma_t = lucro - aposta_valor;
              //var soma_total_lay = mysql_fetch_assoc($soma_lay);
              var pecentual_ganho = (lucro * 100) / soma_t;
              //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
              var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
              //$("#lucro_percentual").html(parseFloat(soma_t_t));
              var lucro_percentual = parseFloat(soma_t_t);
              //alert(lucro_percentual);
              $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
              
              if(tipo == "BACK"){
                $("#lucro_percentual").html("Lucro: "+lucro_percentual);
              }
              
              if(tipo == "LAY"){
              $("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
              }
              
              
            });
            
            
            
            
            $("#bt_place").click(function(){
              
              var len = $("#valor_place").val();
              
              if(len < 2){
                alert("Insira um valor válido");
                $("#valor_place").focus();
                //return false;
              }
              var side_tipo = $("#tipo").val();
              // if (confirm('Você confirma sua aposta '+side_tipo+'  no '+tit_sel+' ?')) {
                $("#bt_place").text('Aguarde...');
                $("#status_place").val('aguarde');

                $("#bt_place").attr("disabled","disabled");
              //}else{
              //  $("#bt_place").attr("disabled","");
              //  return false;
              //}
              
              
              
              
              //alert(tipo);
              var id_mkt = $("#id_mkt").val();
              var id_selection = $("#id_select").val();
              var tipo = $("#tipo").val();
              var size = $("#odd_place").val();
              var valor = $("#valor_place").val();
              //alert(parseFloat(size)+" "+parseFloat(valor));
              $.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
                
                //$("#bt_place").hide();
                $("#bt_place").attr("disabled",false);
                $("#bt_place").text('Apostar');
                $("#result_place").html("");
                $("#result_place").html(data);
                // fecha janela modal
                
                $(".badge_new_bet").addClass('bg-yellow');
                $(".bt_apostas").show();
                
                $('#basic-dialog').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                            $(this).removeClass();
                            $("#status_place").val('');
                        });
                
                //$("#basic-dialog").dialog("close");
                
                //open('right');
                
                
                // abre apostas
                //$('html').addClass('sb-active sb-active-right'); // Add active classes.
                //$(".sb-right").addClass('sb-active');
                //animate($right, '-' + $right.css('width'), 'right'); // Animation
                /*
                setTimeout(function() {
                  rightActive = true;
                  if (typeof callback === 'function') callback(); // Run callback function.
                }, 400); // Set active variables.
                */
                //alert("Opa 22");
              })
              //return false;
            })
            
            //alert(id_select+" "+odd);
            
          })
          
          // pie porcentagens
          if(contador > 3){
          
            
          }
          /*
          $('.set_odd').on('touchend click', function(event) {
            eventHandler(event, $(this)); // Handle the event.
            toggle('left'); // Toggle the left Slidbar.
            var id_select = $(this).attr('title');
            //var odd = $(this).parent().text();
            var odd = $(this).children().first().html();
            //var odd =  = $(this).attr('dir');
            //var odd = $(this+":first").html();
            alert(id_select+" "+odd);
            toggle('left');
          });
          
          */
          
          $(".bt_cashout").click(function(){
            //alert("Opa 10");
            
            
             if (confirm('Você confirma seu Cashout ?')) {
                cashout(this);
              }else{
                return false;
              }
            
          })
  
  
  
    function cashout(elemento){           
                //var len = $("#valor_place").val();
                var id_mkt = $(elemento).val();
                var id_selection = $(elemento).attr('title');
                var tipo = $(elemento).attr('data-type');
                var size = $(elemento).attr('data-direction');
                var valor = $(elemento).attr('data-title');


                //alert("Info: "+id_mkt+" - "+id_selection+" "+tipo+" Size: "+size+" Price:"+valor);
                //return false;
                //alert("Opa3");
                //return false;

                // aguarde
                $("#pre_cash").show();
                $(".bt_cashout").hide();


                //alert(tipo);
                //var id_mkt = $("#id_mkt").val();
                //var id_selection = $("#id_select").val();
                //var tipo = $("#tipo").val();
                //var size = $("#odd_place").val();
                //var valor = $("#valor_place").val();
                //alert(parseFloat(size)+" "+parseFloat(valor));
                var x=0;
                $.post('<?=base_url()?>bet/cashout' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){ x++;
                  alert("dat: "+data);
                  alert("Cashout bem Sucedido!");
                  if(x > 1){
                    $("#pre_cash").hide();
                    $(".bt_cashout").show();
                  }


                })
                //return false;
    }
          
          //alert("a");
        });   
        
      }, 2000);
    



    });



    // calcula porcentagens
        // calcula total back
        setInterval(function(){  
          /*
              // CALCULO BACK
              var total_sel = 0;
              var qtd_sel_back = $(".sel_soma_back").length;
              var subtotal = 0;
              //console.log(" opa 2 "+qtd_sel_back);
            for(var s=0; s<qtd_sel_back; s++){
              subtotal =  $(".sel_soma_back").eq(s).val(); 
              subtotal = parseFloat(subtotal);
              total_sel = parseFloat(total_sel);
              total_sel += subtotal;
              var id_sel = $(".sel_soma_back").eq(s).attr('id');  
              console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
            }
            //console.log(total_sel);
            for(var s=0; s<qtd_sel_back; s++){
              var id_sel = $(".sel_soma_back").eq(s).attr('id');  
              var subt = parseFloat($(".sel_soma_back").eq(s).val()); 
              //subt = Math.round(subt);
              var pecentual_back = (subt * 100) / total_sel;
              var str_porc = Math.round(pecentual_back);
              $("#"+id_sel+"_porc_b").html(str_porc);
              console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_back+"% Total: "+total_sel);
            }

            // CALCULO LAY
            var total_sel = 0;
              var qtd_sel_lay = $(".sel_soma_lay").length;
              var subtotal = 0;
              //console.log(" opa 2 "+qtd_sel_back);
            for(var s=0; s<qtd_sel_lay; s++){
              subtotal =  $(".sel_soma_lay").eq(s).val(); 
              subtotal = parseFloat(subtotal);
              total_sel = parseFloat(total_sel);
              total_sel += subtotal;
              var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
              //console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
            }
            //console.log(total_sel);
            for(var s=0; s<qtd_sel_lay; s++){
              var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
              var subt = parseFloat($(".sel_soma_lay").eq(s).val()); 
              //subt = Math.round(subt);
              var pecentual_lay = (subt * 100) / total_sel;
              var str_porc = Math.round(pecentual_lay);
              //var str_porc = parseInt(pecentual_lay);
              $("#"+id_sel+"_porc_l").html(str_porc);
              //console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_lay+"% Total: "+total_sel);
            }
            */
            
      
        } , 1000);
        
  
    </script>

</body>
</html>
