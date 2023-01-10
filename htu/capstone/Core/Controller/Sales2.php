<?php

namespace Core\Controller;
use Core\Model\Product;
use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Sale;
use Core\Model\Transaction;


class Sales extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }

        /**
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
                
               $this->permissions(['tag:create']);
                $this->view = 'sales.index';
                $product = new product; // new model product
                $this->data['products'] = $product->get_all();
                $this->data['user_id'] =$_SESSION['user']['user_id'];
                $sale=new Sale;
                $transaction= new Transaction;
                $this->data['all_transactions']= $transaction->get_transactions_user($_SESSION['user']['user_id']);
               
        }

        public function single()
        {
               // $this->permissions(['user:read']);
               /*  $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']); */
        }

        /**
         * Display the HTML form for item creation
         *
         * @return void
         */
        public function create()
        {
              //  $this->permissions(['user:create']);
               /*  $this->view = 'users.create'; */
        }

        /**
         * Creates new item
         *
         * @return void
         */
        public function store()
        {
 
                // $this->permissions(['tag:create']);
var_dump($_POST['values']);
die;
                
                $values= explode(",",$_POST['values']);
              
                $_POST['product_name']= $values[0];
                $_POST['price']= (int)$values[1];
                $_POST['product_id']=(int)$values[2];





                unset($_POST['values']);
                // var_dump($_POST['quantity']);

                // die;
                
                if(empty($_POST)){
                        Helper::redirect('/sales');
                        exit;
                }else{
                        $product = new Product();
                        $id=$_POST['product_id'];
                        $selected_item= $product->get_by_id($_POST['product_id']);
                        $stock_quantity=$selected_item->quantity;
                        $new_quantitiy=$_POST['quantity'];
                        if($new_quantitiy>$stock_quantity){
                                $_SESSION['error']="there is no quantitiy enough in stock";
                                Helper::redirect('/sales');
                                die;
                        }else{
                                $updated_quantity=$stock_quantity-$new_quantitiy;
                        }
                        $new_quantitiy=$stock_quantity;
                        //$sales = new Sale();
                        $transaction = new Transaction();
                        $_POST['total']= (int)$_POST['price']*(int)$_POST['quantity'];
                        $sale->create($_POST); 
 
                       $transaction_id = $transaction->get_by_id($transaction->connection->insert_id);
                       $transaction_id = $transaction_id->id; 
                       $user_id = $_SESSION['user']['user_id'];
                       $transaction->connection->query("INSERT INTO users_transaction (transaction_id, user_id) VALUES ($Transaction_id ,$user_id)");
                       $item->connection->query("UPDATE products SET quantity=$updated_quantity WHERE id=$id");
                       Helper::redirect('/sales');
                }
                
                //$this->permissions(['user:create']);
         
        
}
        /**
         * Display the HTML form for item update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['transaction:update']);
                $this->view = 'sellings.edit';
                $item = new selling; 
                $this->data['item'] = $item->get_by_id($_GET["id"]);
               
        }

        /**
         * Updates the item
         *
         * @return void
         */
        public function update()
        {
                $transaction = new Transaction;
                $_POST['total']= (int)$_POST['price']*(int)$_POST['quantity'];
                $transaction->update($_POST);
                Helper::redirect('/sales');
        
        }

        /**
         * Delete the item
         *
         * @return void
         */
        public function delete()
        {
                $transaction = new Transaction();
               
               $transaction->delete($_GET["id"]);
               Helper::redirect('/sales');
        }
}
