<?php
$this->view("header", $data); ?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
       <span><?php check_error() ?></span> 
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <form method="post">
                    <input name="name" value="<?= isset($_POST['name']) ? $_POST['name'] :''; ?>"  type="text" placeholder="Name" />
                    <input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] :''; ?>" type="email" placeholder="Email Address" />
                    <input name="password" type="text" placeholder="Password" />
                    <input name="password2" type="text" placeholder="Retype Password" />
                    <button type="submit" class="btn btn-default">Signup</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>

</section><!--/form-->

<?php
$this->view("footer", $data); ?>