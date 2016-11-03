<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
   <h2>添加你的分数：</h2>
   
<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_POST['submit'])){
	 //连接数据库
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  or die('Error connecting to MySQL server.');
	 
	  
	//获取输入的分数
	$name = mysqli_real_escape_string($dbc, trim($_POST['name']));
	$score = mysqli_real_escape_string($dbc,trim( $_POST['score']));
	$screenshot = mysqli_real_escape_string($dbc,trim($_FILES['screenshot']['name'])) ;
	$screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size']; 
	
  if (!empty($name) && is_numeric($score) && !empty($screenshot)){
	   if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
       if ($_FILES['screenshot']['error'] == 0) {
	  $target = GW_UPLOADPATH . $screenshot;
	  
	  if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)){
	
	//数据写入数据库
	$query = "INSERT INTO fenshu (date, name, score, screenshot) VALUES (NOW(), '$name', '$score', '$screenshot')";
	mysqli_query($dbc, $query);
	
	//确认输入的信息
	echo '<p>感谢您添加新的高分！</p>';
	echo '<p><strong>姓名：</strong>' .$name . '<br/>';
	echo '<p><strong>分数：</strong>' .$score . '</p>';
	echo '<img src="' . GW_UPLOADPATH . $screenshot. '"alt="分数图"/></p>';
	echo '<p><a href="index.php">&lt;&lt; 回到主页面</a></p>';
	
	//清除表格数据
	$name ="";
	$score = "";
	$screenshot = "";
	
	mysqli_close($dbc);
	  
  }
  else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to add your high score.</p>';
    }
  }
  


?>

 <hr />
<form  enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 <input type="hidden" name="MAX_FILE_SIZE" value=="100000" />
 <label for="name">姓名：</label>
 <input type="text" name="name" id="name" value="<?php if (!empty($name)) echo $name; ?>" /><br/>
 <label for="score">分数：</label>
 <input type="text" name="score" id="score" value="<?php if (!empty($score)) echo $score ;?>" /><br/>
 <label for="screenshot">截图：</label>
 <input type="file" id="screenshot" name="screenshot"/>
 
 <hr/>
 <input type="submit" value="确定" name="submit"/>
 
</form>
</body>
</html>