<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo app_name(); ?> | Цуп</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="<?php echo base_url('static'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('static'); ?>/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('static'); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('static'); ?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('static'); ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('static'); ?>/dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body class="skin-red">

<div class="wrapper">
  <header class="main-header">
    <!-- Логотип, если будет -->
    <a href="<?php echo base_url(); ?>" class="logo"><?php echo app_name(); ?></a>
    <!-- Навигация в шапке: стиль в header.less -->
    <!-- to do: дочитай про less -->	
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- переключалка-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Переключиться</span>
      </a>
      <!-- правое меню -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Юзеры: стили в dropdown.less, дочитай про less -->
          
          <li class="dropdown user user-menu">
            <a href="#" >
              <img src="<?php echo base_url('static'); ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
              <span class="hidden-xs"><?php echo $this->user->userdata->name ?></span>
            </a>
          </li>

          <li >
            <a href="<?php echo base_url('dashboard/logout'); ?>">
              <span class="hidden-xs">Выйти</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- левая колонка -->
      <aside class="main-sidebar">
        <!-- сайдбар -->
        <section class="sidebar">
          <!-- панель сайдбара -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('static'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->user->userdata->name ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
            </div>
          </div>
          <!--поиск -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="search-orders"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /поиск -->
          <!-- сайдбар 2 -->
          <ul class="sidebar-menu">
            <li class="header">Навигация</li>
            <li class="active treeview">
              <a href="<?php echo base_url(); ?>">
                <i class="fa fa-dashboard"></i> <span>ЦУП</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Пользователи. Управление</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('users'); ?>"><i class="fa fa-circle-o"></i> Показать всех пользователей</a></li>
                <li><a href="<?php echo base_url('users/add'); ?>"><i class="fa fa-circle-o"></i> Добавить нового пользователя</a></li>
              </ul>
            </li> 

            <li class="treeview">
              <a href="#">
                <i class="fa fa-car"></i>
                <span>Мастера. Управление</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('masters'); ?>"><i class="fa fa-circle-o"></i> Показать всех мастеров</a></li>
                <li><a href="<?php echo base_url('masters/add'); ?>"><i class="fa fa-circle-o"></i>Добавить нового мастера</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url('orders'); ?>">
                <i class="fa fa-calendar"></i>
                <span>Заказы</span>
              </a>
            </li> 
            
            <li class="treeview">
              <a href="<?php echo base_url('dashboard/password'); ?>">
                <i class="fa fa-key"></i>
                <span>Сменить пароль</span>
              </a>
            </li> 

            <li class="treeview">
              <a href="<?php echo base_url('dashboard/logout'); ?>">
                <i class="fa fa-sign-out"></i>
                <span>Выйти</span>
                
              </a>
              
            </li> 

          </ul>
        </section>
        <!-- /сайдбар 2 -->
      </aside>


      <div class="content-wrapper">
        <!-- шапка -->
        <section class="content-header">