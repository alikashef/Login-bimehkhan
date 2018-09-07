<?php

defined( "SERVER" ) ? NULL : define( "SERVER", "localhost" );
defined( "UNAME" ) ? NULL : define( "UNAME", "root" );
defined( "PASS" ) ? NULL : define( "PASS", "root" );
defined( "DB" ) ? NULL : define( "DB", "bimehkhan" );

$connection = mysqli_connect( SERVER, UNAME, PASS, DB );
if ( !$connection ) {
    die( "Connection Failed" . mysqli_error( $connection ) );
}

mysqli_set_charset($connection, "utf8");

require_once( 'functions.php' );