<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Product;
use Core\Model\Transaction;
use Core\Model\Sale;


class Sales extends Controller

{  
        protected $request_body;

        protected $http_code = 200;



        protected $response_schema = array(

                "success" => true,

                "message_code" => "",

                "body" => []
                

        );

       

        public function render()

        {

               

                header("Content-Type: application/json");

                http_response_code($this->http_code);

                echo json_encode($this->response_schema);

               

               

        }



        function __construct()

        {

                $this->request_body = json_decode(file_get_contents("php://input", true));

               

                   

        }
        public function index()
    {
        try {
            $transaction= new Transaction;

            $result = $transaction->connection->prepare("SELECT * FROM users_transaction WHERE user_id=?");
           $result->get_result();
            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("sql_response_error");
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                        $result[] = $row;
                    }
                } else {
                    $this->http_code = 404;
                }

                $this->response_schema['body'] = $transaction;
                $this->response_schema['message_code'] = "items_collected_successfuly";
            }
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    /**
     * Get single items
     *
     * @return void
     */
    public function single()
    {
    }

    /**
     * Creates an item
     *
     * @return void
     */
    public function create()
    {

        try {
            $product= new Product;
          $product_select->get_by_id($this->request_body->id);
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }
            $transaction= new Transaction;
            $total= ($this->request_body->quantity)*($product_select->cost_price);
            $value=array(

                "product_id"=>$this->request_body->id,
                "product_name"=>$product_select->product_name,
                "total"=>$total,
                "quantity"=>$this->request_body->quantity,
                "price"=>$product_select->price

            );
                $stmt = $transaction->connection->prepare("UPDATE products SET Quantity =?
                 WHERE id=?");
                 $stmt->bind_param('ii',$new_quantity,$request_product_id);
                 $stmt->execute();
                 $result=$stmt->get_result();
                 $stmt->close();
    
    
    $transaction->create($value);
    $user_id=$this->request_body->user_id;
    $this->response_schema['body'] =$transaction->get_by_id($transaction_id);
    $this->response_schema['message_code'] = "all transactions collect";

$transaction->connection->prepare("INSERT INTO transactions  VALUES ('$value')");
                 $transaction->execute();
                 $transaction->get_result();
                 $transaction->close();

                 

        } catch (\Exception $error) 
        {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
  
    }
    /**
     * Updates an item
     *
     * @return void
     */
    public function update()
    {

        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            $product = $this->get_item_by_id($this->request_body->id);

            if (empty($product)) {
                $this->http_code = 404;
                throw new \Exception('item_not_found');
            }

            
            if (!$this->db->submit_query("UPDATE transactions SET $value WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('item_was_not_updated');
            }

            $this->response_schema['message_code'] = "item_was_updated";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }

    /**
     * deletes an item
     *
     * @return void
     */
    public function delete()
    {
        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            if (!$this->db->submit_query("DELETE FROM transactions WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('item_was_not_deleted');
            }

            $this->response_schema['message_code'] = "item_was_deleted";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }

    protected function get_item_by_id($id)
    {
        $result = $this->db->submit_query("SELECT * FROM transactions WHERE id=$id");
        return $result->fetch_object(); // this will get the item and return it. 
    }
}