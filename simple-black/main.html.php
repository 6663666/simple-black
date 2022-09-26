<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (!empty($breadcrumb)): ?>
    <div class="breadcrumb"><?php echo $breadcrumb ?></div>
<?php endif; ?>
<?php if (config('category.info') === 'true'):?>
    <?php if (!empty($category)): ?>
        <div>
            <h2><?php echo $category->title;?></h2>
            <div>                                   
                <?php echo $category->body; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php foreach ($posts as $p): ?>
    <div class="post" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
        <div class="main">
            <?php if (!empty($p->link)) { ?>
                <h3 class="title-index" itemprop="name"><a target="_blank" href="<?php echo $p->link ?>"><?php echo $p->title ?> &rarr;</a></h3>
            <?php } else { ?>
                <h3 class="title-index" itemprop="name"><a href="<?php echo $p->url ?>"><?php echo $p->title ?></a></h3>
            <?php } ?>
			
            <div>
                <i><?php echo format_date($p->date) ?></i>
                <?php if (disqus_count()) { ?> - 
                    <a href="<?php echo $p->url ?>#disqus_thread">Comments</a>
                <?php } elseif (facebook()) { ?> - 
                    <a href="<?php echo $p->url ?>#comments"><fb:comments-count href=<?php echo $p->url ?>></fb:comments-count> Comments</a>
                <?php } ?>
				<?php if (login()) { echo ' - <a href="'. $p->url .'/edit?destination=post">Edit</a>'; } ?>
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
                <div class="featured-audio">
                    <iframe width="560" height="315" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
                </div>
            <?php } ?>
            <?php if (!empty($p->quote)) { ?>
                <div>
                    <blockquote><?php echo $p->quote ?></blockquote>
                </div>
            <?php } ?>
			
            <div>
                <?php echo get_thumbnail($p->body) ?>
                <?php echo get_teaser($p->body, $p->url) ?>
                <?php if (config('teaser.type') === 'trimmed'):?><a href="<?php echo $p->url;?>"><?php echo config('read.more'); ?></a><?php endif;?>
            </div>
			
        </div>
    </div>
<?php endforeach; ?>
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
    <div class="pager">
        <?php if (!empty($pagination['prev'])): ?>
            <a href="?page=<?php echo $page - 1 ?>" rel="prev">&laquo; Newer</a>
        <?php endif; ?>
        <?php echo $pagination['pagenum'];?>
        <?php if (!empty($pagination['next'])): ?>
            <a href="?page=<?php echo $page + 1 ?>" rel="next">Older  &raquo;</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>
