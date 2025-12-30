<?php

use Engtuncay\Phputils8\FiXmls\FiXmlUtil;

require __DIR__ . '/vendor/autoload.php';

$txXml = <<<END
<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">
    <soap:Body>
        <IntegrationSendEntitySetWithLogin xmlns=""http://integration.univera.com.tr"">
            <strUserName>{{pwsTxUser}}</strUserName>
            <strPassWord>{{pwsTxPass}}</strPassWord>
            <bytFirmaKod>{{pwsTiFirmaKod}}</bytFirmaKod>
            <lngCalismaYili>{{pwsLnCalismaYil}}</lngCalismaYili>
            <lngDistributorKod>{{pwsLnDistKod}}</lngDistributorKod>
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
                        <Stoktip>0</Stoktip>
                        <Tur>0</Tur>
                        <Belgetip>2</Belgetip>
                        <Kayittip>0</Kayittip>
                        <FiyatHesaplamaTipi>Uygulama</FiyatHesaplamaTipi>
                        <BelgeDetayKod>0</BelgeDetayKod>
                        <BasimKod>0</BasimKod>
                        <Giristipi>8</Giristipi>
                        <Onay>1</Onay>
                        <BelgeSira>0</BelgeSira>
                        <Harekettip>15</Harekettip>
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
                <SatirBazliTransaction>false</SatirBazliTransaction>
                <LogKategori>0</LogKategori>
                <IntegrationGorevSonucTip xsi:nil=""true"" />
                <SCCall>false</SCCall>
                <!--true ise hata varsa detaylı gösterir -->
                <ReturnLoglist>true</ReturnLoglist>
                <StokSil>false</StokSil>
            </objPanIntEntityList>
        </IntegrationSendEntitySetWithLogin>
    </soap:Body>
</soap:Envelope>
END;

echo FiXmlUtil::deActivateAllParams($txXml);
echo "\n";
echo "\n";
echo FiXmlUtil::deActivateParam($txXml, "pwskCsIskKodList");
echo "\n";
