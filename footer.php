<!-- Links for app.js -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

    <div id="footer">
    	<div class="bg"></div>
        <div id="credit">
            <a href="http://www.eeshankumar.com" target="_blank" >
                powered by Capital E Web Development
            </a>
        </div>
		<div id="contact" >
            <div class="copy">&copy2015 ALLIED8 ARCHITECTURE + DESIGN LLC</div>
        </div>
    </div><!-- #footer -->

</div><!-- #wrapper -->

<?php wp_footer(); ?> 

<script type="text/javascript">
$('#maximage').maximage({
    cycleOptions: {
        fx:'fade',
        speed: 1000,
        timeout: 5000,
        pause: true,
        prev: '#arrow_left',
        next: '#arrow_right'
    },
    onFirstImageLoaded: function(){
        jQuery('#cycle-loader').hide();
        jQuery('#maximage').fadeIn('fast');
    },
    onImagesLoaded: function(){
        $('#navigation a').click(function(){
            $('#maximage').cycle('pause');
        });
    }
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37358921-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>

</html>