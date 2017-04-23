<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Friend Finder | A Complete Social Network Template</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="../view/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../view/css/style.css" />
		<link rel="stylesheet" href="../view/css/ionicons.min.css" />
                <link rel="stylesheet" href="../view/css/font-awesome.min.css" />
                <link rel="stylesheet" href="../view/css/timeline.css" />
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="../view/images/fav.png"/>
	</head>
	<body>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="TimelineController.php"><img src="../view/images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
              <?php if(empty($_SESSION['userId'])) {?>
                <a href="../controller/HomeController.php" role="button">Register/Login</a>
               <?php } else { ?>
               <a href="../controller/HomeController.php?logout=true" role="button">Logout</a>
               <?php } ?>
              </li>
              <li class="dropdown">
                <a href="NewsFeedController.php" class="dropdown-toggle"button" >Newsfeed <span></span></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All pages <span><img src="../view/images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  <li><a href="TimelineController.php">Timeline</a></li>
                  <li><a href="AboutController.php">About</a></li>
                  <li><a href="GalleryController.php">Gallery</a></li>
                  <li><a href="VideosController.php">Videos</a></li>
                  <li><a href="FriendsController.php">Friends</a></li>
                </ul>
              </li>     
              <li class="dropdown"><a href="ContactController.php">Contact</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
    