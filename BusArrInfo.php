<?php

class BusArrInfo
{
    private $stationId;    
    private $serviceKey = 'your-service-key';

    private $uri    = 'http://ws.bus.go.kr/api/rest/arrive';

    public $data    = [];

    /**
     * 정류소 ID 설정
     * @param int stationId
     */
    public function __construct(int $stId)
    {
        $this->stationId    = $stId;
        if (!extension_loaded('curl')) {
            die('curl Unable to load extension.');
        }
        return $this->getLowArrInfoByStIdList();
    }

    /**
     * Data Request Settings
     * @param string service
     */
    private function setValue($service)
    {
        $this->uri  = sprintf('%s/%s?ServiceKey=%s&stId=%s', 
            $this->uri, $service, $this->serviceKey, urlencode($this->stationId)
        );
        return [
            CURLOPT_URL => $this->uri,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'GET',
            CURLOPT_HEADER  => false
        ];
    }

    /**
     * 정류소ID로 저상버스 도착예정정보를 조회한다.
     */
    private function getLowArrInfoByStIdList()
    {        
        $ch = curl_init();
        $setValue   = $this->setValue('getLowArrInfoByStId');
        curl_setopt_array($ch, $setValue);
        $response   = curl_exec($ch);
        if (curl_errno($ch)) {
            die('ERROR '. curl_error($ch) .'');
        }
        $this->data = simplexml_load_string($response);
        curl_close($ch);        
    }
}
