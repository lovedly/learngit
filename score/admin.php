<?php
  require_once('authorize.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

//数据库连接
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  $query = "SELECT * FROM fenshu ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);
  
  if (!$data) {
 printf("Error: %s\n", mysqli_error($dbc));
 exit();
}
  echo '<table>';
while($row = mysqli_fetch_array($data)) {
	  echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
	  echo '<td>' . $row['date'] . '</td>';
	  echo '<td>' . $row['score'] . '</td>';
	  echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' . $row['screenshot'] . '">删除</a>';	
	  if ($row['approved'] == '0'){
	 echo ' / <a href="approvescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
        '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' .
        $row['screenshot'] . '">批准</a>';
    }
    echo '</td></tr>';
  }	  

  echo'</table>';


  mysqli_close($dbc);


?>
</body>
</html>