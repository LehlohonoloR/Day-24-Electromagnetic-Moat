<?php
//Day 24: Electromagnetic Moat By Lehlohonolo Rammego

//Create An Array with file contents
$arry12 = file('ports.txt', FILE_IGNORE_NEW_LINES);
//Initialize an array which will store all possible port connections
$arrayPorts = array();

	//check if the file isn't empty by checking if the array has data
	if (array_key_exists('0', $arry12))
	{
		
		//This loop will be run to loop and check
		//if there is a corresponding number through each elements
		
			foreach ($arry12 as $loopChecker)
			{
				//check if the array contains it or add it
				if (in_array($loopChecker, $arrayPorts)) {
					}
					else
					{
					array_push($arrayPorts, $loopChecker);
					}
					
				//loop through file contents again
				foreach ($arry12 as $line)
				{
						//Split the line into single numbers
						$arrayChar1 = explode('/',$line);
						//Split the loopChecker into single numbers
						$arrayChar = explode('/', $loopChecker);
						//if the second char in line variable is
						//equal to first char in loopChecker
						if ($arrayChar[1] == $arrayChar1[0])
						{
							//push into our collection array
							array_push($arrayPorts, "$loopChecker--$line");
						}
						
				}
		}
		
		//Now we loop against our new array
		 foreach ($arrayPorts as $lines)
			{
				
				//loop through file contents again
				foreach ($arry12 as $line)
				{
					//Get in here only if the loops have this extension --
					if (strpos($line, '--') !== false)
					{
						//Split the line into single numbers
						$arrayChar1 = explode('/',$line);
						//create an array with the split of --
						$arrayChar3 = explode('--', $lines);
						//after the above split further split with / only the second elements
						$arrayChar4 = explode('/', $arrayChar3[1]);
						//if the second element above matches any first element in the initial first array
						if ($arrayChar1[0] == $arrayChar4[1])
						{
							//push into the collection array
							array_push($arrayPorts, "$lines--$line");
						}
					}	
				}	
					
					
			}
			
		
	}

	//initialize Final counts array
	$fnlCounts = array();
	
//here we are about to calculate final counts
foreach ($arrayPorts as $fnlstr)
{
	
	//Get in here only if the loops have this extension --
	//eg. 9/10--10/1
	if (strpos($fnlstr, '--') !== false)
	{
		$arrCalc = explode('--', $fnlstr);
		$arrCalc2 = explode('/', $arrCalc[0]);
		$arrCalc3 = explode('/', $arrCalc[1]);
		
		$fnl= $arrCalc2[0] + $arrCalc2[1] + $arrCalc3[0] + $arrCalc3[1];
		echo "$fnlstr = $fnl<br />";
		array_push($fnlCounts, $fnl);
	}
	else{
		//split string
		$arrCalc21 = explode('/', $fnlstr);
		//calculate final count
		$fnl= $arrCalc21[0] + $arrCalc21[1];
		echo "$fnlstr = $fnl<br />";
		array_push($fnlCounts, $fnl);
	}
	
}
$highestValue = max($fnlCounts);
echo "The Highest Port is ". max($fnlCounts) . "<br>";
?>
