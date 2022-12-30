<?php
session_start();

//use Core\Helpers\Fake;
use Core\Model\User;
use Core\Router;

// 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'user_id' => $logged_in_user->id,
        'is_admin_view' => true
    );
}


// For public access

Router::get('/home', 'front.index'); // Display home.php
Router::get('/front/product', 'front.single'); // Display home.php
//Router::get('/dashboard', "front.index"); // Displays the admin dashboard

// For web administrators

Router::get('/', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form
// edit 
Router::get('/dashboard', "admin.index");


// athenticated + permissions [post:read]
Router::get('/products', "products.index"); // list of posts (HTML)
Router::get('/product', "products.single"); // Displays single post (HTML)
// athenticated + permissions [post:create]

Router::get('/products/max', "products.MaxProduct"); // Display the creation form (HTML)


Router::get('/products/create', "products.create"); // Display the creation form (HTML)
Router::post('/products/store', "products.store"); // Creates the posts (PHP)
// athenticated + permissions [post:read, post:create]
Router::get('/products/edit', "products.edit"); // Display the edit form (HTML)
Router::post('/products/update', "products.update"); // Updates the posts (PHP)
// athenticated + permissions [post:read, post:detele]
Router::get('/products/delete', "products.delete"); // Delete the post (PHP)




//Router::get('/sales', "sales.index"); // list of transactions (HTML)
// athenticated + permissions [post:read]
//Router::put('/sales/update', "sales.update"); // Updates the tags (PHP)
// athenticated + permissions [tag:read, tag:detele]
//Router::delete('/sales/delete', "sales.delete"); // Delete the tag (PHP)



Router::get('/sales', "sales.index"); // list of transactions (HTML)
// athenticated + permissions [post:read]
Router::put('/sales/update', "sales.update"); // Updates the tags (PHP)
// athenticated + permissions [tag:read, tag:detele]
Router::delete('/sales/delete', "sales.delete"); // Delete the tag (PHP)


// athenticated + permissions [post:read]
Router::get('/transactions', "transactions.index"); // list of tags (HTML)
Router::get('/transaction', "transactions.single"); // Displays single tag (HTML)
// athenticated + permissions [tag:create]
Router::get('/transactions/create', "transactions.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "transactions.store"); // Creates the transactions (PHP)
// athenticated + permissions [tag:read, tag:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)
// athenticated + permissions [tag:read, tag:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the tag (PHP)



// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)

// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)



Router::redirect();