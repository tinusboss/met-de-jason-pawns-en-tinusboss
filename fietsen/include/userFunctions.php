<?php 
    if(!isset($_SESSION['login'])){
        $_SESSION['login']=false;
        $_SESSION['username']="";
        $_SESSION['role']=0;
    }

    function login(){}

    function checkUser($username){}

    function checkUserPassword($username, $password){}

    function checkRole($role){}

    function register(){}

    function logout(){}

?>