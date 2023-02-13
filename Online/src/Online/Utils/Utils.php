<?php

namespace Online\Utils;

class Utils
{

    public function checkUpdateAvailible($url){
        // Check, if a valid url is provided
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return false;
        }

        // Initialize cURL
        $curlInit = curl_init($url);

        // Set options
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

        // Get response
        $response = curl_exec($curlInit);

        // Close a cURL session
        curl_close($curlInit);

        return $response?true:false;
    }

    public static function getOnline($hostname, $port){
        $socket = fsockopen("udp://".$hostname, $port);
        stream_set_timeout($socket, 1);
        fwrite($socket, "\x01\0\0\0\0\0\0\0\0\x00\xff\xff\x00\xfe\xfe\xfe\xfe\xfd\xfd\xfd\xfd\x12\x34\x56\x78");
        $online = ($data = fread($socket, 1024)) !== false ? (int)explode(";", ($str = substr($data, 40)) === false ? "" : $str) : 0;
        return $online;
    }
}