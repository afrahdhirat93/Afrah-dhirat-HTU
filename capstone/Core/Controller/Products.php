<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Product;
use Core\Model\Transaction;

class Products extends Controller
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
        $this->permissions(['post:read']);
        $this->view = 'products.index';
        $product = new Product; // new model post.
        $this->data['products'] = $product->get_all();
        $this->data['products_count'] = count($product->get_all());
    }
   
    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['post:read']);
        $this->view = 'products.single';
        $products = new Product();
        $this->data['product'] = $products->get_by_id($_GET['id']);
    }
 /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function sell()
    {
        $this->permissions(['sell:read']);
        $this->view = 'products.sell';
        $product= New Product;

$this->data['products']=$product->get_all();
    }
     /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function MaxProduct()
    {

        $this->permissions(['sell:max']);
        $this->view = 'products.max';
        $product= New Product;

$this->data['products']=$product->get_max();
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['post:create']);
        $this->view = 'products.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['post:create']);
        $products= new Product();
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