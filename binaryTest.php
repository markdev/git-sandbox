<?php
/*1) Establish a number
2) Make that number visible upon a click
3) Make something separate that resets the number
*/

//first generate a random number
if (isset($_POST['reset'])) {
	$origNum = rand(0,15);
	$memNum = $origNum;
}
?>

<script>
function showNum() {
	var field = document.getElementById('numCheck').value;
	field = "foo!!";
}
</script>

<?php
//now convert to binary
$origBin = base_convert($memNum, 10, 2);

//get strlen and string of zeroes
$zeroesNum = 4 - strlen($origBin);
$zeroString = "";
for($i=1; $i<=$zeroesNum; $i++) {
	$zeroString = $zeroString . "0";
}
$binOut = $zeroString . $origBin;
echo $binOut;

echo "<br/><br/>";
echo "<input type=\"button\" id=\"numCheck\" value=\"Check\" onclick=\"showNum()\">";
echo "<input type=\"text\" name=\"display\">";

echo "<br/><br/>";
echo "<form action=\"binaryTest.php\" method=\"POST\">";
echo "<input type=\"submit\" name=\"reset\" value=\"New Number\">";
echo "</form>";
?>
