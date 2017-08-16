$(".logo").css({
         width : 88+'px',
         height : 93+'px'
       });


       var placeSearch, autocomplete;
       var componentForm = {
         street_number: 'short_name',
         route: 'long_name',
         locality: 'long_name',
         administrative_area_level_1: 'short_name',
         country: 'long_name',
         postal_code: 'short_name'
       };

       function initAutocomplete() {

         autocomplete = new google.maps.places.Autocomplete(/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
             {types: ['geocode']});
         autocomplete.addListener('place_changed', fillInAddress);

         //-------------------------------------MapaGeocode---------------------------------------------------
         var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 8,
           center: {lat: -34.397, lng: 150.644}
         });
         var geocoder = new google.maps.Geocoder();

       }

       function fillInAddress() {

         var place = autocomplete.getPlace();

         for (var component in componentForm) {
           document.getElementById(component).value = '';
           document.getElementById(component).disabled = false;
         }


         for (var i = 0; i < place.address_components.length; i++) {
           var addressType = place.address_components[i].types[0];
           if (componentForm[addressType]) {
             var val = place.address_components[i][componentForm[addressType]];
             document.getElementById(addressType).value = val;
           }
         }
       }


       function geolocate() {
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(function(position) {
             var geolocation = {
               lat: position.coords.latitude,
               lng: position.coords.longitude
             };
             var circle = new google.maps.Circle({
               center: geolocation,
               radius: position.coords.accuracy
             });
             autocomplete.setBounds(circle.getBounds());
           });
         }
       }

       function initMap() {

 }

 function LocalizacionMaps(ValueAddress){
   var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 8,
     center: {lat: -34.397, lng: 150.644}
   });
   var geocoder = new google.maps.Geocoder();
   geocodeAddress(geocoder, map ,ValueAddress);

 }


 function geocodeAddress(geocoder, resultsMap,ValueAddress) {
   var address = ValueAddress;
   geocoder.geocode({'address': address}, function(results, status) {
     if (status === 'OK') {
       resultsMap.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({
         map: resultsMap,
         position: results[0].geometry.location
       });
     } else {
       alert('Direccion invalida tipo de error:' + status);
     }
   });
 }

 
