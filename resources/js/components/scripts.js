import $ from "jquery";
import "bootstrap-3-typeahead";
import { mapImoveis } from "./map-imoveis";
import { settings } from "../utils/settings";

var course = $("#course_id").data("route");
$("#course_id").typeahead({
  source: function(term, process) {
    return $.get(course, { term: term }, function(data) {
      return process(data);
    });
  }
});

var college = $("#college_id").data("route");
$("#college_id").typeahead({
  source: function(term, process) {
    return $.get(college, { term: term }, function(data) {
      return process(data);
    });
  }
});

var placeSearch, autocomplete;

$.getScript(
  `https://maps.googleapis.com/maps/api/js?key=${settings.mapsApiKey}&libraries=places`,
  function(data, textStatus, jqxhr) {
    initAutocomplete();
    geolocate();
    mapImoveis.initMap();
  }
);

var componentForm = {
  street_number: "short_name",
  locality: "long_name",
  administrative_area_level_1: "short_name",
  country: "long_name",
  postal_code: "short_name"
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById("autocomplete"),
    { types: ["geocode"] }
  );

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(["address_component", "geometry"]);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  var latitude = place.geometry.location.lat();
  var longitude = place.geometry.location.lng();

  var geolocation = {
    lat: latitude,
    lng: longitude
  };

  $("#lat").val(latitude);
  $("#lng").val(longitude);

  initMap(geolocation);

  for (var component in componentForm) {
    document.getElementById(component).value = "";
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {};

      if ($("#lng").val().length > 0 && $("#lat").val().length > 0) {
        geolocation = {
          lat: parseFloat($("#lat").val()),
          lng: parseFloat($("#lng").val())
        };
      } else {
        geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        $("#lat").val(position.coords.latitude);
        $("#lng").val(position.coords.longitude);
      }

      initMap(geolocation);

      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

var map;
function initMap(geolocation) {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: geolocation.lat, lng: geolocation.lng },
    zoom: 8
  });
  var item = new google.maps.LatLng(geolocation.lat, geolocation.lng);
  new google.maps.Marker({
    position: item,
    map: map
  });
}
