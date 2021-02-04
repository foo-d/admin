<div class="login-page">
    <div class="form">
        <form action="" class="login-form" method="post">
            <label>
                <input name="email" placeholder="Email" type="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>">
                <input name="password" placeholder="Password" type="password">
            </label>
            <input name="login" type="submit" value="Login">
        </form>
        <div class='error'>Please verify your login details</div>
    </div>
</div>
