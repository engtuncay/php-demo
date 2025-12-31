<?php

use Engtuncay\Phputils8\FiApps\FiAppConfig;
use Engtuncay\Phputils8\FiConfigs\FiConfReader;
use Engtuncay\Phputils8\FiDtos\FiKeybean;
use Engtuncay\Phputils8\FiLogs\FiLog;
use Engtuncay\Phputils8\FiSoaps\FiSoap;
use Engtuncay\Phputils8\FiXmls\FiXmlReq;

require __DIR__ . '/vendor/autoload.php';

$txXml = <<<END
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
    <soap:Header/>
    <soap:Body>
        <int:IntegrationLogin>
            <int:strUserName>{{usr}}</int:strUserName>
            <int:strPassWord>{{psr}}</int:strPassWord>
            <int:bytFirmaKod>{{panoFirmaKod}}</int:bytFirmaKod>
            <int:lngCalismaYili>{{panoCalismaYili}}</int:lngCalismaYili>
            <int:lngDistributorKod>{{panoLngDistKod}}</int:lngDistributorKod>
        </int:IntegrationLogin>
    </soap:Body>
</soap:Envelope>
END;

FiLog::initLogger2("./.filogs/soap.log");

$fdr = FiConfReader::readConfFile(__DIR__ . '/.env');

$fkbParams = $fdr->getFkbValue();

//FiLog::$log?->info("FkbParams:". print_r($fkbParams->getArr(), true ));

$fiXml = new FiXmlReq($txXml, $fkbParams);
$fiXml->txBaseUrl = $fdr->getFkbValue()->get('baseUrl');

$fdr = FiSoap::execute($fiXml);

echo $fiXml->getXmlFinal();

echo "\n";

echo print_r($fdr, true); 
