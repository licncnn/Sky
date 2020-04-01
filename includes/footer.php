<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
		<?php if ($this->user->hasLogin()) { ?>
			<?php if ($this->is('single')) { ?>
			<a href="<?php $this->options->adminUrl(); ?>write-<?php echo $this->is('post')?'post':'page'; ?>.php?cid=<?php echo $this->cid;?>"><button class="btn btn-icon-only rounded-circle btn-primary page-btn">
				<span class="btn-inner--icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
			</button></a>
			<?php } else { ?>
			<a href="<?php $this->options->adminUrl(); ?>"><button class="btn btn-icon-only rounded-circle btn-primary page-btn">
				<span class="btn-inner--icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
			</button></a>
			<?php } ?>
		<?php } ?>
	</main>

	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="copyright">
						Copyright © <?php $this->options->title() ?>
					</div>
				</div>
				<div class="col-md-6">
					<ul class="nav nav-footer justify-content-end">
						<li class="nav-item">
							Theme Sky by <a href="https://blog.imsakura.cn">魔法樱</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Core -->
	<script src="<?php staticFiles("assets/vendor/jquery/jquery.min.js"); ?>"></script>
	<script src="<?php staticFiles("assets/vendor/popper/popper.min.js"); ?>"></script>
	<script src="<?php staticFiles("assets/vendor/bootstrap/bootstrap.min.js"); ?>"></script>
	<!-- Optional plugins -->
	<script src="<?php staticFiles("assets/vendor/headroom/headroom.min.js"); ?>"></script>
	<!-- Theme JS -->
	<script src="<?php staticFiles("assets/js/argon.min.js"); ?>"></script>
	<!-- Typecho footer -->
	<?php $this->footer(); ?>
	</body>
</html>