<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My name is Barry Allen">
    <meta name="author" content="Barry Allen">

    <title>Paradox</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_PATH ?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Theme CSS -->
    <link href="<?php echo BASE_PATH ?>/public/css/clean-blog.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<?php echo BASE_PATH ?>/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
    #search {
        margin-top: -5px;
    }

    #search input {
        border-radius: 10px 0 0 10px;
    }

    #butt > li {

    }

    #butt {
        height: 30px;
        width: 30px;
        border-radius: 0 10px 10px 0;
        background: white;
        border: 1px solid white;
    }

    #butt:hover {
        background: #0085A1;
        border: 1px solid #0085A1;
    }

    #butt:hover .fa {
        color: white;
    }
</style>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <div class="navbar-brand" href="">
                <form id="search" method="get" action="<?php echo BASE_PATH; ?>/search" style="text-align: center;">
                    <input name="s" type="text" novalidate
                           style="color: black; font-weight: normal; width: 225px; height: 30px; padding-left: 10px">
                    <button type="submit" id="butt">
                        <li class="fa fa-search" style="color: black"></li>
                    </button>
                </form>
            </div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo BASE_PATH ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>/about">About</a>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>/contact">Contact</a>
                </li>

                <?php if (!isset($_SESSION['login_success'])) : ?>
                    <li><a href="<?php echo BASE_PATH ?>/login">Login</a></li>
                    <li><a href="<?php echo BASE_PATH ?>/signup">Signup</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['login_success'])) : ?>
                    <li><a href=""><?php echo $_SESSION['login_success']; ?></a></li>
                    <li><a href="<?php echo BASE_PATH ?>/loguot">Log Out</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>