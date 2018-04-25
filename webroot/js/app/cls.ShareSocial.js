// JavaScript Document
//Facebook function
function clsShareSocial(){
	this.init = function(){
	}
    this.shareFacebook = function(callbackFunction){
        var picture = $('meta[property="og:image"]').attr('content');
        var name = $('meta[property="og:site_name"]').attr('content');
        var caption = $('meta[property="og:title"]').attr('content');
        var description = $('meta[property="og:description"]').attr('content');
        var link = $('meta[property="og:url"]').attr('content');

        var obj = {
            method: 'feed',
            link: link,
            picture: picture,
            name: name,
            caption: caption,
            description: description,
            actions: [{ name: 'The Best Driver', link: window_app.webroot_full }]
        };

        FB.ui(obj,function(response){
            if(typeof(callbackFunction) === 'function')
			{
				callbackFunction(response);
			}
			if (response && !response.error_message) {
                //alert('Posting completed.');
                console.log(response);
            } else {
                //alert('Error while posting.');
            }
            //console.log(response);
        });
    }

    this.fbShare = function(sharing_url){
        if (typeof sharing_url === "undefined") {
			sharing_url = window_app.webroot_full + window_app.language;
		}	
        
        sharing_url = encodeURIComponent(sharing_url);
        var url = "http://www.facebook.com/sharer.php?u=" + sharing_url;

        var w = 620;
        var h = 560;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, 'Share', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
        window.open(url);
    }

    this.shareTW = function(sharing_url,share_content,hashtags){
        if (typeof sharing_url === "undefined") {
			sharing_url = $('meta[name="twitter:url"]').attr('content');
		}	
		if (typeof share_content === "undefined") {
			share_content = $('meta[name="twitter:description"]').attr('content');
		}		
        var url = 'https://twitter.com/intent/tweet?text='+share_content+'&url='+sharing_url;
        if (typeof hashtags !== "undefined") {
			url += '&hashtags='+hashtags;
		}	
		var w = 620;
        var h = 300;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        window.open(url, "_blank", 'toolbar=no, scrollbars=no, resizable=yes, width='+w+', height='+h+', top='+top+', left='+left);
        //window.open(url, '"_blank"', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
        //window.open(url);
    }
	this.shareGooglePlus = function (sharing_url)
	{
		if (typeof sharing_url === "undefined") {
			sharing_url = window_app.webroot_full;
		}		
		var url = "https://plus.google.com/share?url=" + sharing_url;
		this.OpenBox(580,500,url);
	}
	this.shareLinkedin = function (sharing_url)
	{
		if (typeof sharing_url === "undefined") {
			sharing_url = window_app.webroot_full;
		}		
		var url = 'https://www.linkedin.com/cws/share?url='+sharing_url;
		this.OpenBox(700,500,url);
	}
	this.OpenBox = function (winWidth, winHeight, fileSrc, scrollbars)
	{
		if(screen.width)
		{
			var winl = (screen.width - winWidth) / 2;
			var wint = (screen.height - winHeight) / 2;
		}
		else
		{
			winl = 0; wint =0;
		}
		if (winl < 0) winl = 0;
		if (wint < 0) wint = 0;
		var props = 'top='+wint+',left='+winl+',toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars='+scrollbars+',resizable=no,width='+winWidth+',height='+ winHeight;
		window.open(fileSrc, 'FullScreen', props);
	}
}
var ShareSocialObj = new clsShareSocial();
$(document).ready(function(e) {
    
});
		