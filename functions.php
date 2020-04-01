<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_VERSION", "0.1.0");
function themeConfig($form) {
	$Favicon = new Typecho_Widget_Helper_Form_Element_Text('Favicon', NULL, NULL, _t('站点 Favicon 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 favicon'));
	$form->addInput($Favicon);
	$avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('站点头像地址'), _t('在这里填入一个图片 URL 地址, 以在网站首页上加上一个头像'));
	$form->addInput($avatarUrl);
	$staticFiles = new Typecho_Widget_Helper_Form_Element_Radio('staticFiles', array('local' => _t('本地'), 'jsdelivr' => _t('云端')), 'jsdelivr', _t('CDN源'), _t('选择是否采用云端加速'));
	$form->addInput($staticFiles);
}

function printCategory($that, $icon = 0) { ?>
	<span class="list-tag">
		<?php if ($icon) { ?><i class="fa fa-folder-o" aria-hidden="true"></i><?php } ?>
		<?php foreach( $that->categories as $categories): ?>
		<a href="<?php print($categories['permalink']) ?>" class="badge badge-info badge-pill"><?php print($categories['name']) ?></a>
		<?php endforeach;?>
	</span>
<?php }

function printTag($that, $icon = 0) { ?>
	<span class="list-tag">
		<?php if ($icon) { ?><i class="fa fa-tags" aria-hidden="true"></i><?php } ?>
		<?php if (count($that->tags) > 0): ?>
			<?php foreach( $that->tags as $tags): ?>
			<a href="<?php print($tags['permalink']) ?>" class="badge badge-success badge-pill"><?php print($tags['name']) ?></a>
			<?php endforeach;?>
		<?php else: ?>
			<a class="badge badge-default badge-pill text-white">无标签</a>
		<?php endif;?>
	</span>
<?php }

function printAricle($that) { ?>
	<section class="section">
		<div class="container">
			<div class="content">
				<h1><a class="text-default" href="<?php $that->permalink() ?>"><?php $that->title() ?></a></h1>
				<div class="list-object">
					<span class="list-tag"><i class="fa fa-calendar-o" aria-hidden="true"></i> <time datetime="<?php $that->date('c'); ?>"><?php $that->date();?></time></span>
					<span class="list-tag"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php $that->commentsNum('%d');?> 条评论</span>
					<?php printCategory($that, 1); ?>
					<?php printTag($that, 1); ?>
					<span class="list-tag"><i class="fa fa-user-o" aria-hidden="true"></i> <a class="badge badge-warning badge-pill" href="<?php $that->author->permalink(); ?>"><?php $that->author();?></a></span>
				</div>
				<?php $that->content('...'); ?>
				<br/>
				<a href="<?php $that->permalink() ?>">
					<button class="btn btn-icon btn-3 btn-primary" type="button">
						<span class="btn-inner--icon"><i class="fa fa-play" aria-hidden="true"></i></span>
						<span class="btn-inner--text">继续阅读</span>
					</button>
				</a>
			</div>
		</div>
	</section>
<?php }

function printToggleButton($that) {
	if ($that->getTotal() > $that->parameter->pageSize) { ?>
		<section class="section">
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col col-md-auto">
						<?php $that->pageLink('
							<button class="btn btn-icon btn-3 btn-default" type="button">
								<span class="btn-inner--icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
								<span class="btn-inner--text">上一页</span>
							</button>
						'); ?>
					</div>
					<div class="col col-md-auto">
						<?php $that->pageLink('
							<button class="btn btn-icon btn-3 btn-default" type="button">
								<span class="btn-inner--text">下一页</span>
								<span class="btn-inner--icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
							</button>
						','next'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php }
}

 /* 静态文件源 */
function staticFiles($content, $type = 0){
  $setting = Helper::options()->staticFiles;
  $setting_cdn = Helper::options()->staticCdn;
  if($setting == 'local') {
    $output = Helper::options()->themeUrl.'/'.$content;
  }elseif($setting == 'jsdelivr') {
    $output = 'https://cdn.jsdelivr.net/gh/isakurai/Sky@'.THEME_VERSION.'/'.$content;
  }elseif($setting == 'cdn') {
    $output = $setting_cdn.'/'.$content;
  }
  if($type == 0){
    print_r($output);
  }elseif($type == 1){  
    return($output);
  }
}

/* QQ头像o */
function get_comment_avatar($moe=NULL){
  $host = 'https://cdn.v2ex.com/gravatar';
  $hash = md5(strtolower($moe));
  $email = strtolower($moe);
  $qq = str_replace('@qq.com','',$email);
  if(strstr($email,"qq.com") && is_numeric($qq) && strlen($qq) < 11 && strlen($qq) > 4){
   $avatar = 'https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
  }else{
   $avatar = $host.'/'.$hash.'?s=100';
  }
  echo $avatar;
}