<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-language" content="ja">
  <title>
    <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo('name'); ?>
  </title>
  <meta name="title" content="" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="" />
  <meta property="og:site_name" content="" />
  <link rel="shortcut icon" href="" type="<?php bloginfo( 'template_url' ); ?>/image/vnd.microsoft.icon" />
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css">
  <!-- Bootstrap Select --->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap-select.min.css">
  <!-- Default css -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/style.css">
  <!-- jQuery -->
  <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-ui.min.js"></script>
  <!-- Bootstrap Js Flie -->
  <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script>
  <!-- Bootstrap Select Js Flie -->
  <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap-select.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php if ( has_action( 'wp_head', '_admin_bar_bump_cb' ) )
remove_action('wp_head', '_admin_bar_bump_cb' ); wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <p>header</p>
  </header>
