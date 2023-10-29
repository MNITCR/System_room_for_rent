<?php
    if(isset($_POST['save-info'])){
        $admName = $_POST['admin-name'];
        $admPass = $_POST['admin-password'];
        $ranDomUinCode = new Redom;
        $query = "SELECT adm_name,adm_pass FROM tb-user WHERE ";
    }

?>
