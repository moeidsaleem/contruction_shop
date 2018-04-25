<?php
	$fb_locale = !empty($user_locale) ? $user_locale : "en_US";
?>
<script type="text/javascript">
        window.fbAsyncInit = function() {
        FB.init({
                appId      : '<?php echo $FB_appID; ?>',
                xfbml      : true,
                version    : 'v2.4'
            });
			FB.getLoginStatus(function(response){
				console.log( "FB.getLoginStatus",response );
			});
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/<?php echo $fb_locale ?>/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>