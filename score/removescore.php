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

  if(isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset(
  $_GET['screenshot'])){
	  //获取get的数据
	$id = $_GET['id'];  
	$date = $_GET['date'];
	$name = $_GET['name'];
	$score = $_GET['score'];
	$screenshot = $_GET['screenshot'];
  }
  else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])){
	 // 获取post的数据
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $score = $_POST['score'];	  
  }
  else{
	  echo '<p class="error">没有分数需要删除.</P>';
	}
	
	
   if (isset($_POST['submit'])){
	   if($_POST['confirm'] == '是'){
	
	//删除图片
	@unlink(GW_UPLOADPATH . $screenshot);
	
	//连接数据库
	 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// 删除数据库分数
     $query = "DELETE FROM fenshu WHERE id = $id LIMIT 1";
	 mysqli_query($dbc, $query);

	 mysqli_close($dbc);
	
	//确认是否被删除
	 echo '<p>分数 ' . $score . ' for ' . $name . '成功删除';
	}
	else{
	   echo'<p class="error">已经取消删除.</p>';	
	  }
	}
	
	else if (isset($id) && isset($name) && isset($date) && isset($score)){
	echo '<P>你确定要删除以下分数吗？</p>';
	echo '<p><strong>Name: </strong>' . $name . '<br /><strong>Date: </strong>' . $date .
      '<br /><strong>Score: </strong>' . $score . '</p>';
    echo '<form method="post" action="removescore.php">';
    echo '<input type="radio" name="confirm" value="是" /> 是 ';
    echo '<input type="radio" name="confirm" value="否" checked="checked" /> 否 <br />';
    echo '<input type="submit" value="提交" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $name . '" />';
    echo '<input type="hidden" name="score" value="' . $score . '" />';
    echo '</form>';
  }

  echo '<p><a href="admin.php">&lt;&lt; 返回主页面</a></p>';
?>

</body>
</html>