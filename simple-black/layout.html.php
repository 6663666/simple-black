<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', config('language'));?>">

<head>
    <?php echo head_contents() ?>
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <link href="<?php echo site_url() ?>themes/simple-black/css/style.css" rel="stylesheet"/>
</head>

<body class="<?php echo $bodyclass; ?>" itemscope="itemscope" itemtype="http://schema.org/Blog">
<div class="hide">
    <meta content="<?php echo blog_title() ?>" itemprop="name"/>
    <meta content="<?php echo strip_tags(blog_description()); ?>" itemprop="description"/>
</div>
<?php if (login()) { toolbar(); } ?>

<div id="outer-wrapper">

    <div id="header-wrapper">
		<?php if (is_index()) { ?>
			<h1><a rel="home" href="<?php echo site_url() ?>"><?php echo blog_title() ?></a></h1>
		<?php } else { ?>
			<h1><a rel="home" href="<?php echo site_url() ?>"><?php echo blog_title() ?></a></h1>
		<?php } ?>
    </div>
  
	<div>
            <nav>
                <?php echo menu() ?>
            </nav>
    </div>
	
    <div>
            <section id="content">
                <?php echo content() ?>
            </section>
    </div>
	
    <div>
            <footer>
                <div class="copyright"><?php echo copyright() ?></div>
            </footer>
    </div>
	
</div>

<?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>
</html>