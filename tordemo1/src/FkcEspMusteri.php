<?php
namespace Phpworkshop;

// Php FkbCol Class Generation - v0.4 

use Engtuncay\Phputils8\FiCols\AbsFkbTable;
use Engtuncay\Phputils8\FiCols\IFkbTableMeta;
use Engtuncay\Phputils8\FiDtos\FiKeybean;
use Engtuncay\Phputils8\FiDtos\FkbList;
use Engtuncay\Phputils8\FiMetas\FimFiCol;


class FkcEspMusteri extends AbsFkbTable implements IFkbTableMeta
{

  public function getITxTableName(): string
  {
    return self::GetTxTableName();
  }

  public static function  getTxTableName(): string
  {
    return "EspMusteri";
  }


  public static function genTableCols(): FkbList
  {
    $fkbList = new FkbList();

    $fkbList->add(self::musLnId());
    $fkbList->add(self::musLngkod());
    $fkbList->add(self::musTxterpkod());
    $fkbList->add(self::musTxtunvan());
    $fkbList->add(self::musTxtilgilikisi());
    $fkbList->add(self::musTxtadres1());
    $fkbList->add(self::musTxtadres2());
    $fkbList->add(self::musTxtilce());
    $fkbList->add(self::musTxtsehir());
    $fkbList->add(self::musTxtvd());
    $fkbList->add(self::musTxtvn());
    $fkbList->add(self::musTxttelefon());
    $fkbList->add(self::musTxtpostakod());
    $fkbList->add(self::musTxtgrupkod());
    $fkbList->add(self::musTxtekgrupkod());
    $fkbList->add(self::musLngstkod());
    $fkbList->add(self::musTxtstkod());
    $fkbList->add(self::musTxtilgilikisi2());
    $fkbList->add(self::musTxtulke());
    $fkbList->add(self::musTxtceptelno());
    $fkbList->add(self::musCrrkredilimit1());
    $fkbList->add(self::musTxtcadde());
    $fkbList->add(self::musTxtsokak());
    $fkbList->add(self::musTxtemail());
    $fkbList->add(self::musTxtozelkod());
    $fkbList->add(self::musTxtmahalle());
    $fkbList->add(self::musDblkoordinatx());
    $fkbList->add(self::musDblkoordinaty());
    $fkbList->add(self::musTxtgrupad());
    $fkbList->add(self::musTxtekgrupad());


    return $fkbList;
  }

