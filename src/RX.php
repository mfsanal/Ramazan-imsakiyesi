<?php
/**
 * RX Framework 1.2
 */
class RX
{
    public static function _asset($file){
        return RXCore::getAppFolder(SYS_ASSET)."/".$file;
    }

    public static function _src($file){
        return RXCore::getAppFolder(SYS_SRC)."/".$file;
    }

    public static function _title()
    {
        return '<title>'.SYS_TITLE.'</title>';
    }

    public static function _seo($s) {
        $tr = array('â','ê','î','û','ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
        $eng = array('a','e','i','u','s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');
        return $s;
    }

    public static function _link($Page,$Params=null){
        $reVal = RXCore::getAppFolder(null)."$Page.html";
        if($Params!=null){
            $__first=true;
            foreach($Params as $key=>$value){
                if($__first){
                    $reVal .= "?".$key."=".$value;
                    $__first=false;
                }else{
                    $reVal .= "&".$key."=".$value;
                }

            }
        }
        return $reVal;
    }

    public static function _linkHome($Path=null){
        if($Path==null)
            return RXCore::getAppFolder("");
        else
            return RXCore::getAppFolder($Path);

    }

    public static function getJScriptCore(){
        return '<script>
                var _Root = "'.RXCore::getAppFolder("").'"; 
                var _QueryUrl = _Root+"Q.php?q="; 
                var _LinkAsset = _Root+"assets/";
         </script>';
    }

    public static function SendMail($_KEY,$_TO,$_SUBJECT,$_MESSAGE){
        $_data = '{"key":"'.$_KEY.'","to":"'.$_TO.'","subject":"'.$_SUBJECT.'","message":"'.$_MESSAGE.'"}';
        return RXCore::RemoteData("https://services.mfsanal.com/notification/Mail",$_data);
    }

    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL)
            && preg_match('/@.+\./', $email);
    }

    public static function getImsakiyeRawData($ulkeId,$ilId,$ilceId)
    {
        $_data = "ulkeId=$ulkeId&ilId=$ilId&ilceId=$ilceId";
        $rawData = RXCore::RemoteData("https://ramazan.diyanet.gov.tr/tr-TR/Imsakiye/Imsakiye",$_data);

        preg_match_all('/<table.*?>(.*?)<\/table>/si', $rawData, $theTable);
        preg_match_all('/<tr.*?>(.*?)<\/tr>/si', $theTable[0][0], $theTR);
        return $theTR;
    }

    public static function imsVar($rawData,$row,$num)
    {
        preg_match_all('/<td.*?>(.*?)<\/td>/si', $rawData[0][$row], $reVal);
        return $reVal[1][$num];
    }

    public static function imsHijriDay($rawHijriDay)
    {
        return explode(" ",trim($rawHijriDay))[0];
    }

    public static function imsGregorianDay($rawGregorianDay)
    {
        $expData = explode(" ",trim($rawGregorianDay));
        return $expData[0]." ".$expData[1];
    }

    public static function imsGregorianName($rawGregorianDay)
    {
        return explode(" ",trim($rawGregorianDay))[3];
    }

    public static function imsState($rawData)
    {
        return explode(" ",trim(strip_tags($rawData[1][0])))[0];
    }

    public static function imsBayramDate($rawData)
    {
        preg_match( '/<b>(.*?)<span>/s', $rawData[1][33], $match );
        return trim($match[1]);
    }

    public static function imsBayramTime($rawData)
    {
        preg_match( '/:<\/span>(.*?)<\/b>/s', $rawData[1][33], $match );
        return trim($match[1]);
    }

    public static function imsWriteItem($top,$left,$text,$font=null)
    {
        if($font==null) {
            return '<p style="top:'.$top.'px;left:'.$left.'px;"><b>'.$text.'</b></p>';
        }else{
            return '<p style="top:'.$top.'px;left:'.$left.'px;font-size:'.$font.'px;"><b>'.$text.'</b></p>';
        }
    }

}