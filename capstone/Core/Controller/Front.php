<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Product;
use Core\Model\Transaction;
use Core\Model\User;
use DateTime;

class Front extends Controller

{
    public function render()
    {
        if (!empty($this->view))
        $this->view();
}    
        
            
    

    function __construct()
    {
        $this->admin_view(false);
    }

    /**
     * List all news
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'dashboard';
        $product = new Product();
        $this->data['products'] = $product->get_all();
    }

    public function single()
    {
        $this->view = 'single';
        $product = new Product();
        $selected_product = $product->get_by_id($_GET['id']); // get the post data (including the user_id)
        $user = new User(); // get the user model to get the author info
        $author = $user->get_by_id($selected_product->user_id); // get the author by using the user_id in the $selected_post
        $selected_product->author = !empty($author) ? $author->display_name : null; // check if we got a user withe the provided user_id

        $date = new \DateTime($selected_product->created_at);
        $selected_product->created_at = $date->format('d/m/Y');

        // get tags related to the current post
        $transaction = new Transaction();
        // get related tags (Should be implemented in the Tag Model)
        $sql = "SELECT * FROM transactions WHERE id={$_GET['id']}";
        $transactions_query = $transaction->connection->query($sql); // get data from mysql
        $transactions_relations = array(); // create container (Array) for the relations
        if ($transactions_query->num_rows > 0) { // fill out the relations container
            while ($row = $transactions_query->fetch_object()) {
                $transactions_relations[] = $row;
            }
        }

        // get the tags by id from the tags table
        $tags = array();
        foreach ($transactions_relations as $relation) {
            $transactions[] = $transaction->get_by_id($relation->id);
        }

        // get the unique tags. 
        $final_transactions = array();
        foreach ($transactions as $transaction) {
            if (!in_array($tag->name, $final_tags)) {
                $final_tags[$tag->id] = $tag->name;
            }
        }

        // escape XSS attacks
        $selected_product->content = \htmlspecialchars($selected_product->content);

        $selected_product->tags = $final_tags;
        $this->data['product'] = $selected_product;
    }
}