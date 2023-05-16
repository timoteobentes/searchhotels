const modalC = document.getElementById("modal-construcao");
const modal = document.getElementById("modal-login");
const modalRH = document.getElementById("modal-rp");

const room_hos = document.querySelector(".room-hos");

function openLogin() {
    modal.style.display = "block"
    document.body.style.overflow = "hidden"
}

function closeLogin(event) {
    if(event.target.id == "modal-login") {
        modal.style.display = "none"
        document.body.style.overflow = "auto"
    } else {
        modal.style.display = "block"
        document.body.style.overflow = "hidden"
    }
}

function openConstrucao() {
    modalC.style.display = "block"
    document.body.style.overflow = "hidden"
}

function closeConstrucao(event) {
    if(event.target.id == "modal-construcao") {
        modalC.style.display = "none"
        document.body.style.overflow = "auto"
    } else {
        modalC.style.display = "block"
        document.body.style.overflow = "hidden"
    }
}

function roomHos() {
    modalRH.style.display = "block"
}


let quartos = 1;
let hospedes = 3;

function setQuarto(value) {
    quartos = value;
    room_hos.value = `${quartos} quarto(s), ${hospedes} hóspede(s)`;
}

function setHospede(value) {
    hospedes = value;
    room_hos.value = `${quartos} quarto(s), ${hospedes} hóspede(s)`;
}