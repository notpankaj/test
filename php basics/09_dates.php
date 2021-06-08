<?php

// Print current date
echo date('Y-m-d H:i:s');
echo '<hr>';
// Print yesterday
echo date('Y-m-d H:i:s',time()-60*60*24 - 1*60*60);

echo '<hr>';
// Different format: https://www.php.net/manual/en/function.date.php

// Print current timestamp
echo time();

echo '<hr>';
// Parse date: https://www.php.net/manual/en/function.date-parse.php
$parseDate = date_parse('2021-04-16 10:36:39');
echo '<pre>';
print_r($parseDate);
echo'</pre>';
echo '<hr>';
// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
$dateStr = 'September 04 1999 04:00:00';
$dateStr = date_parse_from_format('F-j-y H:i:s',$dateStr);
echo '<pre>';
print_r($dateStr);
echo'</pre>';
echo '<hr>';