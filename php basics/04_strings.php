<?php

// Create simple string

// String concatenation

// String functions
// $str = "     boom bam     ";
// echo strlen($str);
// echo trim($str);
// echo ltrim($str);
// echo rtrim($str);
// echo str_word_count($str);
// echo strrev($str);
// echo strtoupper($str);
// echo strtolower('BOOM BAM@');
// echo ucfirst("baaaa  baaa caa");
// echo lcfirst('BAAA BAAA CAAA');
// echo ucwords($str);
// echo strpos($str,"bam");
// echo stripos($str,"bAm");
// echo substr($str,6);
// echo str_replace('bam','blast',$str);
// echo str_ireplace('Bam','blast',$str);


// Multiline text and line breaks
$p = "Hello my name is <b>pankaj</b>.
     im <b>21</b>.
      i  love <b>sleaping</b>";

// echo nl2br($p);
// echo "<hr>";
// echo htmlentities($p);
// echo "<hr>";
// echo nl2br(htmlentities($p));

echo html_entity_decode("im &lt;b&gt;21&lt;/b&gt");
// Multiline text and reserve html tags

// https://www.php.net/manual/en/ref.strings.php