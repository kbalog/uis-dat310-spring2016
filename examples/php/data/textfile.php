<?php
/**
 * Writing and reading textfiles
 */

// Write data to textfile
$filename = "testfile.txt";
$fh = fopen($filename, 'w') or die("can't open file");
fwrite($fh, "12\tJohn\t1981-04-02\n");
fwrite($fh, "23\tMary\t1991-02-22\n");
fwrite($fh, "44\tJacob\t1987-11-12\n");
fclose($fh);

// Read data from textfile (line-by-line)
$fhandle = fopen($filename, "r");
while (!feof($fhandle)) {
    $buffer = fgets($fhandle, 4096);
    $line = trim($buffer); // remove end line character
    echo $line . "\n";
}
fclose($fhandle);
