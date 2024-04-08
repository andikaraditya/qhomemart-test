<?php

/*
# Test PHP - Programmer [Qhomemart] #

Task :
1. Isikan proses di dalam fungsi mergeSortArray() untuk menyatukan array int a dan array int b. Lalu setelah itu di sort secara ascending.
2. Isikan proses di dalam fungsi getMissingData() untuk mencari integer yang hilang berdasarkan pola angka dari hasil fungsi mergeSortArray().
3. Isikan proses di dalam fungsi insertMissingData() untuk memasukkan integer yang hilang dari hasil fungsi getMissingData() ke dalam array hasil fungsi mergeSortArray().
4. Hasil yang diharapkan adalah pola angka yang tersusun tanpa ada integer yang hilang.

Syarat :
1. Tidak menggunakan fungsi bawaan PHP seperti 
	a. array_merge()
	b. array_push()
	c. asort()
	d. dsb.
2. Kerjakan menggunakan logic pemograman anda sendiri

Selamat Mengerjakan
*/

class Test
{
	function mergeSortArray($a, $b)
	{
		foreach ($b as $element) {
			$a[] = $element;
		};

		$n = count($a);
		for ($size = 1; $size < $n; $size = 2 * $size) {
			for ($left = 0; $left < $n - $size; $left += 2 * $size) {
				$mid = $left + $size - 1;
				$right = min($left + 2 * $size - 1, $n - 1);
				$this->merge($a, $left, $mid, $right);
			}
		}

		print_r($a);
		return $a;
	}
	function merge(&$array, $left, $mid, $right)
	{
		$leftSize = $mid - $left + 1;
		$rightSize = $right - $mid;

		$leftArray = array_slice($array, $left, $leftSize);
		$rightArray = array_slice($array, $mid + 1, $rightSize);

		$leftIndex = 0;
		$rightIndex = 0;
		$currentIndex = $left;

		while ($leftIndex < $leftSize && $rightIndex < $rightSize) {
			if ($leftArray[$leftIndex] <= $rightArray[$rightIndex]) {
				$array[$currentIndex++] = $leftArray[$leftIndex++];
			} else {
				$array[$currentIndex++] = $rightArray[$rightIndex++];
			}
		}

		while ($leftIndex < $leftSize) {
			$array[$currentIndex++] = $leftArray[$leftIndex++];
		}

		while ($rightIndex < $rightSize) {
			$array[$currentIndex++] = $rightArray[$rightIndex++];
		}
	}
	function getMissingData($sortedArray)
	{
		$missingData = 0;
		$initial = 11;

		for ($i = 0; $i < count($sortedArray); $i++) {
			if ($sortedArray[$i] !== $initial){
				$missingData = $initial ;
				break;
			} 
			$initial = $initial + (11 + $i + 1);
		}

		echo $missingData . "\n";
		return $missingData;
	}
	function insertMissingData($array, $missingData)
	{
		$initial = 11;
		$newArray = [];

		for ($i = 0; $i < count($array); $i++) {
			if ($array[$i] !== $initial){
				$missingData = $initial ;
				
			}
			$newArray[] = $initial;
			$initial = $initial + (11 + $i + 1);

		}
		$newArray[] = $initial;

		return $newArray;
	}
	public function main()
	{
		$a = array(11, 36, 65, 135, 98);
		$b = array();
		$b[0] = 81;
		$b[1] = 23;
		$b[2] = 50;
		$b[3] = 155;

		$c = $this->mergeSortArray($a, $b);
		$i = $this->getMissingData($c);
		$d = $this->insertMissingData($c, $i);
		
		for ($x = 0; $x < count($d); $x++) {
			echo $d[$x] . " ";
		}
		/*
		*/
	}
}

$t = new Test();
$t->main();
