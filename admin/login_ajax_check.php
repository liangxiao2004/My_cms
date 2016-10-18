
<?php

session_start();

// 1. 检查验证码
$code = $_GET['code'];
if( $code != "" && $code == $_SESSION['session_code']){ // 通过检查

// 2. 检查用户名是否存在
$user_name = $_GET['user_name'];
// 引用连接速记文件
include_once "common/db.php";
if( $user_name != "" ){
$sql = "select count(*) as amount from user where user_name = '{$user_name}'";
$result = mysqli_query($link, $sql);
$arr_user = mysqli_fetch_array($result, MYSQL_ASSOC);
}
if( $user_name == "" || $arr_user['amount'] > 0 ){
echo "user_existed"; // 用户存在
} else {
echo "ok";  // 通过检查，可以注册
}
}else {
echo "code_error";
}
?>
</body>
</html>