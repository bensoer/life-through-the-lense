<div class="content">
	<!-- this page contains structure for the member settings and info page -->
	<div id="page_title">MEMBER PAGE</div>
	<!-- the main_left section contains the member page navigation list -->
	<div id="main_left">
		<?php require 'members_menu.php' ?>
	</div>
	<!-- the main_right section contains the written content, stats and various forms a member may want to use -->
	<div id="main_right">
		<!-- the subscriptions section - displays tags the memeber may subscribe to -->
		<?php require 'members_subscriptions.php' ?>
		<!-- displays a member's account settings -->
		<?php require 'members_settings.php' ?>
		<!-- a picture order form for members -->
		<?php require 'members_order.php' ?>
	</div>
</div>