<?php
/* mathfunctions.php
   Author: Phong Tran
   Created: 27/9/23
*/


function factorial($n)
{ // declare the factorial function
	$result = 1; // declare and initialise the result variable
	$factor = $n; // declare and initialise the factor variable
	while ($factor > 1) { // loop to multiple all factors until 1
		$result = $result * $factor;
		$factor--; // next factor
	} // Note that the factor 1 is not multiplied
	return $result;
}

function isPositiveInteger($n) // declare the function that takes a parameter
{
	$result = false;
	if (is_numeric($n)){ //use the inbuilt function is numeric which returns boolean
		if ($n == floor($n)){
			if ($n > 0){
				$result = true;
			}
		}
	}		
	return $result; // function execution will end here if -ve or non-integer
}


?>