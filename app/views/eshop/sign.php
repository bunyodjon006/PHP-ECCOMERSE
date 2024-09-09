<?php
$this->view("header", $data); ?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">

            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <form method="post">
                    <input name="name" type="text" placeholder="Name"/>
                    <input name="emailaddrees" type="email" placeholder="Email Address"/>
                    <input name="password" type="password" placeholder="Password"/>
                    <input name="retypepassword" type="password" placeholder="Retype Password"/>
                    <button type="submit" class="btn btn-default">Signup</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>

</section><!--/form-->

<?php
$this->view("footer", $data); ?>
