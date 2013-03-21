
<?php
$handle = fopen("xab", "r");
$outputCount = 1;


echo "\n\n Start!!! \n\n";

$cnt = 0;
$flagP = 0;
while (!feof($handle)) {

	$cnt++;
  	$stream = fread($handle, 1000);
		
	if( strpos( $stream , "INSERT INTO ") ) {
		echo "\n output " .  $cnt. " \n" ;
		echo "\n stream " .  substr($stream, 0, 150 ) . " \n" ;
		$flagP = 1;
	}//end if

	if($flagP > 0) {

		$previousChar = "";
		$byteCount = 0;

		while($byteCount < 1000) {

			echo $stream[$byteCount];
			$char = $stream[$byteCount];
			
			if ( $previousChar == ')' ) {
				if( $char == ',') {
					echo "\n";
				}//end if
			}//end if

			$previousChar = $char;
			$byteCount++;

		}//end foreach 

	}//end if

}//end while

fclose($handle);

echo "\n\n DONZO!!!";

exit;

?>