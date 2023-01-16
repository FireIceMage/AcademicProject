<?php

$connect = mysqli_connect( 'localhost', 'root', '',  'my-db1' );

if (!$connect){
    die('error connect to database');
}
