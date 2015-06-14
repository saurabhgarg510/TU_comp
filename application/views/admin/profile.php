<script language="javascript">
    function passwordChanged(id) {
        var strength = document.getElementById(id);
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@#$%^&*]).*$", "g");
        var mediumRegex = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        var pwd = document.getElementById(id);
        if (strongRegex.test(pwd.value)) {
            strength.className = "strong";
        } else if (mediumRegex.test(pwd.value)) {
            strength.className = "medium";
        } else {
            strength.className = "weak";
        }
    }
</script>

<!-- Main -->
<section id="main" class="container small">
    <header>
        <h2>Change password</h2>
        <?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>
    </header>
    <div class="box">
        <form method="post" action="<?php echo base_url(); ?>index.php/admin/updateProfile">
            <div class="row uniform half collapse-at-2">
                <div class="12u">
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" readonly/>
                </div>
            </div>
            <div class="row uniform half collapse-at-2">
                <div class="12u">
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly />
                </div>
            </div>
            <div class="row uniform half collapse-at-2">
                <div class="12u">
                    <input type="text" name="mob" id="mob" value="<?php echo $contact; ?>"  readonly/>
                </div>
            </div>
            <div class="row uniform half">
                <div class="12u">
                    <input type="password" name="oldpass" id="oldpass" placeholder="Enter old password" required />
                </div>
                <span class="error"><?php if(isset($_SESSION['olderr'])) echo $_SESSION['olderr']; ?> </span>
            </div>

            <div class="row uniform half">
                <div class="12u">
                    <input type="password" name="pass" id="pass" placeholder="Enter new password" maxlength="20"  onkeyup="return passwordChanged('pass');"  required />
                </div>
                <span class="error"><?php if(isset($_SESSION['passerr'])) echo $_SESSION['passerr']; ?> Password : atleast 1 number, 1 lowercase alphabet and minimum length is 6</span>
            </div>
            <div class="row uniform half">
                <div class="12u">
                    <input type="password" name="repass" id="repass" placeholder="Confirm password" maxlength="20" onkeyup="return passwordChanged('repass');" required />
                </div>
                <span class="error"><?php if(isset($_SESSION['matcherr'])) echo $_SESSION['matcherr']; ?> </span>
            </div>

            <div class="row uniform">
                <div class="12u">
                    <ul class="actions align-center">
                        <li><input type="submit" value="Update" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>