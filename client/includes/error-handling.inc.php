<?php
//This function handles the response after converted to array and checks status code and matchs it with status message
function cytawebsms_errors_check($request = []) {
    //Checks and sets Status Code and LOT Code
    if (isset($request['lot'])) {
        $lot = $request['lot'];
    } else {
        $lot = NULL;
    }
    $code = intval($request['status']);
    // Error Codes As Defined by Cyta Web SMS Api Documentation
    $errors = array(
        0 => "Send Sms success",
        27 => "Invalid mobile number found",
        31 => "Max allowed sms messages per day threshold reached",
        1 => "You are not allowed to use the service",
        2 => "The service is suspended",
        9 => "Generic send sms failure",
        10 => "User not found or Suspended cybee account/Invalid Secret Key",
        11 => "configuration settings not found for Username",
        12 => "Web Sms Api Suspended or Terms not accepted",
        13 => "Client IP does not match expected IP",
        19 => "Registered mobile number for username not found",
        20 => "missing field values or case (lower/upper) of elements",
        21 => "invalid username",
        22 => "invalid characters in Recipients",
        23 => "invalid characters in recipient count",
        24 => "invalid language",
        25 => "cybee recipients count and user entered count does not match",
        26 => "Recipients list is bigger than allowed",
        28 => "Message length is bigger than allowed",
        29 => "Unsupported Content Type",
        30 => "Missing HTTP Post request body",
        39 => "Invalid Version",
        90 => "Exception",
        91 => "Exception processing URL Encoded request",
        92 => "Exception processing XML request",
        93 => "Invalid XML request data"
    );
    if (isset($errors[$code])) {
        $msg = $errors[$code];
    } else {
        $msg = "Unknown";
    }
    return array(
        "msg" => $msg, 
        "code" => strval($code),
        "lot" => $lot);
}
?>

