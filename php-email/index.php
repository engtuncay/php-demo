<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

  <style>
    .divIsBasvuruFormuHeader {
      font-size: 15px;
      font-weight: bold;
      color: #D4050D;
    }

    .td1 {
      width: 225px;
      vertical-align: bottom;
      font-size: 13px;
      font-weight: bold;
      padding: 8px;
      height: 30px;
    }

    .td2 {
      width: 525px;
      vertical-align: bottom;
      font-size: 13px;
      font-weight: bold;
      padding: 8px;
      height: 30px;
    }

    .td2 input[type="text"] {
      border: solid 1px #ccc;
      width: 300px;
      height: 30px;
      padding: 5px;
    }

    .td2 input[type="text"]:focus,
    .td2 input[type="text"].focus {
      border-bottom: solid 3px #ccc;
      width: 300px;
      height: 30px;
      outline: none;
      padding: 5px;
    }

    .td11 {
      width: 525px;
      vertical-align: bottom;
      font-size: 13px;
      font-weight: bold;
      padding: 8px;
    }

    .hr1 {
      width: 650px;
      vertical-align: bottom;
    }

    .td110 {
      width: 25px;
      vertical-align: bottom;
      font-size: 13px;
      font-weight: bold;
      padding: 8px;
      height: 30px;
    }

    .td111 {
      width: 150px;
      vertical-align: bottom;
      font-size: 13px;
      font-weight: bold;
      padding: 8px;
      height: 30px;
    }

    .td1111 input[type="text"] {
      border: solid 1px #ccc;
      width: 120px;
      height: 25px;
      padding: 2px;
    }

    .td1111 input[type="text"]:focus,
    .td1111 input[type="text"].focus {
      border-bottom: solid 3px #ccc;
      width: 120px;
      height: 25px;
      outline: none;
      padding: 2px;
    }

    .td2checkbox1 {
      width: 20px;
      vertical-align: bottom;
    }

    .td2checkbox2 {
      width: 300px;
      vertical-align: bottom;
      font-size: 13px;
    }
  </style>

  <section class="service-details-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-12 pe-xl-5">
          <div class="service-details-contents">
            <div class="service-contact-form">
              <div class="contact-form">
                <h2>İş Başvuru Formu</h2>
                <form action="" method="post" class="basic-grey">
                  <div id="divIsBasvuruFormu">
                    <table style="width:700px;">
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">Kişisel Bilgileriniz
                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td1">
                                      TC No
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="TCNo" name="TCNo" placeholder="TC No" maxlength="11" type="text"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57' />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Adı Soyadı
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="AdıSoyadı" name="AdıSoyadı" placeholder="Adı Soyadı" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Baba Adı
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="BabaAdı" name="BabaAdı" placeholder="Baba Adı" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Doğum Yeri
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="DoğumYeri" name="DoğumYeri" placeholder="Doğum Yeri" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Doğum Tarihi
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <table style="width:150px;">
                                        <tr>
                                          <td style="vertical-align:bottom;">
                                            <select class="custom-dropdown" id="DoğumTarihiGün" name="DoğumTarihiGün">
                                              <option value="">Gün</option>
                                              <option value="01">
                                                01
                                              </option>
                                              <option value="02">
                                                02
                                              </option>
                                              <option value="03">
                                                03
                                              </option>
                                              <option value="04">
                                                04
                                              </option>
                                              <option value="05">
                                                05
                                              </option>
                                              <option value="06">
                                                06
                                              </option>
                                              <option value="07">
                                                07
                                              </option>
                                              <option value="08">
                                                08
                                              </option>
                                              <option value="09">
                                                09
                                              </option>
                                              <option value="10">
                                                10
                                              </option>
                                              <option value="11">
                                                11
                                              </option>
                                              <option value="12">
                                                12
                                              </option>
                                              <option value="13">
                                                13
                                              </option>
                                              <option value="14">
                                                14
                                              </option>
                                              <option value="15">
                                                15
                                              </option>
                                              <option value="16">
                                                16
                                              </option>
                                              <option value="17">
                                                17
                                              </option>
                                              <option value="18">
                                                18
                                              </option>
                                              <option value="19">
                                                19
                                              </option>
                                              <option value="20">
                                                20
                                              </option>
                                              <option value="21">
                                                21
                                              </option>
                                              <option value="22">
                                                22
                                              </option>
                                              <option value="23">
                                                23
                                              </option>
                                              <option value="24">
                                                24
                                              </option>
                                              <option value="25">
                                                25
                                              </option>
                                              <option value="26">
                                                26
                                              </option>
                                              <option value="27">
                                                27
                                              </option>
                                              <option value="28">
                                                28
                                              </option>
                                              <option value="29">
                                                29
                                              </option>
                                              <option value="30">
                                                30
                                              </option>
                                              <option value="31">
                                                31
                                              </option>
                                            </select>
                                          </td>
                                          <td style="width:25px; vertical-align:bottom;">
                                            /
                                          </td>
                                          <td style="vertical-align:bottom;">
                                            <select class="custom-dropdown" id="DoğumTarihiAy" name="DoğumTarihiAy">
                                              <option value="">Ay</option>
                                              <option value="01">
                                                01
                                              </option>
                                              <option value="02">
                                                02
                                              </option>
                                              <option value="03">
                                                03
                                              </option>
                                              <option value="04">
                                                04
                                              </option>
                                              <option value="05">
                                                05
                                              </option>
                                              <option value="06">
                                                06
                                              </option>
                                              <option value="07">
                                                07
                                              </option>
                                              <option value="08">
                                                08
                                              </option>
                                              <option value="09">
                                                09
                                              </option>
                                              <option value="10">
                                                10
                                              </option>
                                              <option value="11">
                                                11
                                              </option>
                                              <option value="12">
                                                12
                                              </option>
                                            </select>
                                          </td>
                                          <td style="width:25px; vertical-align:bottom;">
                                            /
                                          </td>
                                          <td style="vertical-align:bottom;">
                                            <select class="custom-dropdown" id="DoğumTarihiYıl" name="DoğumTarihiYıl">
                                              <option value="">Yıl</option>
                                              <option value="1960">
                                                1960
                                              </option>
                                              <option value="1961">
                                                1961
                                              </option>
                                              <option value="1962">
                                                1962
                                              </option>
                                              <option value="1963">
                                                1963
                                              </option>
                                              <option value="1964">
                                                1964
                                              </option>
                                              <option value="1965">
                                                1965
                                              </option>
                                              <option value="1966">
                                                1966
                                              </option>
                                              <option value="1967">
                                                1967
                                              </option>
                                              <option value="1968">
                                                1968
                                              </option>
                                              <option value="1969">
                                                1969
                                              </option>
                                              <option value="1970">
                                                1970
                                              </option>
                                              <option value="1971">
                                                1971
                                              </option>
                                              <option value="1972">
                                                1972
                                              </option>
                                              <option value="1973">
                                                1973
                                              </option>
                                              <option value="1974">
                                                1974
                                              </option>
                                              <option value="1975">
                                                1975
                                              </option>
                                              <option value="1976">
                                                1976
                                              </option>
                                              <option value="1977">
                                                1977
                                              </option>
                                              <option value="1978">
                                                1978
                                              </option>
                                              <option value="1979">
                                                1979
                                              </option>
                                              <option value="1980">
                                                1980
                                              </option>
                                              <option value="1981">
                                                1981
                                              </option>
                                              <option value="1982">
                                                1982
                                              </option>
                                              <option value="1983">
                                                1983
                                              </option>
                                              <option value="1984">
                                                1984
                                              </option>
                                              <option value="1985">
                                                1985
                                              </option>
                                              <option value="1986">
                                                1986
                                              </option>
                                              <option value="1987">
                                                1987
                                              </option>
                                              <option value="1988">
                                                1988
                                              </option>
                                              <option value="1989">
                                                1989
                                              </option>
                                              <option value="1990">
                                                1990
                                              </option>
                                              <option value="1991">
                                                1991
                                              </option>
                                              <option value="1992">
                                                1992
                                              </option>
                                              <option value="1993">
                                                1993
                                              </option>
                                              <option value="1994">
                                                1994
                                              </option>
                                              <option value="1995">
                                                1995
                                              </option>
                                              <option value="1996">
                                                1996
                                              </option>
                                              <option value="1997">
                                                1997
                                              </option>
                                              <option value="1998">
                                                1998
                                              </option>
                                              <option value="1999">
                                                1999
                                              </option>
                                              <option value="2000">
                                                2000
                                              </option>
                                              <option value="2001">
                                                2001
                                              </option>
                                              <option value="2002">
                                                2002
                                              </option>
                                              <option value="2003">
                                                2003
                                              </option>
                                              <option value="2004">
                                                2004
                                              </option>
                                              <option value="2005">
                                                2005
                                              </option>
                                              <option value="2006">
                                                2006
                                              </option>
                                              <option value="2007">
                                                2007
                                              </option>
                                              <option value="2008">
                                                2008
                                              </option>
                                              <option value="2009">
                                                2009
                                              </option>
                                              <option value="2010">
                                                2010
                                              </option>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Ehliyet Sınıfı
                                    </td>
                                    <td class="td2">
                                      <input id="EhliyetSınıfı" name="EhliyetSınıfı" placeholder="Ehliyet Sınıfı"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Medeni Durum ve Çocuk Sayısı
                                    </td>
                                    <td class="td2">
                                      <input id="MedeniDurumveÇocukSayısı" name="MedeniDurumveÇocukSayısı"
                                        placeholder="Medeni Durum ve Çocuk Sayısı" maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Sabıkanız Var Mı?
                                    </td>
                                    <td class="td2">
                                      <input id="SabıkanızVarMı" name="SabıkanızVarMı" placeholder="Sabıkanız Var Mı?	"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Askerlik Durumu
                                    </td>
                                    <td class="td2">
                                      <input id="AskerlikDurumu" name="AskerlikDurumu" placeholder="Askerlik Durumu	"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">İletişim Bilgileriniz
                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td1">
                                      Cep Telefonu
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="CepTelefonu" name="CepTelefonu" placeholder="Cep Telefonu"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      E-Posta
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="EPostaAdresiniz" name="EPostaAdresiniz" placeholder="E-Posta"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Ev Adresi
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="EvAdresi" name="EvAdresi" placeholder="Ev Adresi" maxlength="500"
                                        type="text" />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">Eğitim Bilgileriniz
                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td1">
                                      Branş (Meslek)
                                    </td>
                                    <td class="td2">
                                      <input id="BranşMeslek" name="BranşMeslek" placeholder="Branş (Meslek)"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Öğrenim Durumu
                                    </td>
                                    <td class="td2">
                                      <input id="ÖğrenimDurumu" name="ÖğrenimDurumu" placeholder="Öğrenim Durumu"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Bilgisayar Kullanımı
                                    </td>
                                    <td class="td2">
                                      <input id="BilgisayarKullanımı" name="BilgisayarKullanımı"
                                        placeholder="Bilgisayar Kullanımı" maxlength="500" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Pazarlama Tecrübeniz
                                    </td>
                                    <td class="td2">
                                      <input id="PazarlamaTecrübeniz" name="PazarlamaTecrübeniz"
                                        placeholder="Pazarlama Tecrübeniz" maxlength="500" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Gaziantep Bölge Bilginiz
                                    </td>
                                    <td class="td2">
                                      <input id="GaziantepBölgeBilginiz" name="GaziantepBölgeBilginiz"
                                        placeholder="Gaziantep Bölge Bilginiz" maxlength="500" type="text" />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">İş Tecrübeniz

                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td110">
                                      #
                                    </td>
                                    <td class="td111">
                                      Çalışma Dönemi
                                    <td>
                                    <td class="td111">
                                      Şirket
                                    <td>
                                    <td class="td111">
                                      Göreviniz
                                    <td>
                                    <td class="td111">
                                      Ayrılma Sebebi
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      1
                                    </td>
                                    <td class="td1111">
                                      <input id="ÇalışmaDönemi1" name="ÇalışmaDönemi1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket1" name="Şirket1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Göreviniz1" name="Göreviniz1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="AyrılmaSebebi1" name="AyrılmaSebebi1" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      2
                                    </td>
                                    <td class="td1111">
                                      <input id="ÇalışmaDönemi2" name="ÇalışmaDönemi2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket2" name="Şirket2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Göreviniz2" name="Göreviniz2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="AyrılmaSebebi2" name="AyrılmaSebebi2" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      3
                                    </td>
                                    <td class="td1111">
                                      <input id="ÇalışmaDönemi3" name="ÇalışmaDönemi3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket3" name="Şirket3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Göreviniz3" name="Göreviniz3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="AyrılmaSebebi3" name="AyrılmaSebebi3" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">Referanslarınız
                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td110">
                                      #
                                    </td>
                                    <td class="td111">
                                      Adı Soyadı
                                    <td>
                                    <td class="td111">
                                      Şirket
                                    <td>
                                    <td class="td111">
                                      Göreviniz
                                    <td>
                                    <td class="td111">
                                      Cep Telefonu
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      1
                                    </td>
                                    <td class="td1111">
                                      <input id="AdıSoyadı1" name="AdıSoyadı1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket1_1" name="Şirket1_1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Görev1" name="Görev1" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Telefon1" name="Telefon1" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      2
                                    </td>
                                    <td class="td1111">
                                      <input id="AdıSoyadı2" name="AdıSoyadı2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket2_2" name="Şirket2_2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Görev2" name="Görev2" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Telefon2" name="Telefon2" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                  <tr>
                                    <td class="td110">
                                      3
                                    </td>
                                    <td class="td1111">
                                      <input id="AdıSoyadı3" name="AdıSoyadı3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Şirket3_3" name="Şirket3_3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Görev3" name="Görev3" maxlength="250" type="text" />
                                    <td>
                                    <td class="td1111">
                                      <input id="Telefon3" name="Telefon3" maxlength="250" type="text" />
                                    <td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">Gelir Bilgileriniz
                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td1">
                                      Eviniz
                                    </td>
                                    <td class="td2">
                                      <div>
                                        <select class="custom-dropdown" id="Eviniz" name="Eviniz">
                                          <option value="">Seçiniz</option>
                                          <option value="Kira">Kira</option>
                                          <option value="Kendi Malım">Kendi Malım</option>
                                          <option value="Ailemin">Ailemin</option>
                                          <option value="Diğer">Diger</option>
                                        </select>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Üzerinize Kayıtlı Gayrimenkul Var Mı?
                                    </td>
                                    <td class="td2">
                                      <input id="ÜzerinizeKayıtlıGayrimenkulVarMı"
                                        name="ÜzerinizeKayıtlıGayrimenkulVarMı"
                                        placeholder="Üzerinize Kayıtlı Gayrimenkul Var Mı?" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Varsa Değeri
                                    </td>
                                    <td class="td2">
                                      <input id="VarsaDeğeri" name="VarsaDeğeri" placeholder="Varsa Değeri"
                                        maxlength="250" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Şirketimizin Hangi Bölümünde Çalışabilirsiniz
                                    </td>
                                    <td class="td2">
                                      <table>
                                        <tr>
                                          <td>
                                            <table>
                                              <tr>
                                                <td class="td2checkbox1">
                                                  <input type="checkbox" id="SıcakSatış" value="Sıcak Satış">
                                                </td>
                                                <td class="td2checkbox2">
                                                  Sıcak Satış
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <table>
                                              <tr>
                                                <td class="td2checkbox1">
                                                  <input type="checkbox" id="SoğukSatış" value="Soğuk Satış">
                                                </td>
                                                <td class="td2checkbox2">
                                                  Soğuk Satış
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <table>
                                              <tr>
                                                <td class="td2checkbox1">
                                                  <input type="checkbox" id="Dağıtım" value="Dağıtım">
                                                </td>
                                                <td class="td2checkbox2">
                                                  Dağıtım
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <table>
                                              <tr>
                                                <td class="td2checkbox1">
                                                  <input type="checkbox" id="Diğer" value="Diğer">
                                                </td>
                                                <td class="td2checkbox2">
                                                  <input id="DiğerBölüm" placeholder="Diğer" maxlength="250" type="text"
                                                    style="width:275px;" />
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Daha Önceki İşyerinde Aldığınız Maaş Tutarı ?
                                    </td>
                                    <td class="td2">
                                      <input id="DahaÖncekiİşyerindeAldığınızMaaşTutarı"
                                        name="DahaÖncekiİşyerindeAldığınızMaaşTutarı"
                                        placeholder="Daha Önceki İşyerinde Aldığınız Maaş Tutarı" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Ne Kadar Maaş Giderlerinizi Karşılar ?
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="NeKadarMaaşGiderleriniziKarşılar"
                                        name="NeKadarMaaşGiderleriniziKarşılar"
                                        placeholder="Ne Kadar Maaş Giderlerinizi Karşılar" maxlength="250"
                                        type="text" />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td11">
                          <div>
                            <div class="divIsBasvuruFormuHeader">Diğer Bilgiler

                              <div>
                                <hr class="hr1" />
                                <table>
                                  <tr>
                                    <td class="td1">
                                      Hayattaki İdealiniz
                                    </td>
                                    <td class="td2">
                                      <input id="Hayattakiİdealiniz" name="Hayattakiİdealiniz"
                                        placeholder="Hayattaki İdealiniz" maxlength="500" type="text" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="td1">
                                      Eklemek İstediğiniz
                                      <font style="color:red;">*</font>
                                    </td>
                                    <td class="td2">
                                      <input id="Eklemekİstediğiniz" name="Eklemekİstediğiniz"
                                        placeholder="Eklemek İstediğiniz" maxlength="500" type="text" />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="height:15px;">
                        </td>
                      </tr>
                      <tr>
                        <td style="width:300px;">

                        </td>
                        <td>
                          <input type="button" name="gonder" value="Gönder" class="btn"
                            onclick="_sendIsBasvuruFormu();" />
                        </td>
                      </tr>
                    </table>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>

    function _showMessageBoxWarning(message) {
      sweetAlert("Eksik Bilgileri Doldurunuz !", message, "warning");
      return false;
    }

    function _showMessageBoxSuccess2(message) {
      sweetAlert("{$vars.missing}", message, "success");
    }

    function _showMessageBoxSuccess(message) {
      sweetAlert("Başarılı", message, "success");
    }

    function _showMessageBoxError(message) {
      sweetAlert("{$vars.error}", message, "error");
    }

    function _showMessageBoxInfo(message) {
      sweetAlert("{$vars.information}", message, "error");
    }

    function _isValidEmail(email) {
      if (email == null) {
        return false;
      }

      if (email == "") {
        return false;
      }

      if (email.indexOf("@") < 0) {
        return false;
      }

      return true;
    }

    function _getIsBasvuruFormuSablon() {
      return "<table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>Kişisel Bilgileriniz</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>{$vars.tcno}</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[TCNo]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Adı Soyadı</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[AdıSoyadı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Baba Adı</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[BabaAdı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Doğum Yeri</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[DoğumYeri]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Doğum Tarihi</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[DoğumTarihi]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Ehliyet Sınıfı</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[EhliyetSınıfı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Medeni Durum ve Çocuk Sayısı</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[MedeniDurumveÇocukSayısı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Sabıkanız Var Mı?</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[SabıkanızVarMı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Askerlik Durumu</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[AskerlikDurumu]</td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>İletişim Bilgileriniz</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Cep Telefonu</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[CepTelefonu]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>E-Posta Adresiniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[EPostaAdresiniz]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Ev Adresi</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[EvAdresi]</td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>Eğitim Bilgileriniz</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Branş (Meslek)</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[BranşMeslek]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Öğrenim Durumu</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[ÖğrenimDurumu]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Bilgisayar Kullanımı</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[BilgisayarKullanımı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Pazarlama Tecrübeniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[PazarlamaTecrübeniz]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Gaziantep Bölge Bilginiz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[GaziantepBölgeBilginiz]</td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>İş Tecrübeniz</td></tr><tr><td colspan='3'><table style='border: 1px solid #ccc; width:100%;'><tr><td style='vertical-align:bottom; font-weight:bold; color:black; width:25px;'>#</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Çalışma Dönemi</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Şirket</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Göreviniz</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Ayrılma Sebebi</td></tr><tr><td style='width:25px;'>1</td><td style='width:25%;'>[ÇalışmaDönemi1]</td><td style='width:25%;'>[Şirket1]</td><td style='width:25%;'>[Göreviniz1]</td><td style='width:25%;'>[AyrılmaSebebi1]</td></tr><tr><td style='width:25px;'>2</td><td style='width:25%;'>[ÇalışmaDönemi2]</td><td style='width:25%;'>[Şirket2]</td><td style='width:25%;'>[Göreviniz2]</td><td style='width:25%;'>[AyrılmaSebebi2]</td></tr><tr><td style='width:25px;'>3</td><td style='width:25%;'>[ÇalışmaDönemi3]</td><td style='width:25%;'>[Şirket3]</td><td style='width:25%;'>[Göreviniz3]</td><td style='width:25%;'>[AyrılmaSebebi3]</td></tr></table></td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>Referanslarınız</td></tr><tr><td colspan='3'><table style='border: 1px solid #ccc; width:100%;'><tr><td style='vertical-align:bottom; font-weight:bold; color:black; width:25px;'>#</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Adı Soyadı</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Şirket</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Görev</td><td style='vertical-align:bottom; font-weight:bold; color:black; width:25%;'>Telefon</td></tr><tr><td style='width:25px;'>1</td><td style='width:25%;'>[AdıSoyadı1]</td><td style='width:25%;'>[Şirket1_1]</td><td style='width:25%;'>[Görev1]</td><td style='width:25%;'>[Telefon1]</td></tr><tr><td style='width:25px;'>2</td><td style='width:25%;'>[AdıSoyadı2]</td><td style='width:25%;'>[Şirket2_2]</td><td style='width:25%;'>[Görev2]</td><td style='width:25%;'>[Telefon2]</td></tr><tr><td style='width:25px;'>3</td><td style='width:25%;'>[AdıSoyadı3]</td><td style='width:25%;'>[Şirket3_3]</td><td style='width:25%;'>[Görev3]</td><td style='width:25%;'>[Telefon3]</td></tr></table></td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>Gelir Bilgileriniz</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Eviniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[Eviniz]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Üzerinize Kayıtlı Gayrimenkul Var Mı?</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[ÜzerinizeKayıtlıGayrimenkulVarMı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Varsa Değeri</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[VarsaDeğeri]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Şirketimizin Hangi Bölümünde Çalışabilirsiniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[ŞirketimizinHangiBölümündeÇalışabilirsiniz]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Daha Önceki İşyerinde Aldığınız Maaş Tutarı ?</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[DahaÖncekiİşyerindeAldığınızMaaşTutarı]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Ne Kadar Maaş Giderlerinizi Karşılar ?</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[NeKadarMaaşGiderleriniziKarşılar]</td></tr></table><br/><table style='border: 1px solid #ccc; width:100%;'><tr><td colspan='3' style='border: 1px solid #ccc; vertical-align:bottom; font-weight:bold; color:red;'>Diğer Bilgiler</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Hayattaki İdealiniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[Hayattakiİdealiniz]</td></tr><tr><td style='border: 1px solid #ccc; width:300px; vertical-align:bottom; font-weight:bold; color:black;'>Eklemek İstediğiniz</td><td style='border: 1px solid #ccc; vertical-align:bottom;'>[Eklemekİstediğiniz]</td></tr></table>";
    }

    function _sendIsBasvuruFormu() {

      if ($("#TCNo").val().trim().length < 11) {
        return _showMessageBoxWarning("Lütfen TC Numaraınızı Giriniz !");
      }

      var DoğumTarihiGünValue = $("#DoğumTarihiGün").val();
      var DoğumTarihiAyValue = $("#DoğumTarihiAy").val();
      var DoğumTarihiYılValue = $("#DoğumTarihiYıl").val();

      // if ($("#AdıSoyadı").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_name_surname}");*}
      // }
      //
      // if ($("#BabaAdı").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_father_name}");*}
      // }
      //
      // if ($("#DoğumYeri").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_birth_place}");*}
      // }
      //

      // if (DoğumTarihiGünValue.length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_birth_day}");*}
      // }
      //

      // if (DoğumTarihiAyValue.length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_birth_month}");*}
      // }
      //

      // if (DoğumTarihiYılValue.length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_birth_year}");*}
      // }
      //
      // if ($("#CepTelefonu").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_phone}");*}
      // }
      //
      // if (!_isValidEmail($("#EPostaAdresiniz").val().trim()))
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_email}");*}
      // }
      //
      // if ($("#EvAdresi").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_home_address}");*}
      // }
      //
      // if ($("#NeKadarMaaşGiderleriniziKarşılar").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_salary_reach}");*}
      // }
      //
      // if ($("#Eklemekİstediğiniz").val().trim().length == 0)
      // {
      //{*    return _showMessageBoxWarning("{$vars.enter_want_to_add}");*}
      // }
      //

      var ŞirketimizinHangiBölümündeÇalışabilirsinizVal = "";
      if ($("#SıcakSatış").is(":checked")) {
        ŞirketimizinHangiBölümündeÇalışabilirsinizVal += "Sıcak Satış <br/>"
      }
      if ($("#SoğukSatış").is(":checked")) {
        ŞirketimizinHangiBölümündeÇalışabilirsinizVal += "Soğuk Satış <br/>"
      }
      if ($("#Dağıtım").is(":checked")) {
        ŞirketimizinHangiBölümündeÇalışabilirsinizVal += "Dağıtım <br/>"
      }
      if ($("#Diğer").is(":checked")) {
        ŞirketimizinHangiBölümündeÇalışabilirsinizVal += "Diğer : " + $("#DiğerBölüm").val() + " <br/>"
      }

      //Kişisel Bilgileriniz
      var TCNo = $("#TCNo").val();

      var AdiSoyadi = $("#AdıSoyadı").val();
      var BabaAdı = $("#BabaAdı").val();
      var DoğumYeri = $("#DoğumYeri").val();
      var DoğumTarihi = DoğumTarihiGünValue + "/" + DoğumTarihiAyValue + "/" + DoğumTarihiYılValue;
      var EhliyetSınıfı = $("#EhliyetSınıfı").val();
      var MedeniDurumveÇocukSayısı = $("#MedeniDurumveÇocukSayısı").val();
      var SabıkanızVarMı = $("#SabıkanızVarMı").val();
      var AskerlikDurumu = $("#AskerlikDurumu").val();

      //İletişim Bilgileriniz
      var CepTelefonu = $("#CepTelefonu").val();
      var EPostaAdresiniz = $("#EPostaAdresiniz").val();
      var EvAdresi = $("#EvAdresi").val();

      //Eğitim Bilgileriniz
      var BranşMeslek = $("#BranşMeslek").val();
      var ÖğrenimDurumu = $("#ÖğrenimDurumu").val();
      var BilgisayarKullanımı = $("#BilgisayarKullanımı").val();
      var PazarlamaTecrübeniz = $("#PazarlamaTecrübeniz").val();
      var GaziantepBölgeBilginiz = $("#GaziantepBölgeBilginiz").val();

      //İş Tecrübeniz
      var ÇalışmaDönemi1 = $("#ÇalışmaDönemi1").val();
      var Şirket1 = $("#Şirket1").val();
      var Göreviniz1 = $("#Göreviniz1").val();
      var AyrılmaSebebi1 = $("#AyrılmaSebebi1").val();

      var ÇalışmaDönemi2 = $("#ÇalışmaDönemi2").val();
      var Şirket2 = $("#Şirket2").val();
      var Göreviniz2 = $("#Göreviniz2").val();
      var AyrılmaSebebi2 = $("#AyrılmaSebebi2").val();

      var ÇalışmaDönemi3 = $("#ÇalışmaDönemi3").val();
      var Şirket3 = $("#Şirket3").val();
      var Göreviniz3 = $("#Göreviniz3").val();
      var AyrılmaSebebi3 = $("#AyrılmaSebebi3").val();

      //Referanslarınız
      var AdıSoyadı1 = $("#AdıSoyadı1").val();
      var Şirket1_1 = $("#Şirket1_1").val();
      var Görev1 = $("#Görev1").val();
      var Telefon1 = $("#Telefon1").val();

      var AdıSoyadı2 = $("#AdıSoyadı2").val();
      var Şirket2_2 = $("#Şirket2_2").val();
      var Görev2 = $("#Görev2").val();
      var Telefon2 = $("#Telefon2").val();

      var AdıSoyadı3 = $("#AdıSoyadı3").val();
      var Şirket3_3 = $("#Şirket3_3").val();
      var Görev3 = $("#Görev3").val();
      var Telefon3 = $("#Telefon3").val();


      //Gelir Bilgileriniz
      var Eviniz = $("#Eviniz").val();
      var ÜzerinizeKayıtlıGayrimenkulVarMı = $("#ÜzerinizeKayıtlıGayrimenkulVarMı").val();
      var VarsaDeğeri = $("#VarsaDeğeri").val();
      var ŞirketimizinHangiBölümündeÇalışabilirsiniz = ŞirketimizinHangiBölümündeÇalışabilirsinizVal;
      var DahaÖncekiİşyerindeAldığınızMaaşTutarı = $("#DahaÖncekiİşyerindeAldığınızMaaşTutarı").val();
      var NeKadarMaaşGiderleriniziKarşılar = $("#NeKadarMaaşGiderleriniziKarşılar").val();

      //Diğer Bilgiler
      var Hayattakiİdealiniz = $("#Hayattakiİdealiniz").val();
      var Eklemekİstediğiniz = $("#Eklemekİstediğiniz").val();

      var dataValue = _getIsBasvuruFormuSablon();
      dataValue = dataValue.replace("[TCNo]", TCNo);
      dataValue = dataValue.replace("[AdıSoyadı]", AdiSoyadi);
      dataValue = dataValue.replace("[BabaAdı]", BabaAdı);
      dataValue = dataValue.replace("[DoğumYeri]", DoğumYeri);
      dataValue = dataValue.replace("[DoğumTarihi]", DoğumTarihi);
      dataValue = dataValue.replace("[EhliyetSınıfı]", EhliyetSınıfı);
      dataValue = dataValue.replace("[MedeniDurumveÇocukSayısı]", MedeniDurumveÇocukSayısı);
      dataValue = dataValue.replace("[SabıkanızVarMı]", SabıkanızVarMı);
      dataValue = dataValue.replace("[AskerlikDurumu]", AskerlikDurumu);
      dataValue = dataValue.replace("[CepTelefonu]", CepTelefonu);
      dataValue = dataValue.replace("[EPostaAdresiniz]", EPostaAdresiniz);
      dataValue = dataValue.replace("[EvAdresi]", EvAdresi);
      dataValue = dataValue.replace("[BranşMeslek]", BranşMeslek);
      dataValue = dataValue.replace("[ÖğrenimDurumu]", ÖğrenimDurumu);
      dataValue = dataValue.replace("[BilgisayarKullanımı]", BilgisayarKullanımı);
      dataValue = dataValue.replace("[PazarlamaTecrübeniz]", PazarlamaTecrübeniz);
      dataValue = dataValue.replace("[GaziantepBölgeBilginiz]", GaziantepBölgeBilginiz);
      dataValue = dataValue.replace("[ÇalışmaDönemi1]", ÇalışmaDönemi1);
      dataValue = dataValue.replace("[Şirket1]", Şirket1);
      dataValue = dataValue.replace("[Göreviniz1]", Göreviniz1);
      dataValue = dataValue.replace("[AyrılmaSebebi1]", AyrılmaSebebi1);
      dataValue = dataValue.replace("[ÇalışmaDönemi2]", ÇalışmaDönemi2);
      dataValue = dataValue.replace("[Şirket2]", Şirket2);
      dataValue = dataValue.replace("[Göreviniz2]", Göreviniz2);
      dataValue = dataValue.replace("[AyrılmaSebebi2]", AyrılmaSebebi2);
      dataValue = dataValue.replace("[ÇalışmaDönemi3]", ÇalışmaDönemi3);
      dataValue = dataValue.replace("[Şirket3]", Şirket3);
      dataValue = dataValue.replace("[Göreviniz3]", Göreviniz3);
      dataValue = dataValue.replace("[AyrılmaSebebi3]", AyrılmaSebebi3);
      dataValue = dataValue.replace("[AdıSoyadı1]", AdıSoyadı1);
      dataValue = dataValue.replace("[Şirket1_1]", Şirket1_1);
      dataValue = dataValue.replace("[Görev1]", Görev1);
      dataValue = dataValue.replace("[Telefon1]", Telefon1);
      dataValue = dataValue.replace("[AdıSoyadı2]", AdıSoyadı2);
      dataValue = dataValue.replace("[Şirket2_2]", Şirket2_2);
      dataValue = dataValue.replace("[Görev2]", Görev2);
      dataValue = dataValue.replace("[Telefon2]", Telefon2);
      dataValue = dataValue.replace("[AdıSoyadı3]", AdıSoyadı3);
      dataValue = dataValue.replace("[Şirket3_3]", Şirket3_3);
      dataValue = dataValue.replace("[Görev3]", Görev3);
      dataValue = dataValue.replace("[Telefon3]", Telefon3);
      dataValue = dataValue.replace("[Eviniz]", Eviniz);
      dataValue = dataValue.replace("[ÜzerinizeKayıtlıGayrimenkulVarMı]", ÜzerinizeKayıtlıGayrimenkulVarMı);
      dataValue = dataValue.replace("[VarsaDeğeri]", VarsaDeğeri);
      dataValue = dataValue.replace("[ŞirketimizinHangiBölümündeÇalışabilirsiniz]", ŞirketimizinHangiBölümündeÇalışabilirsiniz);
      dataValue = dataValue.replace("[DahaÖncekiİşyerindeAldığınızMaaşTutarı]", DahaÖncekiİşyerindeAldığınızMaaşTutarı);
      dataValue = dataValue.replace("[NeKadarMaaşGiderleriniziKarşılar]", NeKadarMaaşGiderleriniziKarşılar);
      dataValue = dataValue.replace("[Hayattakiİdealiniz]", Hayattakiİdealiniz);
      dataValue = dataValue.replace("[Eklemekİstediğiniz]", Eklemekİstediğiniz);

      //alert(dataValue);

      //   var xmlHttp = new XMLHttpRequest();
      //   xmlHttp.onreadystatechange = function () {
      //     if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

      //       //$response = json_decode(xmlHttp.responseText);
      //       console.log(xmlHttp.responseText);
      //       let response = $.parseJSON(xmlHttp.responseText);

      //       if (response.result == "1") {
      //         _showMessageBoxSuccess("İş başvuru talebiniz başarılı bir şekilde iletildi.");
      //         console.log(response)
      //       } else {
      //         _showMessageBoxInfo(xmlHttp.responseText);
      //         console.log(response);
      //       }
      //     }
      //   }

      //   xmlHttp.open("post", "./extorsoft/ajaxProcessor.php", true);
      //   xmlHttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      //   let queryString = "process=IS_BASVURU_FORMU&data=" + dataValue + "&AdiSoyadi=" + AdıSoyadı + "&EPostaAdresiniz=" + EPostaAdresiniz + "&TCNo=" + TCNo;
      //   console.log(queryString);
      //   xmlHttp.send(queryString);
      // }
      //});

      $.post("./extorsoft/ajaxProcessor.php", { process: "IS_BASVURU_FORMU", data: dataValue, adiSoyadi: AdiSoyadi, ePostaAdresiniz: EPostaAdresiniz, tcNo: TCNo })
        .done(function (data) {
          //alert("Data Loaded: " + data);
          console.log(data);

          if (data.result == "1") {
            _showMessageBoxSuccess("İş başvuru talebiniz başarılı bir şekilde iletildi.");
            console.log(data)
          } else {
            _showMessageBoxInfo("Başarısız");
            console.log(response);
          }

        })
        .fail(function () {
          alert("error")
        });

    }

  </script>

</body>

</html>