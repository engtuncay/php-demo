<?php
/**
 * kullanıcı kayıt interface
 *
 */
interface userRegister_leyout
{
    /**
     * smarty set eder
     *
     * @param object $smarty
     */
    public function setSmarty(&$smarty);
    /**
     * user set eder
     *
     */
    public function setUser();
    /**
     * kullanıcının unique olup olmadığını test eder
     *
     * @param string $type
     * @param string $value
     */
    public function getUserUnique($type,$value);
    /**
     * login kontrol eder
     *
     */
    public function loginControl();
    /**
     * Çıkış yapar
     *
     * @param object $DB
     */
    public static function logout(&$DB);
}
?>