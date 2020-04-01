<?php
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	$this->need('includes/header.php');
?>

	<main>
		<section class="section section-lg section-hero section-shaped">
			<!-- Background circles -->
			<div class="shape shape-style-1 shape-primary">
				<span class="span-150"></span>
				<span class="span-50"></span>
				<span class="span-50"></span>
				<span class="span-75"></span>
				<span class="span-100"></span>
				<span class="span-75"></span>
				<span class="span-50"></span>
				<span class="span-100"></span>
				<span class="span-50"></span>
				<span class="span-100"></span>
			</div>
			<div class="container shape-container d-flex align-items-center py-lg">
				<div class="col px-0 text-center">
					<div class="row align-items-center justify-content-center">
						<h1 class="text-white"><?php $this->title() ?></h1>
					</div>
					<div class="row align-items-center justify-content-center">
						<h5 class="text-white">于 <time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time> 由 <?php $this->author(); ?> 发布</h5>
					</div>
				</div>
			</div>
		</section>
		<div class="card shadow content-card content-card-head">
			<!-- Article content -->
			<section class="section">
				<div class="container">
					<div class="content">
						<?php $this->content(); ?>
						<?php if (!$this->hidden) { ?>
						<hr/>
						<ul>
							<li>分类：<?php printCategory($this); ?></li>
							<li>标签：<?php printTag($this); ?></li>
						</ul>
						<?php } ?>
					</div>
				</div>
			</section>
			<!-- Comment -->
			<?php if (!$this->hidden && $this->allow('comment')) $this->need('includes/comments.php'); ?>
		</div>
<?php $this->need('includes/footer.php'); ?>