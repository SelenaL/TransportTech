<?php
include('header.php');
?>
			<div class="container" id="welcome">
				<div class="row">
					<div class="12u skel-cell-important">
						<section class="content">				
	

 <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container id="welcome">
<div class="hero-unit">
  <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>

  </div>
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
	<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<li class="nav-header">Facebook Email</li>
<li><?php echo $_SESSION['EMAIL']; ?></li>
<div><a href="/logout.php">Logout</a></div>
</ul></div></div>
    <?php else: ?>     <!-- Before login --> 
<div class="container" id="welcome">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="/fbconfig.php">Login with Facebook</a></div>
	
      </div>
    <?php endif ?>
        </section>
					</div>
				</div>
				</div>	
<?php
include('footer.php');
?>