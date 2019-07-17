// Class To create Parse blogsposts from file 
Class GenerateJSON {
 public static $aOutput = new array();
 
 //Input parameter File name of input text file path with extensiton like abc.text
 function fGenerateJSONMethod($filename) {
	$aArray= new array();
	$sMyfileData = file_get_contents($filename);	
	$rows = explode("\n", $sMyfileData);
	foreach ($sMyfileData as $row) {
	 $aJSONInput = explode(":", $row);   
	 $sKey = $aJSONInput[0];  
	 $sValue = $aJSONInput[1];  
	 $sfindString   = ',';
	 $pos = strpos($sValue, $sfindString);
	 if ($pos !== false) {
	    $sValue = explode(",", $sValue);  
	 }
	 $aArray[$key] = $sValue;
	}	
	SELF::	array_push($aOutput,$aArray);
}
 function fOutputMethod(){
	$sJSONData = JSON_encode (SELF::$aOutput, 1);
	$myfile = fopen("output.txt", "w") ;	
	fwrite($myfile, $aJSONData);
	fclose($myfile);
	return $sJSONData;
 }
}
// End of Class file
//////////////////////////////////////////////////////
//Test Case
$obj = new GenerateJSON ();
$obj->fGenerateJSONMethod('\var\www\abc.text');
$Output= $obj->fOutputMethod();  // we can directly call static variable of class and use json encode it likr json_encode( $GenerateJSON::$aOutput,1);
echo $Output; 


