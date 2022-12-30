
<!-- partial:index.partial.html -->
<div class="form1">
<div class="login-form">
  <h1>Admin Login Page</h1>

  <form  method="POST" action="/authenticate">
    <div class="content">
  
      <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
      <div class='alert alert-danger mb-3' role='alert'>
          <?= $_SESSION['error'] ?>
      </div>
  <?php
      $_SESSION['error'] = null;
  endif; ?>
      <div class="input-field">

        <input type="text" placeholder="User Name" id="admin-username" name="username">
      </div>
      <div class="input-field">

        <input type="password" placeholder="Password" id="admin-password" name="password">
      </div>

      <div class="input-field">
<input type="checkbox"  id="remember-me" name="remember_me">
<label  for="remember-me">Remember Me</label>

</div>
     
<div class="input-field">

    <div class="action">
      <button type="submit">Login</button>
    </div>

</div>
</form>

</div>