        </article>

        <footer id="footer">

            <nav id="bottom-nav">
                <?php echo public_nav_main(); ?>
            </nav>

            <div class="footer">
                <a href="<?php echo WEB_ROOT; ?>"><img src="<?php echo img('sub.png'); ?>" alt="Scribe: an Omeka theme" title="Scribe: an Omeka theme" width="960" height="80" border="0"></a>
            </div>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
            </div>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>

    </div><!-- end wrap -->
</body>
</html>
