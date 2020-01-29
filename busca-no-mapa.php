<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
require_once("adiciona-Newsletters.php");
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="js/code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap-4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap-4.2.1/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
  <script type='text/javascript' src='js/javaScript.js' ></script>
	<link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/geral.css">
	<link rel="stylesheet" href="css/buscaNoMapa.css">
		<title>Busca no Mapa</title>
</head>
<body>
	<div class="container-fluid interfaceMapa">
	   <div class="row rowMapa" >
		<div class="rowMapaBody">
			<div id="map"  class="col-sm-12"></div>
		</div>
    <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng( -23.533773,  -46.625290),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow({maxWidth: 341});
        markerIcon = {
				url: 'http://image.flaticon.com/icons/svg/252/252025.svg',
				scaledSize: new google.maps.Size(30, 30),
			};
			<?php
          $ImoveisDao = new ImoveisDao($conn);
          $imoveis =$ImoveisDao->imovelBuscaMapar();
		    ?>
        var imoveis = <?php echo json_encode( $imoveis) ?>;
        var markers = [];
          window.onload = function(){ 
        	  imoveis.forEach(marcar);
        	  var markerCluster = new MarkerClusterer(map, markers,
                      {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
         }
         function com_ou_sem_s(num){
           if(num>1){res="s"}else{res=""};
           return res;
          }
          function marcar(imovel){
                var point = new google.maps.LatLng(imovel.endereco.lat, imovel.endereco.lng); 
                  var infowincontent = document.createElement('div');
                  infowincontent.className='infowincontent';
	                  var span = document.createElement('span');
	                  span.className = 'text-center';
	                  var result;
	     		      if (imovel.transacao == "Venda"){ result= " a " }else{  result ="  para "}
	     		      span.textContent = imovel.tipo+result+ imovel.transacao+" R$ "+imovel.preco;
	     		      infowincontent.appendChild(span);
                  var divSlider = document.createElement('div');
                      divSlider.id = 'carouselExampleControls';
                      divSlider.className = 'carousel slide';
                      divSlider.setAttribute("data-ride", "carousel");
                      divSlider.setAttribute("data-interval", "false");
                      infowincontent.appendChild(divSlider);
                      
                  var divSliderBody  = document.createElement('div');
	                  divSliderBody.className = 'carousel-inner';
	                  divSliderBody.setAttribute("role","listbox");
                    divSlider.appendChild(divSliderBody);
                 var fotos =imovel.foto;
                  for(i in fotos){ 
                    var num=parseInt(i)+1;
                    if(i<=3){
	                  var divSliderBodyBody = document.createElement('div');
                      if(i==0){ 
                        divSliderBodyBody.className = 'carousel-item  active';
                      }else{
                    	  divSliderBodyBody.className = 'carousel-item'; 
                      }
	                  divSliderBody.appendChild(divSliderBodyBody);
	                    var img = new Image(); 
	                	  img.src ='foto/'+fotos[i].nome_foto;
                      img.className = 'd-block w-100';
                      divSliderBodyBody.appendChild(img);
                      var span2 = document.createElement('span');
                      span2.textContent=num+'/'+fotos.length;
                      span2.className = 'numero_foto';
                      divSliderBodyBody.appendChild(span2);
                	  }
                	}
                  var a1 = document.createElement('a');
                  a1.className='carousel-control-prev';
                  a1.setAttribute('href','#carouselExampleControls');
                  a1.setAttribute('data-slide','prev');
                  a1.setAttribute('role','button');
                  divSlider.appendChild(a1);
                  var span1 = document.createElement('span');
                  span1.className='carousel-control-prev-icon';
                  span1.setAttribute('aria-hidden','true');
                  a1.appendChild(span1);
                  var span2 = document.createElement('span');
                  span2.className='sr-only';
                  span2.textContent = 'Previous';
                  a1.appendChild(span2);
                  var a2 = document.createElement('a');
                  a2.className='carousel-control-next';
                  a2.setAttribute('href','#carouselExampleControls');
                  a2.setAttribute('data-slide','next');
                  a2.setAttribute('role','button');
                  divSlider.appendChild(a2);
                  var span3 = document.createElement('span');
                  span3.className='carousel-control-next-icon';
                  span1.setAttribute('aria-hidden','true');
                  a2.appendChild(span3);
                  var span4 = document.createElement('span');
                  span4.className='sr-only';
                  span4.textContent = 'Next';
                  a2.appendChild(span4);
                  var btnInfo = document.createElement("button");
                  btnInfo.className='btnB infoB btn-xs';
                  var abtnInfo = document.createElement('a');
                  abtnInfo.textContent = '+ Detalhes';
                  abtnInfo.setAttribute('href',href="detalhes.php?n="+imovel.id);
                  btnInfo.appendChild(abtnInfo);
                  var btnText = document.createElement("button");
                  btnText.className='btnB default btn-xs';
                  infowincontent.appendChild(btnInfo);
                  infowincontent.appendChild(btnText);
                  var info=document.createElement('div');
                  info.className='text-center info';
                  var iDorm=document.createElement('i');
                  var svgDorm = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                  svgDorm.setAttribute('class','item‐icone-info');
                  var useDorm = document.createElementNS('http://www.w3.org/2000/svg', 'use');
                  useDorm.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', 'icon/categorias.svg#quarto');
                  svgDorm.appendChild(useDorm);
                  iDorm.textContent=imovel.dormitorio+":Dorm"+com_ou_sem_s(imovel.dormitorio)+'|';
                  info.appendChild(svgDorm);
                  info.appendChild(iDorm);     
                  var iSuite=document.createElement('i');
                  var svgSuite = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                  svgSuite.setAttribute('class','item‐icone-info');
                  var useSuite = document.createElementNS('http://www.w3.org/2000/svg', 'use');
                  useSuite.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', 'icon/categorias.svg#suite');
                  svgSuite.appendChild(useSuite);
                  iSuite.textContent=imovel.suite+":suite"+com_ou_sem_s(imovel.suite)+'|';
                  info.appendChild(svgSuite);
                  info.appendChild(iSuite);
                  var iVaga=document.createElement('i');
                  var svgVaga = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                  svgVaga.setAttribute('class','item‐icone-info');
                  var useVaga = document.createElementNS('http://www.w3.org/2000/svg', 'use');
                  useVaga.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', 'icon/categorias.svg#vaga');
                  svgVaga.appendChild(useVaga);
                  iVaga.textContent=imovel.vaga+":vaga"+com_ou_sem_s(imovel.vaga)+'|';
                  info.appendChild(svgVaga);
                  info.appendChild(iVaga);
                  var iBanheiro=document.createElement('i');
                  var svgBanheiro = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                  svgBanheiro.setAttribute('class','item‐icone-info');
                  var useBanheiro = document.createElementNS('http://www.w3.org/2000/svg', 'use');
                  useBanheiro.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', 'icon/categorias.svg#banheiro');
                  svgBanheiro.appendChild(useBanheiro);
                  iBanheiro.textContent=imovel.banheiro+":banheiro"+com_ou_sem_s(imovel.banheiro);
                  info.appendChild(svgBanheiro);
                  info.appendChild(iBanheiro);             
                  infowincontent.appendChild(info);
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: markerIcon,
                  });
                  
                  markers.push(marker);
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                  }); 
               }  	  
            }
    </script>
  </div>
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"> </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCD3ebDDRJOOzeZMeiznBdIS2YXpjGko&callback=initMap" type="text/javascript"></script>  
  <?php include("rodape.php") ?>