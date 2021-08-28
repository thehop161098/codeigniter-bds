jQuery(document).ready(function($) {
    if (typeof google === 'object' && typeof google.maps === 'object'){
        initialize();
        setTimeout(function(){
            initializeMapContent();
        }, 1000);
    }
    function initializeMapContent(){
        if($('#maps_content').length <=0) return;
        var data_lat = $('#maps_content').attr('data-lat');
        var data_long = $('#maps_content').attr('data-long');
        var data_address = $('#maps_content').attr('data-address');

        var myLatlng = new google.maps.LatLng(10.762622, 106.660172);

        var myOptions = {
            scrollwheel: false,
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        var map = new google.maps.Map($('#maps_content')[0], myOptions);
        geocoder = new google.maps.Geocoder();
        marker = addMarker(myLatlng, map);

        if(data_lat != 0 && data_long != 0){
            myLatlng = new google.maps.LatLng(data_lat, data_long);
            map.setCenter(myLatlng);
            marker.setPosition(myLatlng);
        }else if(typeof data_address !== "undefined"){

            geocoder.geocode( { 'address': data_address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                }else{
                    map.setCenter(myLatlng);
                    marker.setPosition(myLatlng);
                }
            });
        }
    }
    var map;
    function initialize() {
        if($('#googleMap').length <= 0)  return;

        var default_lat = $('#map_lat').val() != 0 ? $('#map_lat').val(): 10.762622;
        var default_long = $('#map_long').val() != 0 ? $('#map_long').val(): 106.660172;
        var myLatlng = new google.maps.LatLng(default_lat, default_long);

        var myOptions = {
            scrollwheel: false,
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var address = '';

        var map = new google.maps.Map($('#googleMap')[0], myOptions);
        geocoder = new google.maps.Geocoder();

        var marker = addMarker(myLatlng, map);

        if(default_lat == 10.762622){
            address = $('#diachi').val();
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    $('#map_lat').val(results[0].geometry.location.lat());
                    $('#map_long').val(results[0].geometry.location.lng());
                }
            });
        }else{
            address = $('#diachi').val();

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);

                    $('#map_lat').val(results[0].geometry.location.lat());
                    $('#map_long').val(results[0].geometry.location.lng());
                }
            });
        }
    }
    google.maps.event.addDomListener(window, "load", initialize());
    /////////
    function addMarker(myLatlng, map) {
        var marker = new google.maps.Marker({
            draggable: true,
            position: myLatlng,
            map: map,
            title: "Your location"
        });

        marker.addListener('dragend',function(event) {
            document.getElementById("map_lat").value = event.latLng.lat();
            document.getElementById("map_long").value = event.latLng.lng();
        });
        return marker;
    }
    /////////
    $('.js-select-tinhthanhpho, .js-select-quanhuyen, .js-select-phuongxa, .js-select-duong').change(function(event){
        changeAddress();
    });
    function changeAddress(){
        var duong = "";
        if($(".js-select-duong").val() != "" && $(".js-select-duong").val() != 0){
            var street_number = $('.js-input-street-number').val();
            duong = (street_number ? street_number + ' ': '') + $(".js-select-duong option:selected").text() + ", ";
        }

        var phuongxa = "";
        if($(".js-select-phuongxa").val() != "" && $(".js-select-phuongxa").val() != 0){
            phuongxa = $(".js-select-phuongxa option:selected").text() + ", ";
        }

        var quan = "";
        if($(".js-select-quanhuyen").val() != "" && $(".js-select-quanhuyen").val() != 0){
            quan = $(".js-select-quanhuyen option:selected").text() + ", ";
        }

        var tinhthanhpho = "";
        if($(".js-select-tinhthanhpho").val() != "" && $(".js-select-tinhthanhpho").val() != 0){
            tinhthanhpho = $(".js-select-tinhthanhpho option:selected").text();
        }

        if($("#diachi").length){
            $('#diachi').val(duong  + phuongxa  + quan + tinhthanhpho);
            $("#diachi").get(0).setSelectionRange(0,0);
            initialize();
        }
    }
    $("#diachi").blur(function(){
        initialize();
        $("#googleMap").css("display", 'block');
        $("#maps_content").css("display", 'none');
    });
});