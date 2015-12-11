# cloudflare-api-php
PHP class to access latest v4 api of cloudflare

This Php class (library) is developed to allow user to access its cloudflare settings via API. to read more about their api visit https://api.cloudflare.com/

Currently, below functionality is added so far:

<ul>
 <li>getZonesList($email, $api,$domain) // show detail of zone , currently return array</li>
 <li>getUserDetail($email, $api) // get detail of user</li>
 <li>purgeFiles($email, $api,$files) // purge (clear cache) list of files / file</li>
 <li>purgeAll($email, $api) // purge everything</li>
</ul>
