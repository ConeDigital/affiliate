<?php
/**
 * The template for displaying the footer
 *
 * @package cone
 */
?>
    </div>
    <footer>
        <div class="max-width footer">
            <div class="footer-item">
                <div class="footer-logo">
                    <p>E-sport<span>365</span></p>
                </div>
                <p>We provide our visitors with the best information and tips when it comes to betting on e-sports whilst giving the best bonuses and deals from the leading betting companies.</p>
            </div>
            <div class="footer-item">
                <h3>E-sports</h3>
                <a href="<?php echo esc_url(home_url('/csgo')); ?>">CSGO</a>
                <a href="<?php echo esc_url(home_url('/dota')); ?>">DOTA</a>
                <a href="<?php echo esc_url(home_url('/lol')); ?>">LOL</a>
                <a href="<?php echo esc_url(home_url('/other')); ?>">Other</a>
            </div>
            <div class="footer-item">
                <h3>Contact us</h3>
                <a href="mailto:info@e-sport356.com">info@e-sport356.com</a>
                <h3>About us</h3>
                <a href="<?php echo esc_url(home_url('/2017/08/02/about-us')); ?>">Read about us</a>
            </div>
            <div class="footer-item">
                <h3>How to bet on:</h3>
                <a href="#">CSGO</a>
                <a href="#">DOTA</a>
                <a href="#">LOL</a>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
<script async src="https://static.apester.com/js/sdk/v2.0/apester-javascript-sdk.min.js"></script>
<script src="https://use.typekit.net/zkn3qen.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
</body>
</html>