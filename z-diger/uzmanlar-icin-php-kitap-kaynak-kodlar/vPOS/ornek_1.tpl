<html>
<head>
	<title>Ödeme Sayfası</title>
	<style type="text/css">
{literal}
select,input{border:1px solid #CCCCCC;padding:1px;}
input.w40px{width:40px}
{/literal}
	</style>
</head>
<body>
<script type="text/javascript" src="/js/payment_test.js"></script>
<form name="mainForm" action="https://banka.com.tr/3Dsecure" method="POST" onsubmit="return sub()">
  <input type="hidden" name="pan" />
  <table style="width:100%;clear:both" align="center">
    <tr>
      <td class="padLeft20px"><table class="marRight25px">
          <tr>
            <td>Ödenecek tutar</td>
            <td>:</td>
            <td>{$amount}</td>
          </tr>
          <tr>
            <td width="155" id="lb" height="30">Kart Sahibi</td>
            <td id="cb" class="padLeft10px">:</td>
            <td><input autocomplete="off" name="card_holder_name" id="card_holder_name" type="text" maxlength="30" class="w115px" /></td>
          </tr>
          <tr>
            <td height="30" nowrap>Kredi Kartı Numarası</td>
            <td class="padLeft10px">:</td>
            <td><input class="w40px" autocomplete="off" name="card_number_1" onKeyUp="nextItem('card_number_1',4,'card_number_2');" type="text" maxlength="4" />
              &nbsp;
              <input class="w40px" autocomplete="off" name="card_number_2" onKeyUp="nextItem('card_number_2',4,'card_number_3')" type="text" maxlength="4" />
              &nbsp;
              <input class="w40px" autocomplete="off" name="card_number_3" onKeyUp="nextItem('card_number_3',4,'card_number_4')" type="text" maxlength="4" />
              &nbsp;
              <input class="w40px" autocomplete="off" name="card_number_4" onKeyUp="nextItem('card_number_4',4,'cv2')" type="text" maxlength="4" />
              &nbsp; </td>
          </tr>
          <tr>
            <td height="30">Güvenlik Numarasi(CVV)</td>
            <td class="padLeft10px">:</td>
            <td><input autocomplete="off" name="cv2" id="card_cvv" type="text" onKeyUp="nextItem('cv2',3,'Ecom_Payment_Card_ExpDate_Month')" maxlength="3" class="w40px" /></td>
          </tr>
          <tr>
            <td height="30">Son Kullanma Tarihi</td>
            <td class="padLeft10px padRight10px">:</td>
            <td><select class="w55px" name="Ecom_Payment_Card_ExpDate_Month" id="card_month">
                <option value="">---</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              &nbsp;&nbsp;&nbsp;
              &nbsp;
              <select class="w55px" name="Ecom_Payment_Card_ExpDate_Year" id="card_year">
                    <option value="">---</option>                                                  
	{php}
	$year = date('y');							
	for($i=$year; $i<$year+5;$i++)
	{
	$yearval=$i;								
	if(strlen($yearval)==1){$yearval="0".$yearval;}							print "<option value=\"{$yearval}\">{$yearval}</option>\n";
	}
	{/php}
               </select>
            </td>
          </tr>
          <tr>
            <td height="30">Kart Tipi</td>
            <td class="padLeft10px">:</td>
            <td><select name="cardType" id="card_type" class="w132px">
                <option value="">--Seçiniz--</option>
                <option value="1">Visa</option>
                <option value="2">Master</option>
              </select>
            </td>
          </tr>
          <tr>
            <td valign="top">Ödeme Tipi</td>
            <td valign="top">:</td>
            <td valign="top"><select name="bankAccount_id" onChange="PAYMENT.getBankRate(this.value,0)">
                <option value="">Tek ödeme</option>                                                                      
      	{section name=n loop=$bankAccountArr}                    
                <option value="{$bankAccountArr[n].id}">{$bankAccountArr[n].bankName}</option>
            	{/section}                  
              </select>
              <br />
              <br />
              <div id="rateDiv"></div></td>
          </tr>
          <tr id="button">
            <td colspan="2"></td>
            <td height="30"><input type="submit" value="SATIN AL" /> </td>
          </tr>
        </table></td>
      <td></td>
    </tr>
  </table>
  <input type="hidden" name="payment_transaction_type" id="payment_transaction_type" value="200" />
  <input type="hidden" name="clientid" value="{$clientId}" />
  <input type="hidden" name="oid" value="{$oid}" />
  <input type="hidden" name="okUrl" value="{$okUrl}" />
  <input type="hidden" name="failUrl" value="{$failUrl}" />
  <input type="hidden" name="rnd" value="{$rnd}" />
  <input type="hidden" name="hash" value="{$hash}" >
  <input type="hidden" name="storetype" value="3d" />
  <input type="hidden" name="amount" value="{$amount}" />
</form>
<script type="text/javascript">
{literal}
function nextItem(currObj,maxLen,nextObj)
{
	currObj = document.mainForm.elements[currObj];
	nextObj = document.mainForm.elements[nextObj];
	if(currObj.value.length==maxLen) nextObj.focus();
}
function sub(){
	var f = document.mainForm;
	var len=f.length;
	for(var i=0;i<len;i++){
		if(f[i].type!='hidden' && f[i].value ==''){
			alert("Lütfen alanı doldurun.");
			f[i].focus();
			return false;
		}
	}
	return true;
}
{/literal}
</script>
</div>
</div>
</body>
</html>
