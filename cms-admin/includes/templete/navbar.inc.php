<body>
    <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#custom-toggle" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="?page=index"><?= $app['app_name'] ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="custom-toggle">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['name'] ?> <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="?page=account">My Acount</a></li>
                        <li><a href="logout.php">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div><!-- /.container-fluid -->
            </nav>