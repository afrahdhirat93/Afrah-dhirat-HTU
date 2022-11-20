<?php include './header.php' ?>



<?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger w-50 m-auto my-3' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php
    endif;
    unset($_SESSION['error']); // to apply flash msgs
    ?>
<form class="container my-5 p-5 w-50 " method="POST" action="./auth/validation.php">
<h1 class="text-center my-3">Login Page</h1>

<div class="mb-3 ">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
   
  
    <button type="submit" class="btn btn-primary">Log in </button>
    <a href="C:\xampp\htdocs\ticketing_sytem\user_registration.php" class="btn btn-secondary">Wanna Register?</a>

</form>
<?php include './footer.php' ?>