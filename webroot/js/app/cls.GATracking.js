// JavaScript Document
function clsGATracking(){	
	this.timeout_fallback;
	this.init = function(){
		this.bind_events_for_ET();
    };
	this.bind_events_for_ET = function()
	{		
		var thisObj = this;
		$(document).on('click', '[et]', function() {
			var params = $(this).attr('et');
			return thisObj.GA_tracking_ET($(this),params);
		});
		setTimeout(function(){
			try {
				thisObj.GA_tracking_event('timespent','event','10000');				
			} 
			catch(e) {}
		},10000);
	};
	this.GA_tracking_ET = function(elementOBJ,params){
		var thisObj = this;
		var tagName = elementOBJ.prop("tagName").toLowerCase();
		if (params != '') 
		{
			var arr_params = params.split('-');
			var category = arr_params[0];
			var action = arr_params[1] ? arr_params[1] : 'mousedown';
			var label = arr_params[2] ? arr_params[2] : '';
			var lang = (typeof window_app.language != 'undefined') ?  window_app.language : '';
			if(lang != ''){
				if(label == '') {					
					label = lang;
				}
				else {					
					label += '-' +lang;
				}
			}
			try	{
				if(tagName != 'a') // is not link
				{
					thisObj.GA_tracking_event(category,action,label);
				}
				else
				{
					var href = typeof(elementOBJ.attr('href')) !== 'undefined'  ? elementOBJ.attr('href').toLowerCase() : '';
					var target = typeof(elementOBJ.attr('target')) !== 'undefined'  ? elementOBJ.attr('target').toLowerCase() : ''; 
					if(href.indexOf('javascript:') >= 0 || href=='#' || target == '_blank') //link but is event or external link
					{
						thisObj.GA_tracking_event(category,action,label);
					}
					else
					{
						var functionCallback = function(callBackFunction){
							thisObj.GA_tracking_event(category,action,label,function(){
								callBackFunction();
								return false;	
							});
						};
						thisObj.GA_tracking_event_for_link(elementOBJ,functionCallback);	
						return false;		
					}
				}
			} 
			catch(e) {
				console.log(e);
			}
		}
	}
	this.GA_tracking_event_for_link = function(elementOBJ,callTrackingFunction){
		var href = elementOBJ.attr('href');
		var target = elementOBJ.attr('target');
		var callback_href = setTimeout(function(){
				if( typeof(href) !== 'undefined' && href !== '' && href !== '#')
				{
					if(target === '_top'){
						window.top.location.href =  href;				
					}
					else{
						window.location.href =  href;				
					}			
				}
		},3000);
		callTrackingFunction(function(){
			if( typeof(href) !== 'undefined' && href !== '' && href !== '#')
			{
				if(target === '_top'){
					window.top.location.href =  href;
				}
				else{
					window.location.href =  href;									
				}
				clearTimeout(callback_href);	
				return false;
			}
		});
		return false;	
	};
	this.GA_tracking_event = function(category,action,label,functionCallback,functionFaillback)
	{
		try {

			console.log(category,action,label);
			var params = {
							eventCategory:category,
							eventAction:action,
							eventLabel:	label			
						 }
			//ga('secondTracker.send', 'event', params);		
			if(typeof(functionCallback) == 'function')
			{
				params.hitCallback = functionCallback;
			}
			if(typeof(functionFaillback) == 'function')
			{
				params.hitCallbackFail = functionFaillback;
			}			
			ga('send', 'event', params);
			//delete params['hitCallback'];
			//delete params['hitCallbackFail'];			
			//this.GA_tracking_event('Demo','Test','',function(){alert('OK')},function(){alert('Fail')});
		} 
		catch(e) {}		
	};
	this.GA_tracking_page = function (page,functionCallback,functionFaillback)
	{
		try {
			var params = {page:'/'+page}
			//ga('secondTracker.send', 'pageview', params);			
			if(typeof(functionCallback) == 'function')
			{
				params.hitCallback = functionCallback;
			}
			if(typeof(functionFaillback) == 'function')
			{
				params.hitCallbackFail = functionFaillback;
			}
			ga('send', 'pageview',params );
			//delete params['hitCallback'];
			//delete params['hitCallbackFail'];			
			//this.GA_tracking_page('demo',function(){alert('OK')},function(){alert('Fail')});
		
		} catch(e) {}	
	};
	this.GA_eventConversionGoals = function(action,label,functionCallback,functionFaillback)
	{
		var thisObj = this;
		var functionCallback_with_clearTimeout;
		if(typeof(functionCallback) === 'function')
		{
			if(typeof thisObj.timeout_fallback !== 'undefined'){
				clearTimeout(thisObj.timeout_fallback);
			}
			this.timeout_fallback = setTimeout(function(){
					functionCallback();
				},2000);
			functionCallback_with_clearTimeout = function(){
					if(typeof thisObj.timeout_fallback !== 'undefined'){
						clearTimeout(thisObj.timeout_fallback);
					}
					functionCallback();
			};		
		}
		//console.log(action,label);
		var category = 'ConversionGoals';
		try {
			this.GA_tracking_event(category,action,label,functionCallback_with_clearTimeout,functionFaillback);
		} 
		catch(e) {}		
	};
	this.getClientID = function()
	{
		var result = '';
		ga(function(tracker) {
		  var clientId = tracker.get('clientId');
		  result = clientId;
		});
		return result;
	};
}
var GATrackingOBJ = new clsGATracking();
$(document).ready(function() {
	GATrackingOBJ.init();
});
