<?php 
#header('Content-type: text/xml');
$xmlstr = "
<?xml version='1.0' encoding='utf-8' standalone='yes'?>
<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/'
xmlns:bfg='http://www.betfair.com/publicapi/v3/BFGlobalService/'>
<soapenv:header/>
<soapenv:Body>
<bfg:login>
<bfg:request>
<ipAddress>0</ipAddress >
<locationId >0</locationId >
<password >N2009Lab</password >
<productId>82</productId>
<username >igormarlus</username >
<vendorSoftwareId>0</vendorSoftwareId >
</bfg:request>
</bfg:login>
</soapenv:Body>
</soapenv:Envelope>
";
?>

 
 
