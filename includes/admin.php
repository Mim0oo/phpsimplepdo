<?php
 if (!isset($_SESSION)) {
session_start(); }
if ($_SESSION['myusername'] == ''){
include('/templates/cp.html');
}
include ('/templates/admin.html');
 
        echo 'Hello user! Choose a link to get started.
        <br /><br />';
 
  
?>