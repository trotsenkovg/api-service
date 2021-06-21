<?php


namespace App\Services;


use SimpleXMLElement;

trait RequestHelper
{
    private function arrayToXML(array $data)
    {
        $xml_data = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Request/>');
        $this->proceedXml($data,$xml_data);

        return $xml_data->asXML();
    }

    private function proceedXml($data, &$xml_data)
    {
        foreach( $data as $key => $value ) {
            if( is_array($value) ) {
                if( is_numeric($key) ){
                    $key = 'Product'; //dealing with <0/>..<n/> issues
                }
                $subnode = $xml_data->addChild($key);
                $this->proceedXml($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
}
