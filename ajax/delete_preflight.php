<?php
extract($_POST);
include('../config.php');
mysql_query("DELETE FROM preflight WHERE id = '$id' ");

?>