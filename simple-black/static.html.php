<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (!empty($breadcrumb)): ?>
    <div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php echo $breadcrumb ?></div><?php endif; ?>
<?php if (login()) {
    echo tab($p);
} ?>
<div class="post" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
    <div>
        <h3><?php echo $p->title ?></h3>
        <div>
            <?php echo $p->body; ?>
        </div>
    </div>
</div>