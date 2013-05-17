<!DOCTYPE html>
<html>
<head>
	<title>Subset Sum Problem</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	   $mtime = microtime(); 
	   $mtime = explode(" ",$mtime); 
	   $mtime = $mtime[1] + $mtime[0]; 
	   $starttime = $mtime; 
	?> 
	<?php
		set_time_limit(120);

		$gcount = 0;

		$set = array(18897109, 12828837, 9461105, 6371773, 5965343, 5946800, 5582170, 5564635, 5268860, 4552402, 4335391, 4296250, 4224851, 4192887, 3439809, 3279833, 3095313, 2812896, 2783243, 2710489, 2543482, 2356285, 2226009, 2149127, 2142508, 2134411);

		$needle = 100000000;
		$sum = 0;

		
		/*$set = array(1, 9, 5, 3, 8);
		$needle = 13;*/
		

		foreach ($set as $k => $v){
			$sum += $v;
		}

		function evaluate_array($s, $sum){
			$arr = array();
			$arr[0] = 0;

			//Psuedo code provided by http://www.cs.utsa.edu/~wagner/CS3343/ss/ss.html
			foreach ($s as $k => $v) {
				echo "testing: " . $v . "<br/>";
				for( $i = 0; $i <= $sum; $i++){
					if( isset($arr[$i]) ){
						if( $arr[$i] != $v && $i + $v < $sum){
							if( !isset($arr[$i + $v]) ){
								$arr[$i + $v] = $v;
							}
						}
					}
				}
			}

			return $arr;
		}

		function solve($set, $sum, $needle){
			$stack = evaluate_array($set, $sum);

			echo "Size: " . sizeof($stack) . "<br/><br/>";
			while ($needle > 0){
				echo $stack[$needle] . "<br/>";
				$needle -= $stack[$needle];
			}
		}

		function brute_force($set, $needle){
			global $gcount;
			$gcount++;
			$sub = array(
				'found' => false
				, 'vals' => array()
				);

			$workset = $set;

			foreach($workset as $k => $v){
				if( $v == $needle){
					$sub['found'] = true;
					array_push($sub['vals'], $v);
					return $sub;
				}else{
					array_shift($workset);
					$r = brute_force($workset, $needle - $v);
					if( $r['found'] ){
						array_push($r['vals'], $v);
						return $r;
					}
				}
			}

			return $sub;

		}

		function solve_bf($set, $needle){
			global $gcount;
			$sub = brute_force($set, $needle);
			$sum = 0;
			foreach($sub['vals'] as $k => $v){
				echo $v . "<br/>";
				$sum += $v;
			}

			echo "<br/>Sum: " . $sum;
			echo "<br/># Recursions: " . $gcount;
		}

		//solve($set, $sum, $needle);
		solve_bf($set, $needle);


	?>
	<?php 
	   $mtime = microtime(); 
	   $mtime = explode(" ",$mtime); 
	   $mtime = $mtime[1] + $mtime[0]; 
	   $endtime = $mtime; 
	   $totaltime = ($endtime - $starttime); 
	   echo "<br/><br/>This page was created in ".$totaltime." seconds."; 
	?>
</body>
</html>