<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="style.css"/>
</head>

<body>
  <h2> 高分 </h2>
  <p>欢迎尊敬的会员,如果你有更高的分数，请<a href="addscore.php">点击添加您的分数</a>.</p>
  <hr/>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');
  
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  or die('Error connecting to MySQL server.');
  
  $query = "SELECT * FROM fenshu WHERE approved = 1 ORDER BY score DESC, date ASC";
  $data =mysqli_query($dbc, $query)
  or die('Error querying database.');

  echo '<table>';
  $i = 0;
  while ($row = mysqli_fetch_array($data)){
    if($i == 0){
		echo '<tr><td colspan="2" class="topscoreheader">最高分： '  .$row['score'].  '</td></tr>' ;
	
	}
	 echo '<tr><td class="scoreinfo">';
	 echo '<span class="score">' . $row['score'] . '</span><br/>'; 
	 echo '<strong>Name:</strong> ' . $row['name'] . '<br/>';
	 echo '<strong>Date:</strong> ' . $row['date'] . '</td>';
	  
	   if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
		   
		
		 echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
    }
		
		 else {
      echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
    }
	$i++;
  }
  echo '</table>';
  
  mysqli_close($dbc);
?>
 
 
 
</body>
</html>