<?php
//通过参数形式连接数据库
function connect()
{
    try
    {
        $dsn = 'mysql:host=localhost;dbname=dxbb';
        $username = 'root';
        $passwd = '';
        $pdo = new PDO($dsn, $username, $passwd);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    return $pdo;
}
?>