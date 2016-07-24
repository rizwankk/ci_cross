

<div id="container">
	<h1>Add Your News Article!</h1>

	<div id="body">
            <table>
            <?php echo form_open_multipart('news/add'); ?>    
                <tr><td>Title:</td><td><input type="text" name="title" placeholder="Enter Your Title" required="true" /></td></tr>
                <tr><td>Photo:</td><td><input type="file" name="userfile" size="20" required="true" /></td></tr>
                <tr><td>Description:</td><td><textarea name="desc" rows="5" col="7">Enter Your Description Here.....</textarea></td></tr>
                <tr><td>Reporter:</td><td><input type="text" name="reporter" placeholder="Enter Reporter Email / Name" required="true" /></td></tr>
                <tr><td><input type="submit" value="Add Article" /> </td><td></td></tr>
             </form>
            </table>
        
        
        </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

