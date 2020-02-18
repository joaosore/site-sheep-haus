import $ from "jquery";
import { mapImovel } from "./map-imovel";

export const maps = {
    parseMaps: function() {
        var imovelMap = document.querySelector('.latlng-map');
        console.log(imovelMap);
        if (imovelMap) {
            var mapJ = $('.latlng-map');
            mapImovel.initMap(imovelMap);
            // mapImovel.setPosition({
            //     coords:{
            //         latitude: mapJ.data('lat'),
            //         longitude: mapJ.data('lng')
            //     }
            // });
        }
    }
}