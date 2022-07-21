var contenido = document.querySelector('#Rellenar');
var nom = document.querySelector('#add-Nom');
var email = document.querySelector('#add-Email');
var com = document.querySelector('#add-Com');

/*Json-Ajax*/
function traer(ref) {
    var arch = 'json/' + ref.textContent + '.json';
    const xhttp = new XMLHttpRequest();

    xhttp.open('GET', arch, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            let datos = JSON.parse(this.responseText);
            contenido.innerHTML = '';
            
            for(let item of datos) {
                contenido.innerHTML += `
                    <tr>
                        <th scope="row">${ item.id }</th>
                        <td>${ item.nombre }</td>
                        <td>${ item.apellido }</td>
                        <td>${ item.edad }</td>
                    </tr>
                `;
            }
        }
    }  
}

/*JQuery*/
function Agregar() {
    if( nom.value != "" && email.value != "" && com.value != "") {
        var fila = `
            <tr>
                <td><input type="checkbox" class="form-check-input"></td>
                <td>${ nom.value }</td>
                <td>${ email.value }</td>
                <td>${ com.value }</td>
            </tr>
        `;
        $('#Agregar').append(fila);   
    }
    
}
function Eliminar() {
    $('table #Agregar tr td input[type=checkbox]:checked').each(function() {
	    $(this).parent().parent().remove(); /*Doble parent() para selecionar el tr y eliminarla*/
	});
}

/*----------------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------------*/
/*Snake Game------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------------*/

function Game() {
    canv = document.getElementById("gc");
    ctx = canv.getContext("2d");
    document.addEventListener("keydown", keyPush);
    setInterval(game, 1000/15);
}
var puntaje = document.querySelector('#Puntaje');
px = py = 10;
gs = tc = 20;
ax = ay = 15;
xv = yv = 0;
trail=[];
tail = 5;
nc = 0;
pts = 0;

function game() {
    px += xv;
    py += yv;
    puntaje.textContent = pts; 

    if( px < 0) {
        px = tc-1;
    }
    if(px > tc-1) {
        px = 0;
    }
    if(py < 0) {
        py = tc-1;
    }
    if(py > tc-1) {
        py = 0;
    }
    
    ctx.fillStyle="black";
    ctx.fillRect(0, 0, canv.width, canv.height);

    ctx.fillStyle = "hsl(" + nc +",100%,50%)";
    nc += 2;
    if(nc >= 360)
        nc = 0;

    for(var i=0; i < trail.length; i++) {
        ctx.fillRect(trail[i].x * gs, trail[i].y * gs, gs-2, gs-2);
        if(trail[i].x == px && trail[i].y == py) {
            tail = 5;
            pts = 0;
        }
    }

    trail.push({x:px, y:py});
    while(trail.length > tail) {
        trail.shift();
    }

    if(ax == px && ay == py) {
        tail++;
        ax = Math.floor(Math.random() * gs);
        ay = Math.floor(Math.random() * gs);
        pts += 10;
    }
    
    ctx.fillStyle = "hsl(" + nc*2 +",100%,50%)";
    ctx.fillRect(ax * gs, ay * gs, gs-2, gs-2);
}

function keyPush(evt) {
    
    switch(evt.keyCode) {
        case 37:
            xv = -1;
            yv = 0;
            break;
        case 38:
            xv = 0;
            yv = -1;
            break;
        case 39:
            xv = 1;
            yv = 0;
            break;
        case 40:
            xv = 0;
            yv = 1;
            break;
    }
}
/*----------uwu----------*/