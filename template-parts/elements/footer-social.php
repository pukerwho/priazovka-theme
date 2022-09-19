<ul class="footer-social__list flex flex-wrap -mx-2">
  <?php if (carbon_get_theme_option('crb_social_telegram')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_telegram'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-telegram"><span class="hidden">telegram</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_twitter')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_twitter'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-twitter"><span class="hidden">twitter</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_youtube')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_youtube'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-youtube"><span class="hidden">youtube</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_linkedin')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_linkedin'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-linkedin"><span class="hidden">linkedin</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_facebook')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_facebook'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-facebook"><span class="hidden">facebook</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_medium')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_medium'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-medium"><span class="hidden">medium</span></a></li>
  <?php endif; ?>
  <?php if (carbon_get_theme_option('crb_social_instagram')): ?>
    <li class="footer-social__item px-2"><a href="<?php echo carbon_get_theme_option('crb_social_instagram'); ?>" target="_blank" rel="noreferrer" class="footer-social__link icon-instagram"><span class="hidden">instagram</span></a></li>
  <?php endif; ?>
</ul>