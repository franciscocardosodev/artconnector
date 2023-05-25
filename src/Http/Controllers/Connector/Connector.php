<?php

namespace Franciscocardosodev\ArtsoftConnector\Http\Services\Connector;

include "ArtsoftConnector.php";

use ArtsoftConnector;

class Connector
{
    private $header = '<?xml version="1.0" encoding="UTF-8" ?>';
    

    function isValidDSN($year)
    {
        return array_key_exists($year, config('artsoft_connector.servers'));
    }

    function connect($year)
    {
        $dsn = array(array_merge(config('artsoft_connector.servers')[$year],config('artsoft_connector.access')));
        return new ArtsoftConnector($dsn, config('artsoft_connector.options'));
    }

    public function doRequest(mixed $year, string $service, string $xml)
    {
        ini_set('display_errors', 0);
        error_reporting(0);

        if (!$this->isValidDSN($year)) {
            return ['code' => 404, 'message' => 'There is no configured access to ' . $year . ' database!'];
        }

        $connector = $this->connect($year);

        if (!isset($connector)) {
            return ['code' => 400, 'message' => 'Something went wrong while connecting to ' . $year . ' database!'];
        }

        return ['code'=>200,'message'=>$connector->doRequest($service, $this->header . $xml, true)];
    }
}
