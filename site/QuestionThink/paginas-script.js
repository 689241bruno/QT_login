let h = document.getElementById("hora");
let m = document.getElementById("minuto");
let s = document.getElementById("semana");
let d = document.getElementById("data");

const relogio = setInterval( function time() {
    let momentoAtual = new Date();
    let hora = momentoAtual.getHours();
    let minuto = momentoAtual.getMinutes();
    let semana = momentoAtual.getDay();
    let dia = momentoAtual.getDate();
    let mes = momentoAtual.getMonth() + 1;
    let ano = momentoAtual.getFullYear();
    if(hora <= 9){
        h.textContent = "0" + hora;
    }else{
        h.textContent = hora;
    }
    if(minuto <= 9) {
        m.textContent = "0" + minuto;
    }else{
        m.textContent = minuto;
    }
    
    switch (semana){
        case 0:
            s.textContent = 'Domingo,'
            break
        case 1:
            s.textContent = 'Segunda,'
            break
        case 2:
            s.textContent = 'Terça,'
            break
        case 3:
            s.textContent = 'Quarta,'
            break
        case 4:
            s.textContent = 'Quinta,'
            break
        case 5: 
            s.textContent = 'Sexta,'
            break
        case 6:
            s.textContent = 'Sábado,'
            break
    }
    data.textContent = dia +"/"+mes+"/"+ano;
})

// EFEITO PAGINA LIVROS //


window.revelar = ScrollReveal({reset:true});
revelar.reveal('.efeito-livro1', {
    duration: 1000,
    distance: '50px'
});

revelar.reveal('.efeito-livro2', {
    duration: 1000,
    distance: '50px',
    delay: 200
});

revelar.reveal('.efeito-livro3', {
    duration: 1000,
    distance: '50px',
    delay: 400
});