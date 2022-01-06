<?php
//Including necessary files
require 'configuration.php';
require 'includes/error-handling.inc.php';
require 'includes/xml-handling.inc.php';
require 'includes/request-handling.inc.php';

//This is the general sms request function
//
//Returns result in array format as defined below
//
//"api_success": bool - defines whether it reached Cyta's api (true) or error in client (false)
//"status_message": string - returns the status message as defined to Cyta's API documentation
//"status_code": string(number) - returns the status code the api returned
//"lot": null or string - if api returned lot code (sms sent successfully) shows lot code otherwise it returns as null
function cytawebsms_create_request($recipients, $message) {
    if (!is_array($recipients)) {
        return array(
            "api_success" => false,
            "status_message" => "Expected to receive recipients array",
            "status_code" => "F1", //F1 error message: within client error (operation failed)
            "lot" => NULL
        );
    }
    $recipients_count = 0;
    foreach ($recipients as $recipent) {
        $recipients_count++;
    }
    global $websmsapi_config;
    $request = cytawebsms_request_sms_send($websmsapi_config, $recipients_count, $recipients, $message); //Calls function to execute api request
    $result = cytawebsms_xml_handle($request); //conversion of xml to php array
    $errors = cytawebsms_errors_check($result['websmsapi']); //gets final data
    return array(
        "api_success" => true,
        "status_message" => $errors['msg'],
        "status_code" => $errors['code'],
        "lot" => $errors['lot']
    );
}

?>
