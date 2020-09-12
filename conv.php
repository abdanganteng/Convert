<?php

// Reference:
// http://blog.celingest.com/en/2014/02/12/new-ses-en>

// We assume we have already created a new IAM user a>
// and Secret keys.

if ($argc<3) die("Usage: $argv[0] {aws_key} {aws_secr>

$key=$argv[1];
$secret=$argv[2];
$message="SendRawEmail";
$versionInBytes = chr(2);
$signatureInBytes = hash_hmac('sha256', $message, $se>
$signatureAndVer = $versionInBytes.$signatureInBytes;
$smtpPassword = base64_encode($signatureAndVer);

echo "SMTP User: ".$key.PHP_EOL;
echo "SMTP Password: ".$smtpPassword.PHP_EOL;

// Then, we create a new file from the Linux console >
//
// chmod +x ses.php
//
// ./ses.php AKIAIOSFODNN7EXAMPLE wJalrXUtnFEMI/K7MDE>
//
// SMTP User: AKIAIOSFODNN7EXAMPLE
// SMTP Password: An60U4ZD3sd4fg+FvXUjayOipTt8LO4rUUm>
//
// This way we will get a valid username and password>
// using SMTP.

?>
