<section class="update" id="Update">
    <h1 class="banner">Update Your Profile</h1>

    <div class="forms">

        <form action="<?= $URL->getController("name", "Settings/Update") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Update Name</h1>
                <div class="multi-row">
                    <div class="set">
                        <label for="Sirname">Sirname</label>
                        <input type="text" name="Sirname" id="Sirname" class="form-input" placeholder="Sirname" value="<?= Session::getSession("Sirname") ?>">
                    </div>
                    <div class="set">
                        <label for="Firstname">Firstname</label>
                        <input type="text" name="Firstname" id="Firstname" class="form-input" placeholder="Firstname" value="<?= Session::getSession("Firstname") ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <label for="Fathername">Fathername</label>
                        <input type="text" name="Fathername" id="Fathername" class="form-input" placeholder="Fathername" value="<?= Session::getSession("Fathername") ?>">
                    </div>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                <button type="reset" class="form-btn primary-btn">Update</button>
            </div>
        </form>


        <form action="<?= $URL->getController("contact", "Settings/Update") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Update Contact</h1>
                <div class="multi-row">
                    <div class="set">
                        <label for="Contact">Contact</label>
                        <input type="tel" name="Contact" id="Contact" class="form-input" placeholder="Contact" value="<?= Session::getSession("Contact") ?>">
                    </div>
                    <div class="set">
                        <label for="Email">Email</label>
                        <input type="text" name="Email" id="Email" class="form-input" placeholder="Email" value="<?= Session::getSession("Email") ?>">
                    </div>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                <button type="reset" class="form-btn primary-btn">Update</button>
            </div>
        </form>

        <form action="<?= $URL->getController("address", "Settings/Update") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Update Address</h1>
                <div class="row">
                    <div class="set">
                        <label for="Address">Address</label>
                        <input type="tel" name="Address" id="Address" class="form-input" placeholder="Address" value="<?= Session::getSession("Address") ?>">
                    </div>
                </div>
                <div class="multi-row">
                    <div class="set">
                        <label for="City">City</label>
                        <input type="text" name="City" id="City" class="form-input" placeholder="City" value="<?= Session::getSession("City") ?>">
                    </div>
                    <div class="set">
                        <label for="PinCode">PinCode</label>
                        <input type="text" name="PinCode" id="PinCode" class="form-input" placeholder="PinCode" value="<?= Session::getSession("Pin_Code") ?>">
                    </div>
                    <div class="set">
                        <label for="State">State</label>
                        <input type="text" name="State" id="State" class="form-input" placeholder="State" value="<?= Session::getSession("State") ?>">
                    </div>
                    <div class="set">
                        <label for="Country">Country</label>
                        <input type="text" name="Country" id="Country" class="form-input" placeholder="Country" value="<?= Session::getSession("Country") ?>">
                    </div>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                <button type="reset" class="form-btn primary-btn">Update</button>
            </div>
        </form>

        <form action="<?= $URL->getController("profile", "Settings/Update") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Update Profile Image</h1>
                <div class="row">
                    <div class="set">
                        <label for="ProfileImage">Profile Image</label>
                        <input type="file" name="Profile" id="ProfileImage" class="form-input block">
                    </div>
                    <input type="hidden" name="img" value="<?= Session::getSession("Img_Path") ?>">
                </div>
            </div>
            <div class="form-btn-set">
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                <button type="reset" class="form-btn primary-btn">Update</button>
            </div>
        </form>

        <form action="<?= $URL->getController("contact", "Settings/Update") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Update Password</h1>
                <button type="reset" class="form-btn primary-btn">Change Password</button>
        </form>
    </div>

</section>