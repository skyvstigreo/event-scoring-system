<?php
function gen_cid($len = 5)
{

    $hex = md5("cid" . uniqid("", true));

    $pack = pack('H*', $hex);
    $tmp =  base64_encode($pack);

    $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);

    $len = max(4, min(128, $len));

    while (strlen($uid) < $len)
        $uid .= gen_cid(22);

    return "category-" . strtolower(substr($uid, 0, $len));
}
