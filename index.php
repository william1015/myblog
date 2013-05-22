<?php
  $params = $_REQUEST;
  $controller = ( ( !isset( $params[ 'controller' ] ) || empty( $params[ 'controller' ] ) ) ? 'home' : $params[ 'controller' ] );
  $action = ( ( !isset( $params[ 'action' ] ) || empty( $params[ 'action' ] ) ) ? 'index' : $params[ 'action' ] );
  $view = $action;
  
  require_once( 'config/database.php' );
  require_once( 'lib/helpers/application.php' );
  require_once( 'lib/databases/adapters/' . DATABASE_ADAPTER . '.php' );
  DbAdapter::connect();
  include_once( 'app/controllers/' . $controller . '.php' );
  
  $layout = 'application';
  
  if ( !empty( $layout ) ) {
    include_once( 'app/views/layouts/' . $layout . '.html.php' );
  } else {
    include_once( 'app/views/' . $controller . '/' . $view . '.html.php' );
  }
  
  DbAdapter::close();
