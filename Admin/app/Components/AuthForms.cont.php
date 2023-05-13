<?php
if (!Session::Exists("isLoggedin")) { ?>
    <!-- Login Form -->
    <dialog class="login-form" id="login-dlg">
        <form action="<?= Route::getController("Login", "AuthControllers") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Login</h1>
                <div class="row">
                    <div class="set">
                        <label for="ID">Admin ID</label>
                        <input type="number" name="adminid" id="ID" class="form-input" placeholder="Admin ID" required>
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <label for="Password">Password</label>
                        <input type="password" name="password" id="Password" class="form-input" placeholder="******" required>
                    </div>
                </div>
            </div>
            <div class="form-btn-set center">
                <button type="reset" class="form-btn secondary-btn" id="close-login-dlg">Cancle</button>
                <button type="submit" class="form-btn primary-btn">Login</button>
            </div>
        </form>
    </dialog>
<?php } else { ?>
    <!-- Login Form -->
    <dialog class="login-form" id="logout-dlg">
        <form action="<?= Route::getController("Logout", "AuthControllers") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Logout</h1>
                <h2 class="form-text">
                    Are you Sure You Want to Logout?
                </h2>
            </div>
            <div class="form-btn-set center">
                <button type="reset" class="form-btn secondary-btn" id="close-logout-dlg">Cancle</button>
                <button type="submit" class="form-btn primary-btn">Logout</button>
            </div>
        </form>
    </dialog>
<?php } ?>