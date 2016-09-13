<?php

// $clientLibraryPath = 'CAS-1.3.2/'; // change to this where the CAS-1.1.1 is actually located
// $oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath);
// import phpCAS lib
include_once('lib/CAS-1.3.2/CAS.php');

phpCAS::setDebug();
// phpCAS::client(CAS_VERSION_2_0, 'cas.uwaterloo.ca', 443, '/cas');
// phpCAS::client(CAS_VERSION_2_0, 'cas.uwaterloo.ca', 443, '/cas');
// use this server version instead if you want to retrieve CAS attributes:
phpCAS::client(SAML_VERSION_1_1, 'cas.uwaterloo.ca', 443, '/cas');


// we recommend that you fetch the CA certificate appropriate to the UW cas server you are using and reference that
// phpCAS::setCasServerCACert('/etc/pki/tls/certs/globalsignchain.crt');
// otherwise no SSL validation for the CAS server
phpCAS::setNoCasServerValidation();

phpCAS::forceAuthentication();
$uw_user = phpCAS::getAttributes();
// $username = phpCAS::getUser();
// $username = fred
/* See phpCAS::getAttributes() to retrieve:
   Array
   (
      [name] => Fred Astaire
      [dept] => Human Resources
      [username] => fred
      [email] => fred.astaire@uwaterloo.ca
      [phone] => 519-888-4567 x12345
      [office] => GSC 1001
   )
*/