<?php

	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) :
		die('You can\'t access this file directly. You naughty little thing, you!');


		if (! empty($post->$post_password)) :
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) :
				echo '<p>This post is password protected. Enter the password to view comments.</p>';
				return;
			endif;
		endif;
	endif;

?>





	<section class="o-panel  o-panel--comments  c-comments">
		<div class="o-container">
			<h2 class="o-panel__heading  c-panel__heading--portfolio"><?php _e('Reviews', 'scenic-buses'); ?></h2>
			

			<div class="o-container  o-container--optimise-readability  c-portfolio-form__content">
				<p class="c-lede"><?php _e('Share your thoughts below to be part of the conversation.', 'scenic-buses'); ?></p>

				<div class="o-panel__button-wrapper">
					<a href="#comment-now" class="o-button  o-button--secondary  o-panel__button">
						<span class="o-button__text">Leave review</span>
						<svg class="o-button__icon--right  o-icon--chevron-right" viewBox="0 0 36 36" width="24" height="24"><rect fill="currentColor" y="16.5" width="31.3" height="3"></rect><polygon fill="currentColor" points="19.2,31.9 17.3,29.6 31.3,18 17.3,6.4 19.2,4.1 36,18 "></polygon></svg>
					</a>
				</div><!-- /.o-panel__button-wrapper -->
			</div><!-- /.o-container -->





			<div class="o-container  o-container--comments">
				<h3 class="c-comments__title  c-comments__title--replies">
					<?php comments_number('No reviews', '1 review &raquo;', '% reviews &raquo;' ); ?>
				</h3>
					

				<?php if ($comments) : ?>
					<ul class="c-comments__list">
						<?php foreach ($comments as $comment) : ?>
							<li class="c-comments__item" id="comment-<?php comment_ID(); ?>">
								<header class="c-comment__head  u-clearfix">
									<?php echo get_avatar($comment, '96'); ?>
									<h4 class="c-comment__title"><?php comment_author_link() ?></h4>
									
									<a href="#comment-<?php comment_ID() ?>" class="c-comment__date-link" title="Link directly to this review">
										<time datetime="" class="c-comment__date"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></time>
									</a>

									<?php edit_comment_link('Edit this review','',''); ?>
								</header>


								<article class="c-comment__content">
									<?php if ($comment->comment_approved == '0') : ?>
										<p>Your review is awaiting moderation.</p>
									<?php else : ?>
										<?php comment_text(); ?>
									<?php endif; ?>
								</article>
							</li>
						<?php endforeach; ?>
					</ul><!-- /.c-comments -->


				<?php else : ?>
					<div class="c-comments__none">
						<?php if ($post->comment_status == 'open') : ?>
							<p class="c-comments__error  c-comments__error--open"><strong><?php _e('Start the conversation', 'mangopear'); ?> - <em><?php _e('be the first to review this route.', 'mangopear'); ?></em></strong></p>
						<?php else : ?>
							<p class="c-comments__error  c-comments__error--closed"><strong><?php _e('Reviews are closed.', 'mangopear'); ?></strong></p>
						<?php endif; ?>
					</div><!-- /.c-comments__none -->
				<?php endif; ?>





				<?php if ($post->comment_status == 'open') : ?>
					<div class="c-comments__form-wrapper">
						<h3 class="c-comments__title  c-comments__title--leave-reply" id="comment-now">Leave your review</h3>


						<?php if (get_option('comment_registration') && ! $user_ID) : ?>
							<div>
								<p>You must be logged in to review this route.</p>

								<a href="/account/?redirect_to=<?php echo urlencode(get_permalink()); ?>" class="o-button  o-button--secondary  o-panel__button">
									<span class="o-button__text">Log in now</span>
									<svg class="o-button__icon--right  o-icon--chevron-right" viewBox="0 0 36 36" width="24" height="24"><rect fill="currentColor" y="16.5" width="31.3" height="3"></rect><polygon fill="currentColor" points="19.2,31.9 17.3,29.6 31.3,18 17.3,6.4 19.2,4.1 36,18 "></polygon></svg>
								</a>
							</div>


						<?php else : ?>
							<div class="c-comment__form">
								<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
									<?php if ($user_ID) : ?>
										<p style="text-align: center;">You're currently logged in as <?php echo $user_identity; ?>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
									

									<?php else : ?>
										<div class="o-form__field  o-form__field--name">
											<label for="author" class="o-form__label">Your name: <?php if ($req) echo '<span class="frm_required">*</span>'; ?></label>
											<div class="o-form__input"><input type="text" id="author" name="author" value="<?php echo $comment_author; ?>"></div>
										</div><!-- /.o-form__field -->


										<div class="o-form__field  o-form__field--name">
											<label for="email" class="o-form__label">Your email address: <?php if ($req) echo '<span class="frm_required">*</span>'; ?></label>
											<div class="o-form__input"><input type="email" id="email" name="email" value="<?php echo $comment_author_email; ?>"></div>
										</div><!-- /.o-form__field -->


										<div class="o-form__field  o-form__field--name">
											<label for="url" class="o-form__label">Your website:</label>
											<div class="o-form__input"><input type="text" id="url" name="url" value="<?php echo $comment_author_url; ?>"></div>
										</div><!-- /.o-form__field -->
									<?php endif; ?>


									<div class="o-form__field  o-form__field--name">
										<label for="comment" class="o-form__label">Your comment: <?php if ($req) echo '<span class="frm_required">*</span>'; ?></label>
										<div class="o-form__input"><textarea name="comment" id="comment" cols="100%" rows="10"></textarea></div>
									</div><!-- /.o-form__field -->


									<div class="o-form__submit">
										<div class="o-form__button">
											<button class="o-button  o-button--primary  o-button--positive  o-button--submit" type="submit" id="submit" name="submit">
												<span class="o-button__text">Post review</span>
												<svg class="o-button__icon--right  o-icon--chevron-right" viewBox="0 0 36 36" width="24" height="24"><rect fill="currentColor" y="16.5" width="31.3" height="3"></rect><polygon fill="currentColor" points="19.2,31.9 17.3,29.6 31.3,18 17.3,6.4 19.2,4.1 36,18 "></polygon></svg>
											</button>
										</div>
									</div>


									<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
									<?php do_action('comment_form', $post->ID); ?>
								</form>
							</div><!-- /.c-comment__form -->
						<?php endif; ?>
					</div><!-- /.c-comments__form-wrapper -->
				<?php endif; ?>
			</div><!-- /.o-container -->
		</div><!-- /.o-container -->
	</section><!-- /.c-portfolio-form -->