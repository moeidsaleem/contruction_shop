function clsGoogleMap(){
    //Map variables
    this.map = null;
    this.markers = [];
    this.markersCluster;
    this.autocomplete;
    //flow variables
    this.marker_addingPlace;
    this.enable_addingPlace = false;

    this.map_init = function(mapContainer,startLocation_lat,startLocation_lng,map_options,fn_callback){
        var self = this;
        if(this.map == null && $('#'+mapContainer).length >0)
        {
            var latlng = new google.maps.LatLng(startLocation_lat,startLocation_lng);
            this.map = new google.maps.Map(document.getElementById(mapContainer), {
                center: latlng,
                zoom: typeof (map_options.zoom) !== 'undefined' ? map_options.zoom : 12,
                streetViewControl: typeof (map_options.streetViewControl) !== 'undefined' ? map_options.streetViewControl : false,
                draggable : typeof (map_options.draggable) !== 'undefined' ? map_options.draggable : true,
                scrollwheel : typeof (map_options.scrollwheel) !== 'undefined' ? map_options.scrollwheel : false,
                zoomControl : typeof (map_options.zoomControl) !== 'undefined' ? map_options.zoomControl : true,
                clickableIcons : typeof (map_options.clickableIcons) !== 'undefined' ? map_options.clickableIcons : false,
                disableDoubleClickZoom :  typeof (map_options.disableDoubleClickZoom) !== 'undefined' ? map_options.disableDoubleClickZoom : true,
                fullscreenControl : false,
                mapTypeControl : true,
                mapTypeId   :   google.maps.MapTypeId.TERRAIN,
                minZoom     : 6
            });
            //self.add_marker(window_app.userLocation.lat,window_app.userLocation.lng);
            google.maps.event.addListenerOnce(this.map, 'idle', function(){
                if(typeof (fn_callback) === 'function')
                {
                    fn_callback();
                }
            });
            google.maps.event.addListener(this.map, 'click', function(event){
                self.add_addingPlace(event.latLng);
            });
        }
    };
    this.initAutocomplete = function(inputID,callback)
    {
        var self = this;
        if(typeof (this.autocomplete) == 'undefined' && inputID != '')
        {
            //Build autocomplete
            var options = {
                //types: ['(cities)'],
                componentRestrictions: {country: 'be'}
            };
            var input = document.getElementById(inputID);
            this.autocomplete = new google.maps.places.Autocomplete(input,options);

            this.autocomplete.addListener('place_changed', function() {
                var place = self.autocomplete.getPlace();
                if (typeof (place) == 'undefined' || typeof (place.geometry) == 'undefined') {
                    return;
                }
                /*
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport && false) {
                    self.map.fitBounds(place.geometry.viewport);
                } else {

                }*/
                var address_components_length = place.address_components.length;
                var zoom_lvl = 12;
                if(address_components_length <= 3){
                    zoom_lvl = 13;
                }
                else if(address_components_length == 4){
                    zoom_lvl = 14;
                }
                else { // street
                    zoom_lvl = 16;
                }
                var center_map = place.geometry.location;
                //console.log(place.address_components);
                //self.add_marker(center_map.lat(),center_map.lng());
                //center_map = new google.maps.LatLng(searching_result.lat,searching_result.lng);
                self.map.setCenter(center_map);
                self.map.setZoom(zoom_lvl);  // Why 17? Because it looks good.
                if(typeof (callback) == 'function')
                {
                    callback();
                }
            });
            //Build autocomplete
        }
    };
    this.add_marker = function (lat, lng)
    {
        var map = this.map;
        var myLatlng = new google.maps.LatLng(lat,lng);
        var marker = new google.maps.Marker({
            position: myLatlng,
            draggable:false,
            icon: new google.maps.MarkerImage(window_app.webrootImage+'images/map/pin-add.png',new google.maps.Size(76,96) ),
            map: map

        });
        //marker.setMap(null);
        marker.setAnimation(google.maps.Animation.DROP);
        return marker;
    };
    this._generate_CusterStyles = function ()
    {
        //var layout = (SiteMain.getBootstrapDeviceSize() == "sm" || SiteMain.getBootstrapDeviceSize() == "xs") ? 'mobile' : 'desktop';
        var layout = 'desktop';
        var cluster_style = [
            {
                url: window_app.webrootImage+'images/map/pin-white.png',
                width: layout == 'desktop' ? 98 : 98,
                height: layout == 'desktop' ? 117 : 117,
                textColor: '#000000',
                textSize: layout == 'desktop' ? 18 : 26,
                fontWeight:'bold',
                anchor: [0,0]

            },
            {
                url: window_app.webrootImage+'images/map/pin-white.png',
                width: layout == 'desktop' ? 98 : 98,
                height: layout == 'desktop' ? 117 : 117,
                textColor: '#000000',
                textSize: layout == 'desktop' ? 22 : 30,
                fontWeight:'bold',
                anchor: [0, 0]
            },
            {
                url: window_app.webrootImage+'images/map/pin-white.png',
                width: layout == 'desktop' ? 98 : 98,
                height: layout == 'desktop' ? 117 : 117,
                textColor: '#000000',
                textSize: layout == 'desktop' ? 26 : 34,
                fontWeight:'bold',
                anchor: [0, 0]
            }];
        return cluster_style;
    };
    this._createClusterMaker = function (lat, lng, optData){
        var div = document.createElement('DIV');
        var html_img = '<img class="map-marker-icons-images" src="'+window_app.webrootImage+'images/map/pin-white.png'+'">';
        html_img += '<img class="map-marker-icons-images" src="'+'https://graph.facebook.com/'+optData.fb_id+'/picture?width=20&height=20'+'">';
        div.innerHTML = '<div class="map-marker-icons">'+html_img+'</div>';
        var marker = new RichMarker({
            //map: map,
            position: new google.maps.LatLng(lat,lng),
            draggable: false,
            flat: true,
            //anchor: RichMarkerPosition.MIDDLE,
            content: div,
            optData : optData
        });
        google.maps.event.addListener(marker, 'click', function(e) {
            console.log(marker.optData);
        });
        return marker;
    }
    this.add_markers_clusters = function (markersList){
        var self = this;
        if(!$.isEmptyObject(self.markersCluster)){
            self.markersCluster.clearMarkers();
            self.markers = [];
        }
        var cluster_style = self._generate_CusterStyles();
        self.markersCluster = new MarkerClusterer(self.map, markersList, {
            maxZoom: 20,
            gridSize: 40,
            styles: cluster_style
        });
    }
    //functions
    this.add_addingPlace = function (latLng)
    {
        var self = this;
        if(self.enable_addingPlace == true){
            if(!$.isEmptyObject(self.marker_addingPlace)){
                self.marker_addingPlace.setMap(null);
            }
            self.marker_addingPlace = self.add_marker(latLng.lat(),latLng.lng());
        }

    };
    this.remove_addingPlace = function ()
    {
        var self = this;
        if(!$.isEmptyObject(self.marker_addingPlace)){
            self.marker_addingPlace.setMap(null);
            self.marker_addingPlace = null;
        }
        self.enable_addingPlace == false;
    };
    this.get_addingPlace_location = function ()
    {
        var self = this;
        if(!$.isEmptyObject(self.marker_addingPlace)){
            if(typeof self.marker_addingPlace == 'object'){
                if(typeof self.marker_addingPlace.getPosition == 'function'){
                    return self.marker_addingPlace.getPosition();
                }
            }
        }
        return null;
    };
    this.show_all_pins = function ()
    {
        var self = this;
        var markersList = [];
        $.each(window_app.pins,function(index, pin_data){
            var lat = pin_data.location_lat;
            var lng = pin_data.location_lng;
            var maker_data = pin_data;
            var marker = self._createClusterMaker(lat, lng, maker_data);
            markersList.push(marker);
        });
        self.add_markers_clusters(markersList);
    };
}
var googleMap = new clsGoogleMap();
$(document).ready(function(){
    googleMap.map_init('map',50.857474, 4.358354,{scrollwheel:true,zoom:12},function(){
        googleMap.initAutocomplete('txt-search',function () {
        });
        googleMap.show_all_pins();
    });
});


