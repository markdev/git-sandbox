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

$hexNum = base_convert($memNum, 10, 16);
if(strstr('abcdef', $hexNum)) {
	$hexNum = ucfirst($hexNum);
	}

$decNum = base_convert($memNum, 10, 10);
?>

<script>
function showDec() {
document.getElementById('displayDec').value = "<?php echo $decNum; ?>";
}

function showHex() {
document.getElementById('displayHex').value = "<?php echo $hexNum; ?>";
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
echo "<input type=\"button\" id=\"numCheck\" value=\"Show Dec\" onclick=\"showDec()\">";
echo "<input type=\"text\" id=\"displayDec\">";

echo "<br/>";
echo "<input type=\"button\" id=\"numCheck\" value=\"Show Hex\" onclick=\"showHex()\">";
echo "<input type=\"text\" id=\"displayHex\">";

echo "<br/><br/>";
echo "<form action=\"binaryTest.php\" method=\"POST\">";
echo "<input type=\"submit\" name=\"reset\" value=\"New Number\">";
echo "</form>";
?>
