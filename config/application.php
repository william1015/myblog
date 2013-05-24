<?php
  $layout = 'application';
  
  include_once( getControllerPathFor( $controller ) );
  
  if ( !empty( $layout ) ) {
    include_once( VIEWS_PATH . 'layouts' . PS . $layout . '.html.php' );
  } else {
    include_once( getViewPathFor( $controller, $view ) );
  }
