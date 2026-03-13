<?php
/**
 * Theme footer template.
 */

$footer_label     = get_field('footer_label', 'option');
$footer_heading   = get_field('footer_heading', 'option');
$footer_text      = get_field('footer_text', 'option');
$footer_phone     = get_field('footer_phone_number', 'option');
$footer_phone_uri = get_field('footer_phone_link', 'option');
$footer_email     = get_field('footer_email_address', 'option');
$footer_address   = get_field('footer_address', 'option');
$facebook_url     = get_field('footer_facebook_url', 'option');
$instagram_url    = get_field('footer_instagram_url', 'option');
$linkedin_url     = get_field('footer_linkedin_url', 'option');
$theme_uri        = get_template_directory_uri();

if (!$footer_phone_uri && $footer_phone) {
    $footer_phone_uri = 'tel:+' . preg_replace('/\D+/', '', $footer_phone);
}



?>
<footer class="site-footer">
    <div class="site-footer-main">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-justify">
                <div class="cell small-12 large-6 fontcolourwhite ">
                    <?php if ($footer_label) : ?>
                        <p class="section-label"><?php echo esc_html($footer_label); ?></p>
                    <?php endif; ?>

                    <?php if ($footer_heading) : ?>
                        <div class="heading text-balance plastof">
                            <?php echo wp_kses_post($footer_heading); ?>
                        </div>
                    <?php endif; ?>

                 
                </div>

                <div class="cell small-12 large-shrink show-for-large">
                    <div class="brand">
                        <a class="site-footer-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/footer/footerlogo.svg'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid-x">
                <div class="cell large-8 xxxlarge-7">
                       <div class="contact-list">
                        <?php if ($footer_phone) : ?>
                            <a class="contact-item" href="<?php echo esc_url($footer_phone_uri); ?>">
                                <span class="contact-icon">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/Phone.svg'); ?>" alt="" />
                                </span>
                                <span class="contact-text"><?php echo esc_html($footer_phone); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ($footer_email) : ?>
                            <a class="contact-item" href="<?php echo esc_attr('mailto:' . antispambot(sanitize_email($footer_email))); ?>">
                                <span class="contact-icon">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/Email.svg'); ?>" alt="" />
                                </span>
                                <span class="contact-text"><?php echo esc_html($footer_email); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ($footer_address) : ?>
                            <div class="contact-item">
                                <span class="contact-icon">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/Location.svg'); ?>" alt="" />
                                </span>
                                <span class="contact-text"><?php echo esc_html($footer_address); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="site-footer-legal">
                    <span>&copy; <?php echo esc_html(date('Y')); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><span class="text-secondary">enve.</span></a> all rights reserved.</span>
                    <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">privacy policy</a>
                    <a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>">terms &amp; conditions</a>
                    <a href="<?php echo esc_url(home_url('/modern-slavery-policy/')); ?>">modern slavery policy</a>
                    <span>powered by <a class="text-secondary" href="https://www.websiteni.com" target="_blank" rel="noopener">websiteni</a></span>
                </div>

                <?php if ($facebook_url || $instagram_url || $linkedin_url) : ?>
                    <div class="socials" aria-label="Social links">
                        <?php if ($facebook_url) : ?>
                            <a class="social-link" href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/social-facebook.svg'); ?>" alt="" />
                            </a>
                        <?php endif; ?>

                        <?php if ($instagram_url) : ?>
                            <a class="social-link" href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/social-insta.svg'); ?>" alt="" />
                            </a>
                        <?php endif; ?>

                        <?php if ($linkedin_url) : ?>
                            <a class="social-link" href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/footer/social-linkedin.svg'); ?>" alt="" />
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php get_search_form(); ?>
</div>
</div>
<?php wp_footer(); ?>
</div>
</div>
</body>
</html>
