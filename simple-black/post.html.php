<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (!empty($breadcrumb)): ?>
    <div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><?php echo $breadcrumb ?></div>
<?php endif; ?>
<?php if (login()) { echo tab($p); } ?>
<div class="post" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
    
	<div>
        <a name="more"></a>
            <?php if (!empty($p->link)) { ?>
                <h3 class="title-post" itemprop="name"><a target="_blank" href="<?php echo $p->link ?>"><?php echo $p->title ?> &rarr;</a></h3>
            <?php } else { ?>
                <h3 class="title-post" itemprop="name"><?php echo $p->title ?></h3>
            <?php } ?>
			
        <div>
            <a href="<?php echo $p->archive ?>" title="Show all posts made on this month"><?php echo format_date($p->date) ?></a>
			-
            <a href="<?php echo $p->url ?>" rel="permalink">Permalink</a>
        </div>
		
        <?php if (!empty($p->image)) { ?>
		
            <div class="featured-image">
                <a href="<?php echo $p->url ?>"><img src="<?php echo $p->image; ?>" alt="<?php echo $p->title ?>"/></a>
            </div>
			
        <?php } ?>
        <?php if (!empty($p->video)) { ?>
		
            <div class="featured-video">
                <iframe src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" width="560" height="315" frameborder="0" allowfullscreen></iframe>
            </div>
			
        <?php } ?>
        <?php if (!empty($p->audio)) { ?>
		
            <div>
                <iframe width="560" height="315" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
            </div>
			
        <?php } ?>
        <?php if (!empty($p->quote)) { ?>
		
            <div>
                <blockquote><?php echo $p->quote ?></blockquote>
            </div>
			
        <?php } ?>
		
        <div>
            <?php echo $p->body; ?>
        </div>
		
        <div><strong>Tags:</strong> <?php echo $p->tag;?></div>
    </div>
	
    <div class="related">
        <h4>Related posts</h4>
        <?php echo get_related($p->related)?>
    </div>
	
    <div>
        <?php if (!empty($next)): ?>
            &laquo; <a href="<?php echo($next['url']); ?>" rel="next"><?php echo($next['title']); ?></a>
        <?php endif; ?>
        <?php if (!empty($prev)): ?>
            <a href="<?php echo($prev['url']); ?>" rel="prev"><?php echo($prev['title']); ?></a> &raquo;
        <?php endif; ?>
    </div>
	
    <?php if (disqus()): ?>
        <?php echo disqus($p->title, $p->url) ?>
    <?php endif; ?>
</div>