<?php
/*
 * Created on 3 nov. 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 function CheckLogin()
{
     session_start();
 
     if(empty($_SESSION["username"]))
     {
        return false;
     }
     return true;
}
?>
