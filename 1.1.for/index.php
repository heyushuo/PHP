<?php
	echo '<table width="800" height="200" border="1" >';
	for ($i=1;$i<=9;$i++){
		echo "<tr>";
		
		
		for($j=1;$j<$i+1;$j++){
			echo "<td>";
			echo $i.'x'.$j ."=".$i*$j;
			echo "</td>";
		}
		echo "</tr>";
	}
	echo '</table>'
?>