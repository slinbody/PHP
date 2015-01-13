<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
  <?php
require 'aws/aws-autoloader.php';
use Aws\Common\Enum\Region;
use Aws\Ses\SesClient;


try {   
$client = SesClient::factory(array(
  'key'    => 'Your Key',
  'secret' => 'Your Secret',
  'region' => Region::US_EAST_1
));

$msg = array();
$msg['Source'] = "service@test.cc";
//ToAddresses must be an array
$msg['Destination']['ToAddresses'][] = "MyAngel@1999.tw";

$msg['Message']['Subject']['Data'] = "Text only subject";
$msg['Message']['Subject']['Charset'] = "UTF-8";

$msg['Message']['Body']['Text']['Data'] ="1919";
$msg['Message']['Body']['Text']['Charset'] = "UTF-8";
$msg['Message']['Body']['Html']['Data'] ="cool~~~<br />";
$msg['Message']['Body']['Html']['Charset'] = "UTF-8";

$result = $client->sendEmail($msg);

     //save the MessageId which can be used to track the request
     $msg_id = $result->get('MessageId');
     echo("MessageId: $msg_id");

     //view sample output
     print_r($result);
}
catch( Exception $e )
{
    echo $e->getMessage();
}
?> 
 </body>
</html>
