<?php
	require_once '../utils/Auth.php';
?>
<link rel="stylesheet" type="text/css" href="/public/css/main.css">
<div id="header">
<div id='navbar'>
	<a href="http://missingonecharecte.dev/">Home</a>
	<?php if(!empty($_SESSION['username']) && Auth::checkUsername($_SESSION['username']) && Auth::check($_SESSION['username'])) { ?>
			<a id='logout' href="http://missingonecharecte.dev/logout.php">Log Out</a>
		<?php } else { ?>
			<a id='login' href="http://missingonecharecte.dev/login.php">Login here</a>
			<a href="http://missingonecharecte.dev/register.php">Register</a>
		<?php } ?>
	<a href="http://missingonecharecte.dev/help.php">Help</a>
	<a id='test' href="https://twitter.com/David8Simonelli" class="twitter-follow-button" data-show-count="false">Follow @David8Simonelli</a>
	<div id='testtwo' class="fb-like" data-href="https://www.facebook.com/missingonecharecte?pnref=lhc" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
	<div id="fb-root"></div>
</div>
</div>