<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\Transaction;

class Transactions extends Controller
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
     * Gets all tags
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['tag:read']);
        $this->view = 'transactions.index';
        $transaction = new Transaction; // new model post.
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
    }

    public function single()
    {
        $this->permissions(['tag:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction ;
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['tag:create']);
        $this->view = 'transactions.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['tag:create']);
        $transactions= new Transaction();
        $transactions->create($_POST);
        Helper::redirect('/transactions');
    }
   

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['tag:read', 'tag:update']);
        $this->view = 'transactions.edit';
        $transaction = new Transaction ;
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['tag:read', 'tag:update']);
        $transaction = new Transaction();
        $transaction->update($_POST);
        Helper::redirect('/transaction?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['tag:read', 'tag:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }
}