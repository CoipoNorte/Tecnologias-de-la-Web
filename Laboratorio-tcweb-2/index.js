function init() { //Funcion de tipo ONLOAD//
    getLocation();  // <- API GPS
    Relojowo();     // <- Reloj
    LStorage(); // <- local Storage
}
function Relojowo() { //Reloj ojo//
    var s = document.getElementById("seg");             
    var m = document.getElementById("min");             
    var h = document.getElementById("hr");     
                                                    
    window.setInterval(function() {                 
        tiempo = new Date();                        
        s.textContent = tiempo.getSeconds();        
        m.textContent = tiempo.getMinutes();        
        h.textContent = tiempo.getHours();
    }, 1000);
}

//---------------BOM---------------//

function Aux(d, t) { //Imprimir resultados//
    var aux = ""
    aux = document.getElementById(d);
    aux.innerHTML = t;
}
function Location_n() { //location//
    var texto = "";
    texto += "Href: " + location.href;
    texto += "<br/>Pathname: " + location.pathname;
    Aux("loc", texto);
}
function SO_nav() { //navigator//
    var navInfo = window.navigator.appVersion.toLowerCase();
    var so = "Sistema Operativo: ";
    
    if(navInfo.indexOf('linux') != -1)
        so += "Linux";
    else if(navInfo.indexOf('win') != -1)
        so += "Windows";
    else if(navInfo.indexOf('mac') != -1)
        so += "Macintosh";
    Aux("so", so);
}
function Screen_n() { //screen//
    var texto = "";
    texto += "Alto: " + screen.height;
    texto += "<br/>Ancho: " + screen.width;
    Aux("sc", texto);
}
Location_n();
SO_nav();
Screen_n();

//---------------DOM---------------//

//-----CALCULADORA-----//

let resultado = document.querySelector('#result');  //Variables por id
var reset = document.getElementById('Reset');
var igual = document.getElementById('Igual');
var borrar = document.getElementById('Borrar');
//var punto = document.getElementById('Punto');
var suma = document.getElementById('Suma'); //Operadores
var resta = document.getElementById('Resta');
var multiplicar = document.getElementById('Multiplicar');
var dividir = document.getElementById('Dividir');
var aumento = document.getElementById('Increase');
var decremento = document.getElementById('Decrease');
var p_puesto = 0;

reset.onclick = function() {   //Funcionales
    resultado.value  = '';
}
igual.onclick = function() {
    resultado.value = eval(resultado.value);
    p_puesto = 0;
}
borrar.onclick = function() {
    resultado.value = resultado.value.substring( 0, resultado.value.length - 1);
}/*
punto.onclick = function() {
    if(resultado.value[p_puesto] != ".") {
        resultado.value += '.';
        p_puesto = resultado.value.length - 1;
    }
}*/
function get_Nums(ref) {    //Numeros
    if(ref.textContent === '.' && resultado.value.includes('.')) return
    resultado.value += ref.textContent;
}
suma.onclick = function() { //Operadores
    resultado.value += suma.textContent;
}
resta.onclick = function() {
    resultado.value += resta.textContent;
}
multiplicar.onclick = function() {
    resultado.value += multiplicar.textContent;
}
dividir.onclick = function() {
    resultado.value += dividir.textContent;
}
aumento.onclick = function() {
    resultado.value = parseFloat(eval(resultado.value)) + 1;
}
decremento.onclick = function() {
    resultado.value = parseFloat(eval(resultado.value)) - 1;
}

//-----Contador de tipo Closure-----//
let cont = document.querySelector('#Cont');

function ContarUwU(ref) {   //Funcion que recopila el numero actual//
    var num = parseFloat(cont.value);

    function uwu() {    //Funcion que cambia el style e incrementa el contador//
        if (cont.value % 2 === 0)
            cont.style.backgroundColor = "#45b8fa";
        else
            cont.style.backgroundColor = "#66f789"; 
        num++;
    }
    uwu();
    cont.value = num;
}

//---------------API---------------//

//-----geolocalizacion MAPA-----//
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initMap);
    } else {
        alert("¡Plop!");
    }
}
function initMap(position) {
    const point = new google.maps.LatLng(
        position.coords.latitude,
        position.coords.longitude
    );
    const myOptions = {
        zoom: 15,
        center: point,
    };
    var map = new google.maps.Map(document.getElementById("mapa-api"), myOptions);
    var ubi = document.getElementById("ubi");
    ubi.innerHTML = "Latitud: " + position.coords.latitude;
    ubi.innerHTML += "<br>Longitud: " + position.coords.longitude;

    miStorage.setItem("ubi_anterior", ubi.innerHTML);
  
    var marker = new google.maps.Marker({
        position: point,
        map: map,
    });
}

//-----LocalStorage-----//
var miStorage = window.localStorage;

function LStorage() {   //Si existe registro//
    if (miStorage.getItem("persona")) {
        Aux("LocalS", "Bienvenido nuevamente :) <br>" + miStorage.getItem("ubi_anterior"));
    } else {
        miStorage.setItem("persona", "uwuwu");
        Aux("LocalS", "Parece que no nos hemos visto antes... :(");
    }
} 