<?php
include_once 'Infrastructura/PacientesUsePost.php';
include_once 'Infrastructura/PacientesUseGet.php';
include_once 'Infrastructura/PacientesUsePut.php';
include_once 'Infrastructura/PacientesUseDelete.php';


switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $get = new PacientesUseGet();
        $get ->get();
        header("HTTP/1.1 200 OK");
        break;
    case 'POST':
        $post = new PacientesUsePost();
        $post ->post();
        header("HTTP/1.1 200 OK");
        break;
    case 'PUT':
        $put = new PacientesUsePut();
        $put ->put();
        header("HTTP/1.1 200 OK");
        break;
    case 'DELETE':
        $delete = new PacientesUseDelete();
        $delete ->delete();
        header("HTTP/1.1 200 OK");
        break;
    default:
        break;
}
?>