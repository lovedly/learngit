<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>寻找丢失的小猫</title>
</head>

<body>
  <h2>寻找丢失的小猫</h2>
  
  <?php
   
  $name = $_POST['yourname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $description = $_POST['description'];
  $mycat = $_POST['mycat'];
  $email = $_POST['email'];
  $other = $_POST['other'];
  
  
     $dbc = mysqli_connect('localhost','root','61602604hu','test')
	  or die ('Error connecting to MySQL server.');
     
   $query = "INSERT INTO usedata (name, whenithappened, howlong, " .
    "description, mycat, email, other) " .
    "VALUES ('$name', '$when_it_happened', '$how_long',  " .
    "'$description', '$mycat', '$email','$other')";
   
  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

  mysqli_close($dbc);
  
  
  echo '谢谢提交信息.</br/>';
  echo '姓名：'.$name.'<br/>';
  echo '时间:'.$when_it_happened.'<br/>';
  echo '过去了多久:'. $how_long.'<br/>';
  echo '描述他们:'. $description.'<br/>';
  echo '猫在哪里吗？:'.$mycat.'<br/>';
  echo '你的邮箱:'. $email.'<br/>';
  echo '其他信息：'.$other;
  ?>
</body>
</html>