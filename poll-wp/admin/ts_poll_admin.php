<section class="tsp_admin_section">
	<header class="tsp_admin_header">
		<div>
			<span>
				TS Poll
			</span>
		</div>
		<div>
			<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo.png' ); ?>"  alt="TS Poll">
		</div>
		<div>
			<a href="<?php echo esc_url( 'https://total-soft.com/wp-poll/' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'tspoll' ); ?></a>
		</div>
	</header>
	<div class="tsp_manager_field">
		<div id="tsp_polls_field">
			<div id="post-body" class="metabox-holder">
				<div id="post-body-content">
					<div class="meta-box-sortables ui-sortable">
						<form method="post" id="ts_poll_form">
							<?php
								$this->ts_poll_question_obj->ts_poll_nonce_field();
								$this->ts_poll_question_obj->prepare_items();
							?>
							<div class="ts_poll_admin_bar">
								<div class="ts_poll_nav">
									<div class="ts_poll_nav_link">
										<a><?php esc_html_e( 'Dashboard', 'tspoll' ); ?></a>
									</div>
									<div class="ts_poll_nav_link">
										<a href="<?php echo esc_url( admin_url( 'admin.php?page=ts-poll-builder' ) ); ?>" ><?php esc_html_e( 'Create Poll', 'tspoll' ); ?></a>
									</div>
									<div class="ts_poll_nav_link">
										<a href="<?php echo esc_url( 'https://wordpress.org/support/plugin/poll-wp/' ); ?>" target="_blank"><?php esc_html_e( 'Support', 'tspoll' ); ?></a>
									</div>
									<div class="ts_poll_nav_link ts_poll_nav_link_pro">
										<a>
											<?php esc_html_e( 'Import poll', 'tspoll' ); ?>
										</a>
									</div>
									<div class="ts_poll_nav_link">
										<a href="<?php echo esc_url( 'https://total-soft.com/wp-poll/' ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'tspoll' ); ?></a>
									</div>
								</div>
								<div class="ts_poll_searchbar">
									<?php $this->ts_poll_question_obj->search_box( esc_attr__( 'Search', 'tspoll' ), 'search_id' ); ?>
								</div>
							</div>
							<?php
								$this->ts_poll_question_obj->display();
							?>
						</form>
					</div>
				</div>
			</div>
			<br class="clear">
		</div>
	</div>
</section>
<?php
$this->ts_poll_question_obj->ts_poll_confirm_modal();
