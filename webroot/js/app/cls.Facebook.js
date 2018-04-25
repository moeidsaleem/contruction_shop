// JavaScript Document
//Facebook function
function clsFacebook() {
    this.init = function () {
    };
    this.loginFB = function (callback_function) //action login FB
    {
        var self = this;
        try {
            FB.login(function (response) {
                if (response.authResponse) {
                    if (response.status == 'connected') {
                        //console.log('getAuthResponse',FB.getAuthResponse());
                        if (typeof(callback_function) == 'function') {
                            callback_function(response);
                        }
                    }
                    else {
                        console.log(response);
                    }
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: 'email'});//rsvp_event
        }
        catch (e) {
            console.log(e.message);
        }
    };
    this.connectFB = function (callback_function) //force login FB
    {
        var self = this;
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                //console.log(uid, accessToken);
                if (typeof(callback_function) == 'function') {
                    callback_function(response);
                }
            } else if (response.status === 'not_authorized') {
                console.log(1, response);
                self.loginFB(callback_function);
                // the user is logged in to Facebook,
                // but has not authenticated your app
            } else {
                console.log(2, response);
                self.loginFB(callback_function);
                // the user isn't logged in to Facebook.
            }
        }, false);
    };
    this.checkLogged = function (callback_function, not_connect_callback_function) {
        var self = this;
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                // the user is logged in and has authenticated your
                // app, and response.authResponse supplies
                // the user's ID, a valid access token, a signed
                // request, and the time the access token
                // and signed request each expire
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                //console.log(uid, accessToken);
                if (typeof(callback_function) == 'function') {
                    callback_function(response);
                }
            } else if (response.status === 'not_authorized') {
                console.log(1, response);
                if (typeof(not_connect_callback_function) == 'function') {
                    not_connect_callback_function();
                }
                // the user is logged in to Facebook,
                // but has not authenticated your app
            } else {
                if (typeof(not_connect_callback_function) == 'function') {
                    not_connect_callback_function();
                }
                console.log(2, response);
                // the user isn't logged in to Facebook.
            }
        }, false);
    };
    this.logout = function (callback_function) {
        try {
            FB.logout(function (response) {
                console.log(response);
                if (typeof(callback_function) == 'function') {
                    callback_function(response);
                }
            });
        }
        catch (e) {
            console.log(e.message);
        }
    };
    this.getUserInfo = function (callback_function) {
        try {
            FB.api('/me?fields=first_name,last_name,middle_name,email,birthday,age_range', function (response) {
                //console.log(response);
                if (typeof(callback_function) == 'function') {
                    callback_function(response);
                }
            });
        }
        catch (e) {
            console.log(e.message);
        }
    };
}

var facebookObj = new clsFacebook();
$(document).ready(function (e) {

});
		