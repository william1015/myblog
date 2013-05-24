<?php
  /**
   * getCurrentUrl
   **/
  function getCurrentUrl( $root = false ) {
    $scheme = ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] == 'on' ) ? 'https://' : 'http://';
    $domain = $_SERVER[ 'SERVER_NAME' ];
    $port = ( $_SERVER[ 'SERVER_PORT' ] != '80' ) ? ( ':' . $_SERVER[ 'SERVER_PORT' ] ) : '';
    $currentUrl = $scheme . $domain . $port;
    $currentUrl .= ( ( $root === true ) ? dirname( $_SERVER[ 'SCRIPT_NAME' ] ) : $_SERVER[ 'REQUEST_URI' ] );
    
    return( $currentUrl );
  }
  
  /**
   * getUrlFor
   **/
  function getUrlFor( $options, $action = '', $params = '' ) {
    $url = ( ROOT_URL . 'index.php' );
    
    if ( is_array( $options ) ) {
      if ( isset( $options[ 'controller' ] ) && !empty( $options[ 'controller' ] ) ) { $url .= '?controller=' . $options[ 'controller' ]; }
      if ( isset( $options[ 'action' ] ) && !empty( $options[ 'action' ] ) ) { $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . 'action=' . $options[ 'action' ]; }
      if ( isset( $options[ 'params' ] ) && !empty( $options[ 'params' ] ) ) { $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . $options[ 'params' ]; }
    } else {
      if ( !empty( $options ) ) { $url .= '?controller=' . $options; }
      if ( !empty( $action ) ) { $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . 'action=' . $action; }
      if ( !empty( $params ) ) { $url .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . $params; }
    }
    
    return( $url );
  }
  
  /**
   * redirectTo
   **/
  function redirectTo( $options, $action = '', $params = '' ) {
    header( 'Location: ' . getUrlFor( $options, $action, $params) );
    exit( 0 );
  }
  
  /**
   * getControllerPathFor
   **/
  function getControllerPathFor( $controller ) {
    return( CONTROLLERS_PATH . $controller . '.php' );
  }
  
  /**
   * getHelperPathFor
   **/
  function getHelperPathFor( $helper ) {
    return( HELPERS_PATH . $helper . '.php' );
  }
  
  /**
   * getModelPathFor
   **/
  function getModelPathFor( $model ) {
    return( MODELS_PATH . $model . '.php' );
  }
  
  /**
   * getViewPathFor
   **/
  function getViewPathFor( $controller, $view, $type = 'html' ) {
    return( VIEWS_PATH . $controller . PS . $view . '.' . $type . '.php' );
  }
  
  /**
   * getPartialPathFor
   **/
  function getPartialPathFor( $controller, $partial, $type = 'html' ) {
    return( getViewPathFor( $controller, ( '_' . $partial ), $type ) );
  }
  
  /**
   * getImagePathFor
   **/
  function getImagePathFor( $image ) {
    return( IMAGES_PATH . $image );
  }
  
  /**
   * getImageUrlFor
   **/
  function getImageUrlFor( $image ) {
    return( IMAGES_URL . $image );
  }
  
  /**
   * getJavaScriptPathFor
   **/
  function getJavaScriptPathFor( $javascript ) {
    return( JAVASCRIPTS_PATH . $javascript . '.js' );
  }
  
  /**
   * getJavaScriptUrlFor
   **/
  function getJavaScriptUrlFor( $javascript ) {
    return( JAVASCRIPTS_URL . $javascript . '.js' );
  }
  
  /**
   * getStyleSheetPathFor
   **/
  function getStyleSheetPathFor( $stylesheet ) {
    return( STYLESHEETS_PATH . $stylesheet . '.css' );
  }
  
  /**
   * getStyleSheetUrlFor
   **/
  function getStyleSheetUrlFor( $stylesheet ) {
    return( STYLESHEETS_URL . $stylesheet . '.css' );
  }
  
  /**
   * setFlashMessage
   **/
  function setFlashMessage( $type, $message ) {
    if ( !isset( $_SESSION[ 'flash' ] ) ) { $_SESSION[ 'flash' ] = array(); }
    $_SESSION[ 'flash' ][ $type ] = $message;
  }
  
  /**
   * getFlashMessage
   **/
  function getFlashMessage( $type ) {
    $message = '';
    
    if ( isset( $_SESSION[ 'flash' ] ) && isset( $_SESSION[ 'flash' ][ $type ] ) ) {
      $message = $_SESSION[ 'flash' ][ $type ];
      unset( $_SESSION[ 'flash' ][ $type ] );
    }
    
    return( $message );
  }
