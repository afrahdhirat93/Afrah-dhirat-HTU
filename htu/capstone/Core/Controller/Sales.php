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

    use Tests;

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
     * Gets all posts
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['selling:read']);
        $this->view = 'sales.index';
        $product= new Product;
        $this->data['products'] = $product->get_all();
        $this->data['user_id'] = $_SESSION['user']['user_id']; 
        $transaction= new Transaction;
        $this->data['all_transactions'] = $transaction->get_transactions_user($_SESSION['user']['user_id']);

    }
   
    public function single()
    {

        
    }
 /**
     * Display the HTML form for post creation
     *
     * @return void
     */
  

    public function create()
    {
        $product = new Product;
        $selected_product = $product->get_by_id($_POST['product_id']);
        $id=$_POST['product_id'];
        $_POST['price']=$selected_product->price;
       $stock_quantity= $selected_product->quantity;
        $_POST['total']= (int)$_POST['price'] * (int)$_POST['quantity'];
        $quantity_sales= $_POST['quantity'];
        if($stock_quantity >= $quantity_sales){
            $new_stock=$stock_quantity - $quantity_sales;
        }else{
$_SESSION['error']= "there is no enough quanity in stock";
Helper::redirect('/sales');
die;
}
$product->connection->query("UPDATE products SET quantity=$new_stock WHERE id=$id");
   
        $Transaction = new Transaction();

        //  $_POST['total']= (int)$_POST['price']*(int)$_POST['quantity'];
        
         
           $Transaction->create($_POST);

           $Transaction_id = $Transaction->get_by_id($Transaction->connection->insert_id);

           $Transaction_id = $Transaction_id->id;

           $user_id = $_SESSION['user']['user_id'];

           $Transaction->connection->query("INSERT INTO users_transaction (transaction_id, user_id) VALUES ($Transaction_id ,$user_id)");

           Helper::redirect('/sales');

  

   

   
     }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
       
        $product= new Product();
        $product->create($_POST);
        Helper::redirect('/products');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['post:read', 'post:update']);
        $this->view = 'products.edit';
        $product = new Product();
        $this->data['product'] = $product->get_by_id($_GET['id']);
    }


    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['post:read', 'post:update']);
        $product = new Product();
        $product->update($_POST);
        Helper::redirect('/product?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['post:read', 'post:delete']);
        $product = new Product();
        $product->delete($_GET['id']);
        Helper::redirect('/products');
    }
   




}