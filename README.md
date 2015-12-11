# cloudflare-api-php
PHP class to access latest v4 api of cloudflare

This Php class (library) is developed to allow user to access its cloudflare settings via API. to read more about their api visit https://api.cloudflare.com/

Currently, below functions are added so far:

<ul>
 <li>getZonesList($email, $api,$domain) // show detail of zone , currently return array</li>
 <li>getUserDetail($email, $api) // get detail of user</li>
 <li>purgeFiles($email, $api,$files) // purge (clear cache) list of files / file</li>
 <li>purgeAll($email, $api) // purge everything</li>
</ul>

#Installation
require_once('cloudflare_api.php');

#Code Example

* $api_key = "xxxxxxxx"; // enter your key here
* $domain = "xxxx.xxx"; // enter your domain which you already has added in cloudflare
* $email = "xxx@xxx.xxx"; // your email , which is linked to you cloudflare account


* $cf = new cloudflare_api();
* $res=$cf->getUserDetail($email,$api_key);
* echo json_encode($res); // do whatever you want to


* $res=$cf->purgeFiles($email,$api_key,$files);
* $res=$cf->purgeAll($email,$api_key);

* $res=$cf->getZonesList($email,$api_key);