  public static function genTableColsTrans(): FkbList
  {
    $fkbList = new FkbList();

    $fkbList->add(self::sqTableName());
    $fkbList->add(self::musLngdistkod());
    $fkbList->add(self::musTxtdistkod());
    $fkbList->add(self::musLngerpkod());
    $fkbList->add(self::musTxtkod());
    $fkbList->add(self::musTxtfaks());
    $fkbList->add(self::musTrhsonislemtarihi());
    $fkbList->add(self::musDbliskontooran());
    $fkbList->add(self::musBytvadegun());
    $fkbList->add(self::musTxttckimlikno());
    $fkbList->add(self::musTxttelefon2());
    $fkbList->add(self::musCrrkredilimit2());
    $fkbList->add(self::musDblcarpan1());
    $fkbList->add(self::musDblcarpan2());
    $fkbList->add(self::musBytmerkezefaturala());
    $fkbList->add(self::musBytmusteristokkodu());
    $fkbList->add(self::musTxtruhsatdaire());
    $fkbList->add(self::musTxtruhsatno());
    $fkbList->add(self::musTxtkapino());
    $fkbList->add(self::musTxterpbolgekod());
    $fkbList->add(self::musTxtkisaad());
    $fkbList->add(self::musBytmaxiskontokont());
    $fkbList->add(self::musBytfiyatyetki());
    $fkbList->add(self::musBytmagazasipbirlestir());
    $fkbList->add(self::musBytmagazabasim());
    $fkbList->add(self::musTxtwww());
    $fkbList->add(self::musTxtbarkod());
    $fkbList->add(self::musBytrut());
    $fkbList->add(self::musLngbolgekod());
    $fkbList->add(self::musTxtmerkezkod());
    $fkbList->add(self::musBytilkod());
    $fkbList->add(self::musLngilkod());
    $fkbList->add(self::musLngilcekod());
    $fkbList->add(self::musBytkdvmuaf());
    $fkbList->add(self::musTxtdiger());
    $fkbList->add(self::musBytsemtkod());
    $fkbList->add(self::musTrhacilis());
    $fkbList->add(self::musTrhkapanis());
    $fkbList->add(self::musBytmerkezilkod());
    $fkbList->add(self::musLngmerkezilkod());
    $fkbList->add(self::musLngmerkezilcekod());
    $fkbList->add(self::musLngmerkezsemtkod());
    $fkbList->add(self::musLngyonetimhiyerarsi1());
    $fkbList->add(self::musLngyonetimhiyerarsi2());
    $fkbList->add(self::musBytuygulamayeri());
    $fkbList->add(self::musBytmerkezden());
    $fkbList->add(self::musLngdagitimsirasi());
    $fkbList->add(self::musLngozelurunkod());
    $fkbList->add(self::musBytcakismakontrolu());
    $fkbList->add(self::musLngharitakod());
    $fkbList->add(self::musBytcekriskoran());
    $fkbList->add(self::musBytsenetriskoran());
    $fkbList->add(self::musBytonay());
    $fkbList->add(self::musBytodemetipi());
    $fkbList->add(self::musBytcalismatip());
    $fkbList->add(self::musLngisakiskod());
    $fkbList->add(self::musLngcekvadegun());
    $fkbList->add(self::musLngvergidairesikod());
    $fkbList->add(self::musTxtgrupkirilimkod());
    $fkbList->add(self::musBytrfcheckaktarim());
    $fkbList->add(self::musLngsatisfaturakota());
    $fkbList->add(self::musBytfaturakapatma());
    $fkbList->add(self::musImgfoto1());
    $fkbList->add(self::musImgfoto2());
    $fkbList->add(self::musLngiptalneden());
    $fkbList->add(self::musBytdurum());
    $fkbList->add(self::musByttip());
    $fkbList->add(self::musTxtpasaportno());
    $fkbList->add(self::musTxtodemetip());
    $fkbList->add(self::musTrhilkislemtarihi());
    $fkbList->add(self::musLngilkkullanicikod());
    $fkbList->add(self::musLngsonkullanicikod());
    $fkbList->add(self::musTxtreferans());
    $fkbList->add(self::musBytversiparisi());
    $fkbList->add(self::musTxtdisttextkod());
    $fkbList->add(self::musTxtdistreferans());
    $fkbList->add(self::musTxtmusterigruptextkod());
    $fkbList->add(self::musTxtmusterigrupreferans());
    $fkbList->add(self::musTxtmusteriekgruptextkod());
    $fkbList->add(self::musTxtmusteriekgrupreferans());
    $fkbList->add(self::musTxtozeluruntextkod());
    $fkbList->add(self::musTxtyonetimhiyerarsitextkod1());
    $fkbList->add(self::musTxtyonetimhiyerarsi1Referans());
    $fkbList->add(self::musTxtyonetimhiyerarsitextkod2());
    $fkbList->add(self::musTxtyonetimhiyerarsi2Referans());
    $fkbList->add(self::musTxtmerkeziltextkod());
    $fkbList->add(self::musTxtilreferans());
    $fkbList->add(self::musTxtmerkezilcetextkod());
    $fkbList->add(self::musTxtmerkezilcereferans());
    $fkbList->add(self::musTxtmerkezsemttextkod());
    $fkbList->add(self::musTxtvergidairesitextkod());
    $fkbList->add(self::musTxtvergidairesireferans());
    $fkbList->add(self::musTxtbolgetextkod());
    $fkbList->add(self::musTxtbolgereferans());
    $fkbList->add(self::musBytefatura());
    $fkbList->add(self::musBytiptalonay());
    $fkbList->add(self::musBytgpsislemyap());
    $fkbList->add(self::musBytteslimatmusterisi());
    $fkbList->add(self::musBytgunluksifmuaf());
    $fkbList->add(self::musBytyilliksifmuaf());
    $fkbList->add(self::musBytstsifmuaf());
    $fkbList->add(self::musBytgonderimtip());
    $fkbList->add(self::musBytdoviztip());
    $fkbList->add(self::musLngteslimatseklikod());
    $fkbList->add(self::musBytkayitizni());
    $fkbList->add(self::musBytiletisimizni());
    $fkbList->add(self::musBytcinsiyet());
    $fkbList->add(self::musBytalissipyuklemekontrol());
    $fkbList->add(self::musBytfiyatsizirsaliyebasim());
    $fkbList->add(self::musBytyasaltakip());
    $fkbList->add(self::musBytsiparacyukolusacakbelge());
    $fkbList->add(self::musBytisemri());
    $fkbList->add(self::musLngdtgun());
    $fkbList->add(self::musLngdtay());
    $fkbList->add(self::musLngdtyil());
    $fkbList->add(self::musLnggarantisure());
    $fkbList->add(self::musBytgarantisure());
    $fkbList->add(self::musLngsaklamaadet());
    $fkbList->add(self::musLngsokmetakmaadet());
    $fkbList->add(self::musLngtekilmusterikod());
    $fkbList->add(self::musTrhsonislemtarihiversiparisi());
    $fkbList->add(self::musTxtonaykod());
    $fkbList->add(self::musBytkayitiznionay());
    $fkbList->add(self::musByttemelticari());
    $fkbList->add(self::musTxtsmscustomerid());
    $fkbList->add(self::musByteirsaliye());
    $fkbList->add(self::musBytgpsislemmuaf());
    $fkbList->add(self::musLngmobilhizmetadedi());
    $fkbList->add(self::musTxtasilaliciunvan());
    $fkbList->add(self::musTxtasilalicivergino());
    $fkbList->add(self::musTxtasilaliciadres());
    $fkbList->add(self::musTrhziyaretsaati());
    $fkbList->add(self::musTrhziyaretsaatibitis());
    $fkbList->add(self::musLngziyaretsure());
    $fkbList->add(self::musBythaftakod());
    $fkbList->add(self::musBytgunkod());
    $fkbList->add(self::musTxttekilkod());
    $fkbList->add(self::musTxtasilalicivergidairesi());
    $fkbList->add(self::musTxtasilsaticiunvan());
    $fkbList->add(self::musTxtasilsaticivergino());
    $fkbList->add(self::musTxtasilsaticiadres());
    $fkbList->add(self::musTxtasilsaticivergidairesi());
    $fkbList->add(self::musTxteirsaliyevarsayilanpk());
    $fkbList->add(self::musTxtefaturavarsayilanpk());
    $fkbList->add(self::musBytmusterianlasmadurumu());
    $fkbList->add(self::musBytkooperatifmusterisi());
    $fkbList->add(self::musBytcrmonaydurumu());
    $fkbList->add(self::musTxtretneden());
    $fkbList->add(self::musTrhruhsatgecerlilik());
    $fkbList->add(self::musTxtulusalticarikod());
    $fkbList->add(self::musBytkamu());
    $fkbList->add(self::musTxtekvn());
    $fkbList->add(self::musBytsevkgunu());
    $fkbList->add(self::musBytkampanyalardanharictut());
    $fkbList->add(self::musLngmahallekod());
    $fkbList->add(self::musTxtulkeadi());
    $fkbList->add(self::musIndexUniqMusLngKod());


    return $fkbList;
  }

