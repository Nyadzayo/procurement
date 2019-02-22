<?php
require_once 'core/init.php';
$ir = new IR();
if(isset($_POST["Export"])) {
    $ir->generatecsv('internal_requisition');

}