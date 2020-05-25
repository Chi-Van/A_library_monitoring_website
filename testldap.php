//domain name(or URL),account,password should replace with actual string
<?php
//For testing the AD server is work or not
$ldaphost="domain name";
$ldapconn=ldap_connect($ldaphost);
if($ldapconn)
	echo "Connect success<br>";
else
	echo "Connect Failure";
//For simplification,you can wirte $ldapconn = ldap_connect($ldaphost)or die("Could not connect to ".$ldaphost);
//rdn:relative distinguished name
$User="account";
$ldaprdn=$User."@".$ldaphost;
$ldappass="password";
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
//Reference:http://php.net/manual/en/function.ldap-bind.php
if ($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }
}
ldap_close($ldapconn);
?>
