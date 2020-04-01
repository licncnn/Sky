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
						<h1 class="text-white">
							<?php $this->archiveTitle(array(
								'category'=>_t('%s'),
								'search'=>_t('%s的搜索结果'),
								'tag' =>_t('%s'),
								'author'=>_t('%s的文章')
								), '');
							?>
						</h1>
					</div>
				</div>
			</div>
		</section>
		<div class="card shadow content-card list-card content-card-head">
			<!-- Article list -->
			<?php if ($this->have()): ?>
				<?php while($this->next()): ?>
					<?php printAricle($this); ?>
				<?php endwhile; ?>
				<!-- Toggle page -->
				<?php printToggleButton($this); ?>
			<?php else: ?>
			<section class="section">
				<div class="container">
					<div class="content">
						<h1>这里空空如也</h1>
						<hr/>
						<p>不如换个地方看看吧？</p>
					</div>
				</div>
			</div>
			<?php endif; ?> 
		</div>

<?php $this->need('includes/footer.php'); ?>