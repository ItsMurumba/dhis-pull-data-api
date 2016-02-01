<?php

echo "
<style>
h1 {
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 30px;
    text-align: center;
}
table, th , td  {
    border: 1px solid grey;
    border-collapse: collapse;
    padding: 5px;
    align: center;
}
table tr:nth-child(odd)	{
    background-color: #f1f1f1;
}
table tr:nth-child(even) {
    background-color: #ffffff;
}
</style>"; 
	$url = "http://test.hiskenya.org/api/users.json?paging=false";
	$username = "bootcamp2016";
	$password = "Bootcamp2016";
	$ch = curl_init($url);
	if($ch){
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,30);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$data = curl_exec($ch);
		curl_close($ch);	
		// /echo $data;
		//echo"<br /><h2 style='color:red;'>Display The Users via The Api</h2>";
		echo "<link href='css/bootstrap.min.css' rel='stylesheet'";
		echo "<script src = 'js/bootstrap.min.js'></script";
		echo "<script src = 'jquery-1.12.0.min.js'></script";
		
		$result = json_decode($data, true);
		
		if ($result) {
			
			$total = count($result);
			echo "<div class='container-fluid'>";
			echo"<h1>Bootcamp 2016 | API Task</h1>";
			echo "<div class='table table-condensed'>";
			echo "<table align='center' class='table'><tr><th>Name</th><th>uID</th>
			<th>Details</th</tr><tr>";
			
			
			foreach ($result as $key => $value) {
				if (!is_array($value)) {
					echo $key. '=>' . $value . '<br/>';
				}else{
					foreach ($result['users'] as $value) {
						echo '<td>'. $value['name']. '</td>';
						echo '<td>'. $value['id']. '</td>';
						echo '<td><a href="'. $value['href']. '">More details</a></td>';
						echo '</tr>';
							
					}
				}
				
						}
									echo "</div></div></table>";
		}else{
			echo "Keep Trying";
		}
	} else{
		echo "Not Enable";
		}
?>

