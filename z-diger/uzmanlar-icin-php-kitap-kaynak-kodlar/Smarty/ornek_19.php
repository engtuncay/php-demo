<?php

if(request('controle','POST')==1)
{
    $DB =& Loader::loadClass('db');
    $USERREGISTER = new userRegister($_POST);
   
    $DB->startTransaction();
        $bool = $USERREGISTER->setUser();
    $DB->commit();
    if($bool)
    {
        if(request('user_type_id','POST') == '3')
        {
            pageSetMessage(1,'Üyeliğiniz müşteri hizmetleri tarafından onaylandıktan sonra sistem üzerinde işlemlerinizi yapabilirsiniz.','Uyarı');
            header_destruct('/login');   
        }        
        pageSetMessage(1,'Kayıt işleminiz gerçekleşmiştir.','Onay');
        header_destruct('/member');   
    }
    $errorMessage = $USERREGISTER->getErrorMessage();
    if($errorMessage=='')
        pageSetMessage(0,'Oluşan bir hatadan dolayı işleminiz gerçekleşemedi. Lütfen daha sonra yeniden deneyiniz!');
    else
        pageSetMessage(0,$errorMessage);
    header_destruct('/register&go='.request('user_type_id','POST'));
}

$USERREGISTER = new userRegister($_GET);
$_GET['country_id']='110000000000';
$dataArr = getLocationArr('GET');
$LOCATION = new location($_GET); 
$locationJson = $LOCATION->getLocationJson($dataArr);    
$SMARTY->assign('locationJson',$locationJson);
$SMARTY->assign('locationBirthJson',$locationJson);
$SMARTY->assign('tpl_file', 'user_form.tpl');
displaySmarty($SMARTY,$template);

?>