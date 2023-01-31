<?php

namespace Core\Model;

use Core\Base\Model;

class Transaction extends Model
{
    public function get_transactions_user($id):array
    {
        $data=array();
        $result = $this->connection->query("SELECT * FROM transactions WHERE user_id=$id AND created_at>=CURDATE()" ); 
 if($result->num_rows > 0){
    while ($row =$result->fetch_object())
    {
        $data[]=$row;
        }
 }
 return $data;

    }
}