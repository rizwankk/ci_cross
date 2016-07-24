

<div id="container">
	<h1>Welcome to Cross Over News Publishing Portal, Please Login</h1>

	<div id="body">
            <p><?php if(isset($message)) { echo $message;  } ?></p>
            <table>
            <?php echo form_open('homes/login'); ?> 
                <tr><td>Email:</td><td><input type="email" name="email" placeholder="Enter Your Email Address" required="true"  /></td></tr>
                <tr><td>Password:</td><td><input type="password" name="pass" placeholder="Enter Your Password" required="true"  /></td></tr>
                <tr><td><input type="submit" value="Login" /> </td><td></td></tr>
                <tr><td><a href="<?php echo site_url('users/add'); ?>">Create New Account</a></td><td></td></tr>
            </form>
            </table>
        
        
        </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

