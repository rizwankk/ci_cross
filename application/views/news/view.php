
<?php if(!empty($data)) { ?>
<div id="container">
	<h1><?php echo $data['news_title']; ?></h1>
        <p><a href="<?php echo site_url('news/delete/'.$data['id']); ?>">Delete this Article</a></p>

	<div id="body">
		<p><?php echo $data['news_text']; ?></p>
                <p><image src="<?php echo site_url(); ?>/uploads/<?php echo $data['photo_name']; ?>" /></p>
                <p>Published Date: <?php echo $data['published_date']; ?></p>
                <p>Reporter: <?php echo $data['reporter']; ?></p>
            
		
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<?php } else { ?>
    <h1>Sorry, We did not have this Article!</h1>
<?php } ?>