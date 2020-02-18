import $ from "jquery";
import { mapImovel } from "./map-imovel";

export const maps = {
    parseMaps: function() {
        var imovelMap = document.querySelector('.latlng-map');
        if (imovelMap) {
            var mapJ = $('.latlng-map');
            var map = new mapImovel();
            
            // inicializa o mapa e seta a posição
            map.initMap(imovelMap);
            map.setPosition({
                coords:{
                    latitude: mapJ.data('lat'),
                    longitude: mapJ.data('lng')
                }
            });
        }
    }
}