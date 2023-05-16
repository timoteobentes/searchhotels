const modalC = document.getElementById("modal-construcao");
const modal = document.getElementById("modal-login");
const modalRH = document.getElementById("modal-rp");
const loginAdmin = document.getElementById("login-admin");

const menuUser = document.getElementById("modal-user");

const room_hos = document.querySelector(".room-hos");

function openLogin() {
    const user = document.getElementById("user").value
    if(user == undefined) {
        console.log("asf")
        modal.style.display = "block"
        loginAdmin.style.display = "flex"
        menuUser.style.display = "none"
        document.body.style.overflow = "hidden"
    } else {
        console.log("fsadfasd")
        menuUser.style.display = "block"
    }
}

function closeLogin(event) {
    if(event.target.id == "modal-login") {
        modal.style.display = "none"
        loginAdmin.style.display = "none"
        document.body.style.overflow = "auto"
    } else {
        modal.style.display = "block"
        loginAdmin.style.display = "flex"
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
    room_hos.value = `${quartos} quarto(s), ${hospedes} hóspedes`;
}

function setHospede(value) {
    hospedes = value;
    room_hos.value = `${quartos} quarto(s), ${hospedes} hóspedes`;
}