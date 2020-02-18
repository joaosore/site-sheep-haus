import { colors } from "../utils/colors";

export const mapImovel = {

    $map: null,
    you: null,
    map: null,
    latLng: null,

    initMap: function(el) {
        this.setPosition = this.setPosition.bind(this);

        this.$map = el;

        this.verifyLocation();

        if (this.$map) {
            this.map = new google.maps.Map(this.$map, {
                zoom: 15,
                options: {
                    styles: colors.mapStyles
                }
            });
        }
    },

    setPosition: function(position) {
        if (position) {
            this.map.setCenter({
                lat: position.coords.latitude,
                lng: position.coords.longitude
            })

            this.you = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            new google.maps.Marker({
                position: this.you,
                map: this.map
            });
        }
    },

    verifyLocation: function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(this.setPosition);
        } else {
            console.warning("não foi possível pegar a localização");
        }
    },
}