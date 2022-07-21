function alIniciar() {
    MostrarPorInicio();
}

function MostrarPorInicio() {
    let anima_I = document.querySelectorAll(".anim-inic");
    
    for(var i=0; i<anima_I.length; i++) {
        anima_I[i].style.opacity = 1;
        anima_I[i].classList.add("most-top");   
    }
}
function MostrarPorScroll() {
    let animado = document.querySelectorAll(".animado");
    let scrollTop = document.documentElement.scrollTop;

    for(var i=0; i<animado.length; i++) {
        let Alt_Animado = animado[i].offsetTop;

        if(Alt_Animado - 290 < scrollTop) {
            animado[i].style.opacity = 1;
            animado[i].classList.add("most-top");
        }
    }
}
window.addEventListener('scroll', MostrarPorScroll);