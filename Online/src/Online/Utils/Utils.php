<?php

namespace Online\Utils;

class Utils
{

    public static function getOnline(string $hostname, int $port){
        $socket = fsockopen("udp://".$hostname, $port);
        stream_set_timeout($socket, 1);
        fwrite($socket, "\x01\0\0\0\0\0\0\0\0\x00\xff\xff\x00\xfe\xfe\xfe\xfe\xfd\xfd\xfd\xfd\x12\x34\x56\x78");
        $online = ($data = fread($socket, 1024)) !== false ? (int)explode(";", ($str = substr($data, 40)) === false ? "" : $str) : 0;
        return $online;
    }
}