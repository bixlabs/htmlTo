<?php

$openshift = true;
if ($openshift) {
  $fileNameAndExtension = 'form.pdf';
  $domain = 'http://exporthtmlto-bixsolutions.rhcloud.com';
  $run_command = '~/app-root/data/phantomjs/bin/phantomjs generatePDF.js';
} else {
  $fileNameAndExtension = 'form.pdf';
  $domain = 'http://localhost/investigo/technicalSupportForm';
  $run_command = 'phantomjs generatePDF.js';
}

$url = $domain.'/technicalSupportForm/index.html?'.$_SERVER['QUERY_STRING'];  //.$_SERVER['QUERY_STRING'];
if (isset($_REQUEST['url'])) {
  $url = $_REQUEST['url'];
}


if (isset($_REQUEST['fileNameAndExtension'])) {
  $fileNameAndExtension = $_REQUEST['fileNameAndExtension'];
}

$allcommand = $run_command.' "'.$url.'" '.$fileNameAndExtension;
exec($allcommand);
echo "{formUrl:'{$domain}/{$fileNameAndExtension}'}";
?>