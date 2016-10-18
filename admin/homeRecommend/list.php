<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台欢迎页</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/content.css" />
    <link rel="stylesheet" href="../css/public.css">

    <style>
        a{
            display: inline-block;
        }
    </style>

</head>
<body marginwidth="0" marginheight="0">

<?php

include_once "../common/checklogin.php";
include_once "../common/db.php";
include_once "../common/function.php";


$sql = "select * from home_recommend where 1 "; // 查询语句
$result = mysqli_query($link, $sql);
$arr_recommend = mysqli_fetch_all($result, MYSQL_ASSOC);


?>

<div class="container">



    <div class="public-nav">您当前的位置：<a href="">管理首页</a>><a href="">首页推荐</a></div>
    <div class="public-content">
        <div class="clearfix"></div>
        <div class="public-content-cont">
            <table class="public-cont-table">
                <tr>
                    <th>类型</th>
                    <th>操作</th>
                </tr>
                <?

                if (count($arr_recommend) > 0) {
                    foreach ($arr_recommend as $val) {
                        echo "<tr>";
                        echo "<td>". $val['type']."</td>";
                        ?>
                        <td>
                            <div class="table-fun">
                                <a href="edit.php?id=<?php echo $val['id'];?>">编辑</a>&nbsp;
                            </div>
                        </td>
                        <?
                        echo " </tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>