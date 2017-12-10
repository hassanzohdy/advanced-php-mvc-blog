<!-- Register Page -->
<div id="register-page" class="page box">
    <!-- Centered Content -->
    <div class="centered-content">
        <h1 class="heading">Create New Account</h1>
        <!-- Form -->
        <form action="<?php echo url('/register/submit'); ?>" class="form">
            <div id="form-results"></div>
            <div class="form-group">
                <label for="first_name" class="col-sm-3 col-xs-12">First Name</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="input placeholder" />
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-3 col-xs-12">Last Name</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="input placeholder" />
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 col-xs-12">Email</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="email" name="email" id="email" placeholder="Email Address" class="input placeholder" />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 col-xs-12">Password</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="password" name="password" id="password" placeholder="Password" class="input" />
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-3 col-xs-12">Confirm Password</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="input" />
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-3 col-xs-12">Gender</label>
                <div class="col-sm-9 col-xs-12">
                    <select name="gender" id="gender" class="input">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-3 col-xs-12">Your Image Profile</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="file" name="image" id="image" class="input" />
                </div>
            </div>

            <div class="form-group">
                <div class=" col-sm-offset-3 col-sm-9">
                    <button class="button bold submit-btn">Sign Up</button>
                 </div>
            </div>
        </form>
        <!--/ Form -->
    </div>
    <!--/ Centered Content -->
</div>
<!--/ Register Page -->