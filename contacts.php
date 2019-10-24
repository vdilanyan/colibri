<?php
//Template Name: Contacts

$context = Timber::get_context();

$social_links = get_field('social_links', 'option');

$context['contacts'] = [
	'google_map' => get_field('google_map'),
	'form_id' => get_field('form_id'),
	'company_name' => get_field('company_name'),
	'address' => get_field('address'),
	'general_enquiries' => get_field('general_enquiries'),
	'technical_enquiries' => get_field('technical_enquiries'),
	'social_links' => $social_links,
];

Timber::render('templates/contacts.twig', $context);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiyKnaTC2TJt_bj6P93vXntyFjar1cFrQ"></script>
<script type="text/javascript">
(function($) {
	function new_map($el) {
		var $markers = $el.find('.marker');
		
		var args = {
			zoom: 16,
			center: new google.maps.LatLng(0, 0),
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP]
			},
			disableDefaultUI: true,
		};

		var map = new google.maps.Map($el[0], args);

		map.markers = [];

		$markers.each(function() {
			add_marker($(this), map);
		});
		
		center_map(map);

		return map;
	}

	function add_marker($marker, map) {
		var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

		var marker = new google.maps.Marker({
			position: latlng,
			map: map
		});

		map.markers.push( marker );

		if($marker.html()) {
			var infowindow = new google.maps.InfoWindow({
				content: $marker.html()
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}
	}

	function center_map(map) {
		var bounds = new google.maps.LatLngBounds();

		$.each(map.markers, function(i, marker) {
			var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
			bounds.extend( latlng );
		});

		if (map.markers.length == 1) {
			map.setCenter(bounds.getCenter());
			map.setZoom(18);
		} else {
			map.fitBounds(bounds);
		}
	}

	var map = null;

	$(document).ready(function(){
		map = new_map($('#contacts-map'));
	});
})(jQuery);
</script>