<?php include_once ('include_header.php');?>
<?php include_once ('include_sidemenu.php');?>
<?php if(getUserRoleId()==1){
    include_once ('backend/dashboardadmin.php');
}else{
    include_once ('backend/dashboard.php');
}?>
<?php include_once ('include_footer.php')?>
