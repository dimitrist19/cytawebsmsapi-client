<?php
//This function converts the xml received code to a php array
function cytawebsms_xml_handle($xml_code) {

    function cytawebsms_XML2Array(SimpleXMLElement $parent) {
        $array = array();

        foreach ($parent as $name => $element) {
            ($node = & $array[$name]) && (1 === count($node) ? $node = array($node) : 1) && $node = & $node[];

            $node = $element->count() ? XML2Array($element) : trim($element);
        }

        return $array;
    }

    $xml = simplexml_load_string($xml_code);
    $array = cytawebsms_XML2Array($xml);
    $array = array($xml->getName() => $array);
    return $array;
}
?>

