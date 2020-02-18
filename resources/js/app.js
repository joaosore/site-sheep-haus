require("./bootstrap");
require("jquery-mask-plugin");
require("owl.carousel");
require("photoswipe/dist/photoswipe-ui-default");
// require("photoswipe/dist/default-skin");
require("photoswipe");

import "./components/scripts";
import "./components/masks";
import "./components/carousel";
import "./components/chat";
import "./components/tabs";
import "./components/map-imoveis";
import "./login";

$(function(){
	$('.botao-formulario-padrao').click(function(){
		let dataString = 'nome='+ name + '$tipo=' + type;
		$.ajax({
			Type:"PUT",
			url:"/property/{id}",
			data: dataString,
			sucess: function(){
				console.log("sucesso");
			}
		});
		return false;
	});
});
