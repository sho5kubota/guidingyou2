    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{$base_dir_ssl}modules/agilemultipleseller/js/googlemaps.js"></script>
    <script type="text/javascript">
        var map;
        var geocoder = new google.maps.Geocoder();
        var markersArray = [];

        $(document).ready(function() {
            resetMap();
        });

        function resetMap() {
            initializeMap($("input#latitude").val(), $("input#longitude").val(), 12, "map_canvas");
            loc = new google.maps.LatLng($("input#latitude").val(), $("input#longitude").val());
            addMarker("0", loc);

            google.maps.event.addListener(map, "click", function(event)
            {
                // place a marker
                placeMarker(event.latLng);

                // display the lat/lng in your form's lat/lng fields
                $("input#latitude").val(event.latLng.lat());
                 $("input#longitude").val(event.latLng.lng());
            });
        }

        function codeAddress() {

            

            /*var address = 
                          $("select#country option:selected").text() + " " +$("input#city_1").val();
			       */
         
            if(is_multilang) {
                var address = "";
                 if($("input#address_" + id_language).val() != null || $("input#address_" + id_language).val() != undefined || $("input#address_" + id_language).val() != "")
                    address += $("input#address_" + id_language).val() 
                if($("input#address2_" + id_language).val() != null || $("input#address2_" + id_language).val() != undefined || $("input#address2_" + id_language).val() != "")
                    address += " " + $("input#address2_" + id_language).val() 
                if($("input#city_" + id_language).val() != null || $("input#city_" + id_language).val() != undefined || $("input#city_" + id_language).val() != "")
                    address += "," + $("input#city_" + id_language).val() 
                if($("input#id_state").val() != null || $("input#id_state").val() != undefined || $("input#id_state").val() != "")
                    address += " " + $("select#id_state option:selected").text() 
                if($("input#id_country").val() != null || $("input#id_country").val() != undefined || $("input#id_country").val() != "")
                     address += " " + $("select#id_country option:selected").text();

            } else {

                 var address = "";
                if($("input#address_1").val() != null || $("input#address_1").val() != undefined || $("input#address_1").val() != "")
                    address += $("input#address_1").val() 
                if($("input#address2_1").val() != null || $("input#address2_1").val() != undefined || $("input#address2_1").val() != "")
                    address += " " + $("input#address2_1").val() 
                if($("input#city_1").val() != null || $("input#city_1").val() != undefined || $("input#city_1").val() != "")
                    address += "," + $("input#city_1").val() 
                if($("input#id_state").val() != null || $("input#id_state").val() != undefined || $("input#id_state").val() != "")
                    address += " " + $("select#id_state option:selected").text() 
                /*if($("input#postcode").val() != null || $("input#postcode").val() != undefined || $("input#postcode").val() != "")
                    address += "," + $("input#postcode").val() */
            if($("input#id_country").val() != null || $("input#id_country").val() != undefined || $("input#id_country").val() != "")
                    address += " " + $("select#id_country option:selected").text();

            }


                /*
                address = $("input#address_" + id_language).val() + " " +
                          $("input#address2_" + id_language).val() + "," +
                          $("input#city_" + id_language).val() + " " +
                          $("select#id_state option:selected").text() + "," +
                            $("input#postcode").val() + " " +
                          $("select#id_country option:selected").text();*/


             console.log(address);

            geocoder.geocode({ "address": address }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    $("input#latitude").val(results[0].geometry.location.lat());
                    $("input#longitude").val(results[0].geometry.location.lng());
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }

                resetMap();
            });
        }

        function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map
            });

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
		
    </script>
	<input type="button" name="btnGeoCode" value="{l s='Click Here To Get Map Location' mod='agilemultipleseller'}" onclick="javascript:codeAddress()" />
	<div id="map_canvas" class="agile-map-canvas"></div>
