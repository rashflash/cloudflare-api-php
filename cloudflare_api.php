<?php

/**
 * Made by RashFlash
 * Dec 10th 2015
 */
class cloudflare_api {

    //Timeout for the API requests in seconds
    const TIMEOUT = 15;
    //Interval values for Stats
    const INTERVAL_365_DAYS = 10;
    const INTERVAL_30_DAYS = 20;
    const INTERVAL_7_DAYS = 30;
    const INTERVAL_DAY = 40;
    const INTERVAL_24_HOURS = 100;
    const INTERVAL_12_HOURS = 110;
    const INTERVAL_6_HOURS = 120;
    
    private $zone_id="xxxxxxxxxxxxxxxxxxxxxxxx";

    public function getUserDetail($email, $api) {
        $result=$this->curlGetRequest("https://api.cloudflare.com/client/v4/user",$email, $api);        
        return $result;
    }
    
    public function purgeFiles($email, $api,$files) {
        $json=  json_encode(array(
            'files'=>$files
        ));
        
        $result=$this->curlDeleteRequest("https://api.cloudflare.com/client/v4/zones/$this->zone_id/purge_cache",$email, $api,$json);
        return $result;
    }
    
    public function purgeAll($email, $api) {
        $json=  json_encode(array(
            'purge_everything'=>true
        ));
        
        $result=$this->curlDeleteRequest("https://api.cloudflare.com/client/v4/zones/$this->zone_id/purge_cache",$email, $api,$json);
        return $result;
    }
    
    public function getZonesList($email, $api,$domain) {
        $result=$this->curlGetRequest("https://api.cloudflare.com/client/v4/zones?name=$domain",$email, $api);
        return $result;
    }
    
       

    public function curlGetRequest($url,$email,$api_key) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        $headers = array(
            'X-Auth-Email: ' . $email,
            'X-Auth-Key: ' . $api_key,
            'Content-Type: application/json',
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
    
    public function curlDeleteRequest($url,$email,$api_key,$json) {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            'X-Auth-Email: ' . $email,
            'X-Auth-Key: ' . $api_key,
            'Content-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

}
