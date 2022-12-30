
<link rel="stylesheet" href="styles.css">

<div class="container">


	<div class="screen">
		<div class="screen__content">
        <form class="w-50" method="POST" action="/authenticate">
        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger mb-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>
			
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text"id="admin-username" name="username" class="login__input" placeholder="User name ">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" id="admin-password" name="password" class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>






