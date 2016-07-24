
<?php if(!empty($data)) { ?>
<div id="container">
	<h1>Welcome to Cross Over News Publishing Portal</h1>
        <table>
            <tr>
                <td>Title</td>
                <td>Published Date</td>
                <td>Actions</td>
            </tr>
            <?php foreach($data as $d) { ?>
            <tr>
                <td><?php echo $d->news_title; ?></td>
                <td><?php echo $d->published_date; ?></td>
                <td><a href="<?php echo site_url('news/view/'.$d->id); ?>">View</a>&nbsp;<a href="<?php echo site_url('news/delete/'.$d->id); ?>">Delete</a></td>
            </tr>
            <?php //print_r($d); ?>
            <?php } ?>
        </table>
</div>
<?php } else { ?>
<div id="container">
    <h1>Sorry, You did not published any article at yet.</h1>
</div>
<?php } ?>

