<?php
    require('/home/stud/s3323843/.HTMLinfo/wda/A1/C/Smarty-3.1.11/libs/Smarty.class.php');
    require_once('utilities.php'); 
    $smarty = new Smarty();

    $smarty->setTemplateDir('Smarty-Work-Dir/templates/');
    $smarty->setCompileDir('Smarty-Work-Dir/templates_c/');
    $smarty->setConfigDir('Smarty-Work-Dir/configs/');
    $smarty->setCacheDir('Smarty-Work-Dir/cache/');
    
    $years = get_years();
    $regions=get_regions();
    $varieties=get_variety();
    $min_yr=get_years();
    $max_yr=get_years();
    
    $smarty->assign('years',$years);
    $smarty->assign('regions',$regions);
    $smarty->assign('variety',$varieties);
    $smarty->debugging=false;
    
    $smarty->display('index.tpl');

?>







