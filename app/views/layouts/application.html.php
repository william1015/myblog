<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=Edge,Chrome=1" />
      <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Home Made Framework</title>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo getStyleSheetUrlFor( 'application' ); ?>" />
  </head>
  <body>
    <?php
      include_once( getPartialPathFor( 'layouts', 'flash' ) );
      include_once( getViewPathFor( $controller, $view ) );
    ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="<?php echo getJavaScriptUrlFor( 'application' ); ?>"></script>
  </body>
</html>
