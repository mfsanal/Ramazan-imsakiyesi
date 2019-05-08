<?
require_once 'config.php';
$___page = $_GET['___page'];
require_once SYS_WEBAPP_APP.'/'.SYS_WEBAPP_HEADER.'.php';
if (file_exists(SYS_WEBAPP_APP.'/'.$___page.'.php')){
    require_once SYS_WEBAPP_APP.'/'.$___page.'.php';
}else{
   require_once SYS_WEBAPP_APP.'/'.SYS_WEBAPP_HOME.'.php';
}
require_once SYS_WEBAPP_APP.'/'.SYS_WEBAPP_FOOTER.'.php';

