<?php
/**
 * RX Framework 1.2
 */

class RXCore
{
    private static $PHP = ".php";
    public static function generateDefines($defineList){
        foreach ($defineList as $key=>$value){
            define($key,$value);
        }
    }

    public static function setConfig($Mode,$List)
    {
        define("RUN_MODE",$Mode);
        self::generateDefines($List[$Mode]);
    }

    public static function getCore($FileLoc)
    {
        require_once SYS_SRC."/".$FileLoc.self::$PHP;
    }

    public static function getAppFolder($Folder){
        $NG = (SYS_MAIN=="")?$_SERVER['REQUEST_URI']:str_replace("/".SYS_MAIN,"",$_SERVER['REQUEST_URI']);
        $arrData=explode('/',$NG);
        $Parantez = count($arrData)-1;
        if($Parantez==1){
            return $Folder;
        }else{
            $str = "";
            for ($i = 1; $i < $Parantez; $i++) {
                $str .= "../";
            }
            $str .= $Folder;
            return $str;
        }
    }

    public static function RemoteData($_SiteUrl,$_PostFields=null){
        $_ReturnValue = null;
        $__useragent = 'Mozilla/5.0 (compatible; BoTReX/3.1; +http://botrex.mfsanal.com)';
        $__referer ="http://botrex.mfsanal.com";
        $__cookieFileLocation = './cookie.txt';
        /************ *********************** ***********/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_SiteUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $__useragent);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $__cookieFileLocation);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $__cookieFileLocation);
        curl_setopt($ch ,CURLOPT_REFERER, $__referer);
        if(SYS_PROXY) curl_setopt($ch, CURLOPT_PROXY, "192.168.12.101:80");
        if($_PostFields != null){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch ,CURLOPT_POSTFIELDS, $_PostFields);
        }
        try{
            $_ReturnValue = curl_exec($ch);
            curl_close($ch);
        }catch (Exception $e){
            $_ReturnValue = "-1";
        }
        return $_ReturnValue;
    }
}