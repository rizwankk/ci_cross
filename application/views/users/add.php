

<div id="container">
	<h1>Create Your New Account!</h1>

	<div id="body">
            <table>
            <?php echo form_open('users/add'); ?>    
                <tr><td>First Name:</td><td><input type="text" name="first_name" placeholder="Enter Your First Name" required="true" /></td></tr>
                <tr><td>Last Name:</td><td><input type="text" name="last_name" placeholder="Enter Your Last Name" required="true" /></td></tr>
                <tr><td>Email:</td><td><input type="email" name="email" placeholder="Enter Your Email" required="true" /></td></tr>
                <tr><td>Password:</td><td><input type="password" name="pass" placeholder="Enter Your Password" required="true" /></td></tr>
                <tr><td>Repeat Password:</td><td><input type="password" name="repeat" placeholder="Enter Your Repeat Password" required="true" /></td></tr>
                
                <tr><td><input type="submit" value="Sign Up Now" /> </td><td></td></tr>
                <tr><td><a href="<?php echo site_url('homes/index'); ?>">Click here for Login</a></td><td></td></tr>
            </form>
            </table>
        
        
        </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

