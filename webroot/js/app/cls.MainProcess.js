function clsMainProcess(){
	this.is_ajaxSaving = false;
   	this.main_init = function(){
	    validateObj.init();
		this.bind_events();  
    };
	//bind event
	this.bind_events = function() {
        var parentObj = this;

	};
	this.detectPopupBlocker = function() {
		var test = window.open(null,"","width=100,height=100");
		try {
			test.close();
			alert("Pop-ups not blocked.");
		} catch (e) {
			alert("Pop-ups blocked.");
		}
	};
}
var mainProcess = new clsMainProcess();

$(document).ready(function(){
	mainProcess.main_init();
});



