        </div><!-- end content -->
        <footer>
            <div class="row">
                <div id="footer-text" class="col-sm-9">
                    <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
                    <p><?php echo $footerText; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3">
                    <p class="omeka-props-footer text-right"><?php echo __('Proudly powered by <a href="https://omeka.org">Omeka</a>.'); ?></p>
                </div>
            </div>
            <div>
                <?php fire_plugin_hook('public_footer'); ?>
            </div>
        </footer>
</div><!--end wrap-->

    <?php
    // Omeka 2.4 and Bootstrap 3.3.7 use the same jQuery (1.12), so it is not
    // recalled.
    ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



   <!--  <script type="text/javascript">
    $(document).ready(function() {
		$('nav#main-nav  li').addClass('nav-item');
		$('nav#main-nav  li a').addClass('nav-link');
        });
 
    </script> -->

</body>
</html>
