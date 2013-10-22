
<p class="current-user-display"><span class="gray">You're logged in as: </span> <?=$_SESSION['username']?></p> 
<div class="admin-page">
	
	
	<div class="control-panel">
		<h2 class="dash">Dashboard</h2>
				
		<h3>Posts</h3>
			<div class="posts-panel">
				<div class="panel-inner">
					<ul>
						<li id="view-posts" ><a href="?action=view-posts&page=1" ><img src="images/post-icon.png" alt="icon">Posts</a></li>
						<li id="new-post"><a href="?action=new-post-view"><img src="images/add-icon.png" alt="icon">New Post</a></li>
					</ul>
				
				</div><!-- /.pannel-inner-->
			</div><!-- /.posts-panel-->

		<h3>Media</h3>
			<div class="media-panel">
				<div class="panel-inner">
					<ul>
						<li id="view-lib"><a href="?action=view-lib"><img src="images/media-icon.png" alt="icon">Library</a></li>
						<li id="add-media"><a href="?action=add-media" ><img src="images/add-icon.png" alt="icon">Add Media</a></li>
					</ul>
				</div><!-- /.pannel-inner-->
			</div><!-- /.media-panel-->

		<h3>Settings</h3>
			<div class="settings-panel">
				<div class="panel-inner">
					<ul>
						<li id="user-settings"><a href="?action=user-settings"><img src="images/settings-icon.png" alt="icon">User Settings</a></li>
					</ul>
				</div><!-- /.pannel-inner-->
			</div><!-- /.settings-panel-->
	</div><!-- /.control-panel-->

	<div id="admin-content">
		

