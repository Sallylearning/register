<?php
    header("content-type:text/html;charset=utf-8");
 
    //开启session
    session_start();

     
    //接收表单传递的用户名和密码
    $name=$_POST['username'];
    $pwd=$_POST['password'];
    $repwd=$_POST['repassword'];
     
    //判断密码是否一致
    if($pwd!=$repwd){
        echo"<script>alert('两次密码输入不一致，请重新输入');</script>";
        echo"<script>location='regform.html'</script>";
        }else{  
            //通过php连接到mysql数据库
            $conn=mysql_connect("localhost","root","");
             
            //选择数据库
            mysql_select_db("www");
 
            //设置客户端和连接字符集
            mysql_query("set names 'utf8'");
 
            //通过php进行insert操作
            $sqlinsert="INSERT INTO user(username,password) VALUES('{$name}','{$pwd}')";
 
        
            //添加用户信息到数据库
            mysql_query($sqlinsert,$conn);
             //通过php进行select操作
            $sqlselect="SELECT * FROM user";
            
            //返回用户信息字符集
            $result=mysql_query($sqlselect,$conn); 

            echo "<h1>USER INFORMATION</h1>";
            echo "<hr>";
            echo "<table width='700px' border='1px'>";
            //从结果中拿出一行
            echo "<tr>";
            echo "<th>ID</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>";
            echo "</tr>";

            while($row=mysql_fetch_array($result)){
                echo "<tr>";
                //打印出$row这一行
                echo "<td>{$row['personID']}</td>
                <td>{$row['username']}</td>
                <td>{$row['password']}</td>";
                 
                echo "</tr>";
            }
            echo "</table>";
 
            //释放连接资源
            mysql_close($conn);
                           
            } 
?>