<?php
//This function builds and sends the request to Cyta's WebSmsApi and receives a result in xml format
function cytawebsms_request_sms_send($websmsapi_config, $count, $recipients, $message) {
    $url = "https://www.cyta.com.cy/cytamobilevodafone/dev/websmsapi/sendsms.aspx"; //WebSmsApi Post Request URL
    
    $content = "<?xml version='1.0' encoding='UTF-8' ?> 
                    <websmsapi>
                        <version>" . $websmsapi_config['version'] . "</version>
                        <username>" . $websmsapi_config['username'] . "</username>
                        <secretkey>" . $websmsapi_config['apiKey'] . "</secretkey>
                        <recipients>
                            <count>" . $count .  "</count>
                            <mobiles>";
                            foreach ($recipients as $recipient) {
                            $content .= "<m>" . $recipient . "</m>";
                            }
    $content .= "       </mobiles>
                        </recipients>
                        <message>" . $message . "</message>
                        <language>" . $websmsapi_config['language'] . "</language>
                    </websmsapi>";
    
    $options = array(
        'http' => array(
            'header' => "Content-type: application/xml\r\n",
            'method' => 'POST',
            'content' => $content
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

?>