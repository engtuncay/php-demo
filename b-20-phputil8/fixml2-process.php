<?php

use Engtuncay\Phputils8\FiApps\FiAppConfig;
use Engtuncay\Phputils8\FiDtos\FiKeybean;
use Engtuncay\Phputils8\FiLogs\FiLog;
use Engtuncay\Phputils8\FiXmls\FiXmlReq;

require __DIR__ . '/vendor/autoload.php';

$txXml = <<<END
<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">
    <soap:Body>
        <IntegrationSendEntitySetWithLogin xmlns=""http://integration.univera.com.tr"">
            <strUserName>{{pwsTxUser}}</strUserName>
            <strPassWord>{{pwsTxPass}}</strPassWord>
            <objPanIntEntityList>
                <!-- rq202504222030 v7 -->
                <SiparisGeneric>
                    <clsSiparisGeneric>
                        <!-- 0:Aktif 1 : iptal edilince aciklama bu şekilde geliyor -->
                        <!--<Aciklama>107949 kodlu belge iptal edildi</Aciklama> -->
                        <Durum>{{pwsgTxDurum}}</Durum>
                        <!--değişken olmalı,dış sistemdeki sipariş numarası,çakışmaması için burada ön ek kullanılabilir-->
                        <Referans>{{pwsgTxSipId}}</Referans>
                        <MusteriKod>{{pwsgTxMustKod}}</MusteriKod>
                        <!-- Müşteri Parametresi St Lng Kodu-->
                        <!-- <LngSTKod>67</LngSTKod> -->
                        <Stkod>{{pwsgTxStKod}}</Stkod>
                        <!--Ayarlardaki LngDepoKodu degerinden alalım-->
                        <DepoLngKod>{{pwsgLnDepoKod}}</DepoLngKod>
                        <!--0 peşin(nakit) 3 Kredi Kartı 4 Açık Hesap 7 Eft-->
                        <Odemetip>{{pwsgTiOdemeTip}}</Odemetip>
                        <!-- Sipariş notu (max 500 char) -->
                        <Aciklama>{{pwsgTxAciklama}}</Aciklama>
                        <!-- Buraya sipariş nosunu yazalım  -->
                        <Matbuno>{{pwsgTxMatbuNo}}</Matbuno>
                        <Islemtarihi>{{pwsgDtIslem}}</Islemtarihi>
                        <Sevktarihi>{{pwsgDtIslem}}</Sevktarihi>
                        <Yil>{{pwsgLnYil}}</Yil>
                        <!--sabit alanlar-->
                        <LngDistKod>1</LngDistKod>
                        <!-- **Sipariş Kalemleri** -->
                        <!--!psgRfSipSatirList-->
                        <Kalemsira>{{pwskLnSira}}</Kalemsira>
                        <Urunkod>{{pwskTxUrunKod}}</Urunkod>
                        <Miktar>{{pwskDbMiktar}}</Miktar>
                        <Urunbirim>{{pwskTxUrunBirim}}</Urunbirim>
                        <Birimfiyat>{{pwskDbBirimFiyat}}</Birimfiyat>
                        <!-- <Birimsira>1</Birimsira> -->
                        <!-- Birim fiyatın gönderilen birime ait olduğunu belirtir. -->
                        <BirinciBirimFiyatKontrol>{{pwskBoBiriminFiyati}}</BirinciBirimFiyatKontrol>
                        <IskontoUygulansinmi>{{pwskBoIskUygula}}</IskontoUygulansinmi>
                        <UygulanacakIskKodlar>{{pwskCsIskKodList}}</UygulanacakIskKodlar>
                        <!--!psgRfSipSatirList-->
                    </clsSiparisGeneric>
                </SiparisGeneric>
            </objPanIntEntityList>
        </IntegrationSendEntitySetWithLogin>
    </soap:Body>
</soap:Envelope>
END;

$fkbParams = new FiKeybean();
$fkbParams->add("pwsgTxDurum", "ok");
$fkbParams->add("pwsgTxSipId", 1111);

$fiXml = new FiXmlReq($txXml, $fkbParams);

//FiLog::initLogger2("./.filogs/logdemo.log");
//FiLog::$log?->info("Final XML:");

echo $fiXml->getXmlFinal();