  public static function sqTableName(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'sqTableName');
    $fkbCol->addFm(FimFiCol::fcTxHeader(), 'EspMusteri');

    return $fkbCol;
  }

  public static function musLnId(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLnId');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngdistkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGDISTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtdistkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTDISTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musLngerpkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGERPKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxterpkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTERPKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtunvan(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTUNVAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtilgilikisi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTILGILIKISI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtadres1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTADRES1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtadres2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTADRES2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtilce(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTILCE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtsehir(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTSEHIR');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtvd(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTVD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtvn(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTVN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxttelefon(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTTELEFON');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtpostakod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTPOSTAKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtfaks(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTFAKS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtgrupkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTGRUPKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtekgrupkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEKGRUPKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musLngstkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGSTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtstkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTSTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTrhsonislemtarihi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHSONISLEMTARIHI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musDbliskontooran(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musDBLISKONTOORAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musBytvadegun(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTVADEGUN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxttckimlikno(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTTCKIMLIKNO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtilgilikisi2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTILGILIKISI2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtulke(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTULKE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxttelefon2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTTELEFON2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtceptelno(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTCEPTELNO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musCrrkredilimit1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musCRRKREDILIMIT1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musCrrkredilimit2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musCRRKREDILIMIT2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musDblcarpan1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musDBLCARPAN1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musDblcarpan2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musDBLCARPAN2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musBytmerkezefaturala(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMERKEZEFATURALA');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytmusteristokkodu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMUSTERISTOKKODU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtcadde(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTCADDE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtsokak(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTSOKAK');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtruhsatdaire(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTRUHSATDAIRE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtruhsatno(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTRUHSATNO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtkapino(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTKAPINO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxterpbolgekod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTERPBOLGEKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtkisaad(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTKISAAD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytmaxiskontokont(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMAXISKONTOKONT');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytfiyatyetki(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTFIYATYETKI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytmagazasipbirlestir(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMAGAZASIPBIRLESTIR');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytmagazabasim(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMAGAZABASIM');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtemail(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEMAIL');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtwww(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTWWW');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtbarkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTBARKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musBytrut(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTRUT');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngbolgekod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGBOLGEKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtmerkezkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMERKEZKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musBytilkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTILKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngilkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGILKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngilcekod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGILCEKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytkdvmuaf(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKDVMUAF');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtozelkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTOZELKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtmahalle(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMAHALLE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtdiger(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTDIGER');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytsemtkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTSEMTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTrhacilis(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHACILIS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musTrhkapanis(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHKAPANIS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musBytmerkezilkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMERKEZILKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngmerkezilkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGMERKEZILKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngmerkezilcekod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGMERKEZILCEKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngmerkezsemtkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGMERKEZSEMTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngyonetimhiyerarsi1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGYONETIMHIYERARSI1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngyonetimhiyerarsi2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGYONETIMHIYERARSI2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytuygulamayeri(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTUYGULAMAYERI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytmerkezden(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMERKEZDEN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngdagitimsirasi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGDAGITIMSIRASI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngozelurunkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGOZELURUNKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytcakismakontrolu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTCAKISMAKONTROLU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musDblkoordinatx(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musDBLKOORDINATX');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musDblkoordinaty(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musDBLKOORDINATY');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'decimal');

    return $fkbCol;
  }

  public static function musLngharitakod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGHARITAKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytcekriskoran(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTCEKRISKORAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytsenetriskoran(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTSENETRISKORAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytonay(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTONAY');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytodemetipi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTODEMETIPI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytcalismatip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTCALISMATIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngisakiskod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGISAKISKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngcekvadegun(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGCEKVADEGUN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngvergidairesikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGVERGIDAIRESIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtgrupkirilimkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTGRUPKIRILIMKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytrfcheckaktarim(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTRFCHECKAKTARIM');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngsatisfaturakota(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGSATISFATURAKOTA');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytfaturakapatma(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTFATURAKAPATMA');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musImgfoto1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musIMGFOTO1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'image');

    return $fkbCol;
  }

  public static function musImgfoto2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musIMGFOTO2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'image');

    return $fkbCol;
  }

  public static function musLngiptalneden(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGIPTALNEDEN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtgrupad(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTGRUPAD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtekgrupad(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEKGRUPAD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytdurum(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTDURUM');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musByttip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTTIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtpasaportno(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTPASAPORTNO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtodemetip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTODEMETIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTrhilkislemtarihi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHILKISLEMTARIHI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musLngilkkullanicikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGILKKULLANICIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngsonkullanicikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGSONKULLANICIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtreferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytversiparisi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTVERSIPARISI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtdisttextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTDISTTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtdistreferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTDISTREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmusterigruptextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMUSTERIGRUPTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmusterigrupreferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMUSTERIGRUPREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmusteriekgruptextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMUSTERIEKGRUPTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmusteriekgrupreferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMUSTERIEKGRUPREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtozeluruntextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTOZELURUNTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtyonetimhiyerarsitextkod1(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTYONETIMHIYERARSITEXTKOD1');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtyonetimhiyerarsi1Referans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTYONETIMHIYERARSI1REFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtyonetimhiyerarsitextkod2(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTYONETIMHIYERARSITEXTKOD2');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtyonetimhiyerarsi2Referans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTYONETIMHIYERARSI2REFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmerkeziltextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMERKEZILTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtilreferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTILREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmerkezilcetextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMERKEZILCETEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmerkezilcereferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMERKEZILCEREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtmerkezsemttextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTMERKEZSEMTTEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtvergidairesitextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTVERGIDAIRESITEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtvergidairesireferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTVERGIDAIRESIREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtbolgetextkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTBOLGETEXTKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtbolgereferans(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTBOLGEREFERANS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytefatura(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTEFATURA');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytiptalonay(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTIPTALONAY');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytgpsislemyap(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGPSISLEMYAP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytteslimatmusterisi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTTESLIMATMUSTERISI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytgunluksifmuaf(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGUNLUKSIFMUAF');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytyilliksifmuaf(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTYILLIKSIFMUAF');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytstsifmuaf(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTSTSIFMUAF');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytgonderimtip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGONDERIMTIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytdoviztip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTDOVIZTIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngteslimatseklikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGTESLIMATSEKLIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytkayitizni(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKAYITIZNI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytiletisimizni(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTILETISIMIZNI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytcinsiyet(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTCINSIYET');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytalissipyuklemekontrol(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTALISSIPYUKLEMEKONTROL');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytfiyatsizirsaliyebasim(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTFIYATSIZIRSALIYEBASIM');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytyasaltakip(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTYASALTAKIP');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytsiparacyukolusacakbelge(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTSIPARACYUKOLUSACAKBELGE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytisemri(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTISEMRI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngdtgun(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGDTGUN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngdtay(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGDTAY');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngdtyil(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGDTYIL');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLnggarantisure(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGGARANTISURE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBytgarantisure(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGARANTISURE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngsaklamaadet(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGSAKLAMAADET');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngsokmetakmaadet(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGSOKMETAKMAADET');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musLngtekilmusterikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGTEKILMUSTERIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTrhsonislemtarihiversiparisi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHSONISLEMTARIHIVERSIPARISI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musTxtonaykod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTONAYKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytkayitiznionay(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKAYITIZNIONAY');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musByttemelticari(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTTEMELTICARI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtsmscustomerid(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTSMSCUSTOMERID');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musByteirsaliye(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTEIRSALIYE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytgpsislemmuaf(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGPSISLEMMUAF');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngmobilhizmetadedi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGMOBILHIZMETADEDI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtasilaliciunvan(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILALICIUNVAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilalicivergino(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILALICIVERGINO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilaliciadres(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILALICIADRES');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTrhziyaretsaati(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHZIYARETSAATI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musTrhziyaretsaatibitis(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHZIYARETSAATIBITIS');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'datetimeoffset');

    return $fkbCol;
  }

  public static function musLngziyaretsure(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGZIYARETSURE');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musBythaftakod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTHAFTAKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytgunkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTGUNKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxttekilkod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTTEKILKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTxtasilalicivergidairesi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILALICIVERGIDAIRESI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilsaticiunvan(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILSATICIUNVAN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilsaticivergino(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILSATICIVERGINO');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilsaticiadres(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILSATICIADRES');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtasilsaticivergidairesi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTASILSATICIVERGIDAIRESI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxteirsaliyevarsayilanpk(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEIRSALIYEVARSAYILANPK');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musTxtefaturavarsayilanpk(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEFATURAVARSAYILANPK');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytmusterianlasmadurumu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTMUSTERIANLASMADURUMU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytkooperatifmusterisi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKOOPERATIFMUSTERISI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytcrmonaydurumu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTCRMONAYDURUMU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtretneden(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTRETNEDEN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'varchar');

    return $fkbCol;
  }

  public static function musTrhruhsatgecerlilik(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTRHRUHSATGECERLILIK');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'date');

    return $fkbCol;
  }

  public static function musTxtulusalticarikod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTULUSALTICARIKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytkamu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKAMU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musTxtekvn(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTEKVN');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musBytsevkgunu(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTSEVKGUNU');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musBytkampanyalardanharictut(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musBYTKAMPANYALARDANHARICTUT');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'tinyint');

    return $fkbCol;
  }

  public static function musLngmahallekod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musLNGMAHALLEKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'int');

    return $fkbCol;
  }

  public static function musTxtulkeadi(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musTXTULKEADI');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'nvarchar');

    return $fkbCol;
  }

  public static function musIndexUniqMusLngKod(): FiKeybean
  {
    $fkbCol = new FiKeybean();
    $fkbCol->addFm(FimFiCol::fcTxFieldName(), 'musIndexUniqMusLngKod');
    $fkbCol->addFm(FimFiCol::fcTxHeader(), 'musLNGKOD');
    $fkbCol->addFm(FimFiCol::fcTxFieldType(), 'index_uniq');

    return $fkbCol;
  }



  public function genITableCols(): FkbList
  {
    return self::genTableCols();
  }

  public function genITableColsTrans(): FkbList
  {
    return self::genTableColsTrans();
  }
}
