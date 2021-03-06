<?php if (!defined('WEBPATH')) die(); require_once ('functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
<?php include_once('header.php'); ?>
		<meta name="keywords" content="<?php echo html_encode(getMainSiteName().', '.getGalleryTitle()); ?>" />
		<meta name="description" content="<?php echo html_encode(getMainSiteName().' / '.getGalleryTitle().' / '.getGalleryDesc()); ?>" />
		<title><?php echo strip_tags(getMainSiteName().' / '.getGalleryTitle()); ?></title>
	</head>
	<body id="gallery-index" class="<?php echo 'page-'.getCurrentPage(); ?>">
		<div id="wrapper">
			<div id="header">
				<?php if (getOption('Allow_search')) {  printSearchForm(''); } ?>
				<?php printAdminToolbox(); ?>
				<ul class="path c">
					<li><h1><a href="<?php echo getMainSiteURL(); ?>"><?php echo getMainSiteName(); ?></a></h1></li>
					<li><h2><a href="<?php echo getGalleryIndexURL(); ?>"><?php echo getGalleryTitle(); ?></a></h2></li>
				</ul>
				<ul class="move">
					<li><?php if (hasPrevPage()): ?><a href="<?php echo htmlspecialchars(getPrevPageURL()); ?>">Prev</a><?php else: ?><span>Prev</span><?php endif; ?></li>
					<li><?php if (hasNextPage()): ?><a href="<?php echo htmlspecialchars(getNextPageURL()); ?>">Next</a><?php else: ?><span>Next</span><?php endif; ?></li>
				</ul>	
			</div>
			<div id="content" class="c">
				<div id="leftbox">
					<ul class="list c">
<?php while (next_album()): ?>
						<li id="<?php echo 'album-'.getAlbumID(); ?>" class="album">
							<a title="<?php echo html_encode(getAlbumDesc()); ?>" href="<?php echo htmlspecialchars(getAlbumLinkURL()); ?>">
								<img src="<?php echo getCustomAlbumThumb(298, NULL, NULL, 298, 178, NULL, NULL, false); ?>" alt="<?php echo html_encode(getAlbumTitle().' ('.getAlbumDate(getOption('date_format')).')'); ?>" />
							<span><?php echo getAlbumTitle().'<br />('.getAlbumDate(getOption('date_format')).')'; ?></span>
							</a>
						</li>
<?php endwhile; ?>
					</ul>
				</div>
				<div id="rightbox">
					<div id="login">
<?php
						if (!zp_loggedin() && function_exists('printUserLogin_out')) {
							printUserLogin_out();
						}
						if (!zp_loggedin() && function_exists('printRegistrationForm')) {
							printCustomPageURL(gettext('Register for this site'), 'register');
						}
?>
					</div>
					<?php if (zp_loggedin()) {
					echo '<div class="tagcloud">';
						echo '<p>' . gettext('Popular Tags') . '</p>';
						printAllTagsAs('cloud', 'tags');
					echo '</div>';
					} ?>
				</div>
			</div>
<?php include_once('footer.php'); ?>
		</div>
<?php include_once('analytics.php'); ?>
	</body>
</html>

