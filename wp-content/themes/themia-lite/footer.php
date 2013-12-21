<!--Start Footer bg-->
<div class="footer_bg">
    <!--Start Container-->
    <div class="container_24">
        <!--Start Footer wrapper-->
        <div class="grid_24 footer_wrapper">  
            <?php
            /* A sidebar in the footer? Yep. You can can customize
             * your footer with four columns of widgets.
             */
            get_sidebar('footer');
            ?>
        </div>
        <!--End Footer wrapper-->
        <div class="clear"></div>
    </div>
    <!--End Container-->
    <div class="footer_line">
        <div class="container_24">
            <div class="grid_24">

                <div class="copyright">
                    <?php
                    global $wpdb;
                    $mainblog = $wpdb->blogid;
                    if ($mainblog == 1) {
                    echo '<center>2800 East Linwood Blvd., Kansas City, MO 64128 - <strong>Phone: </strong>(816)931-6290 - <strong>Fax: </strong>(816)931-6142 - <strong>Email: </strong><a href="mailto:info@hopecenterkc.org">info@hopecenterkc.org </a></center>';
                    }
                    if ($mainblog == 2) {
                    echo '<center>2800 East Linwood Blvd., Kansas City, MO 64128 - <strong>Phone: </strong>(816)921-1213 - <strong>Fax: </strong>(816)931-6142 - <strong>Email: </strong><a href="mailto:info@hlakc.org">info@hlakc.org </a></center>';
                     }
                     if ($mainblog == 4) {
                    echo '<center>3027 Prospect Ave, Kansas City, MO 64128 - <strong>Phone:</strong> 816.861.6500 - <strong>Fax:</strong> 816.861.6503 - <strong>Email:</strong> <a href="info@hfcckc.org">info@hfcckc.org</a></center>';
                     }
                     ?>
                 </div>

            </div>
        </div>

    </div>
</div>
<!--End Footer bg-->
<?php wp_footer(); ?>
</body></html>