<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 10px 0;
		padding: 14px 15px 0px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	p{
		margin-left:16px;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Edit Member</h1>

	<div id="body">
         <p><a href="<?php echo site_url(array('welcome', 'add')); ?>">Add a member</a></p>
         <p><a href="/">View all members</a></p>

		<?php
        if($inserted):
        ?>
        <p><strong>Member edited successfully!</strong></p>
        <?php
        endif;
        ?>
        
        <form method="post">
        
        <p>
        <label for="title">Name</label><br/>
        <input type="text" name="name" value="<?php echo $name; ?>" />
        </p>
        
        <p>
        <label for="body">Address</label><br/>
        <textarea name="address"><?php echo $address; ?></textarea>
        </p>
        
        <p>
        <label for="author">Phone</label><br/>
        <input type="text" name="phone" value="<?php echo $phone; ?>" />
        </p>
        
        <p>
        <input type="submit" name="edit" value="Edit" />
        </p>
        
        </form>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>