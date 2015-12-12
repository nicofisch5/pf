<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/pf.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<!--link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'-->
		<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

	<?php endif; ?>

	<jdoc:include type="head" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<!--script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script-->
	<![endif]-->
</head>

<body>
	<div class="main">

		<div class="container">

			<!-- The justified navigation menu is meant for single line per list item.
				 Multiple lines will require custom code not provided by Bootstrap. -->
			<div class="masthead">
				<a href="<?php echo $this->baseurl; ?>"><div class="logo"></div></a>
				<?php if ($this->params->get('sitedescription')) : ?>
					<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
				<?php endif; ?>

			</div>


				<?php if ($this->countModules('position-1')) : ?>
					<nav class="navigation" role="navigation">
						<jdoc:include type="modules" name="position-1" style="none" />
					</nav>
				<?php endif; ?>
				<jdoc:include type="modules" name="banner" style="xhtml" />

				<!--nav>
					<ul class="nav nav-justified">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Downloads</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav-->


			<div class="row-fluid central-wrapper">
				<div class="central">
					<?php if ($this->countModules('position-8')) : ?>
						<!-- Begin Sidebar -->
						<div id="sidebar" class="span3">
							<div class="sidebar-nav">
								<jdoc:include type="modules" name="position-8" style="xhtml" />
							</div>
						</div>
						<!-- End Sidebar -->
					<?php endif; ?>
					<main id="content" role="main" class="<?php echo $span; ?>">
						<!-- Begin Content -->
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="position-2" style="none" />
						<!-- End Content -->
					</main>
					<?php if ($this->countModules('position-7')) : ?>
						<div id="aside" class="span3">
							<!-- Begin Right Sidebar -->
							<jdoc:include type="modules" name="position-7" style="well" />
							<!-- End Right Sidebar -->
						</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Example row of columns -->
			<!--div class="row">
				<div class="col-lg-4">
					<h2>Safari bug warning!</h2>
					<p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
					<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
					<p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
				</div>
				<div class="col-lg-4">
					<h2>Heading</h2>
					<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
					<p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
				</div>
				<div class="col-lg-4">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
					<p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
				</div>
			</div-->
		 <!-- /container -->
		</div>

		<!-- Site footer -->
		<footer class="footer">
			<div class="footer-rabbit"></div>
			<p>&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?></p>
		</footer>

	</div>
</body>
</html>
