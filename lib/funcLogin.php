<?php
function checkData($db, $username, $password){
    $sql = $db->prepare('SELECT id, password, type, picture FROM user WHERE id = :username');
    $sql->bindParam(':username', $username);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result) == 1){
         if ($password == $result[0]['password']) {
            return array(true, $result[0]['id'], $result[0]['type'], $result[0]['picture']);
         }else{
             return false;
         }
    }
}