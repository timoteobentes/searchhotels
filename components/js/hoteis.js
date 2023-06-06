const modalC = document.getElementById("modal-construcao");
const modal = document.getElementById("modal-login");
const modalRH = document.getElementById("modal-rp");
const modalSucesso = document.getElementById("modal-sucesso");

const menuUser = document.getElementById("modal-user");
const room_hos = document.querySelector(".room-hos");

let toc = 0;
function openLogin(tag) {
    if(tag.value == "Login" || tag.value == 0) {
        modal.style.display = "block"
        loginAdmin.style.display = "flex"
        document.body.style.overflow = "hidden"
    } else {
        toc += 1;
        menuUser.style.display = "block";
    }

    if(toc == 2) {
        menuUser.style.display = "none";
        toc = 0;
    }
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

function openSucesso() {
    modalSucesso.style.display = "block"
    document.body.style.overflow = "hidden"
    setTimeout(() => {
        modalSucesso.style.display = "none"
        document.body.style.overflow = "auto"
    }, 2000)
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


function reserva(iduser, idquarto) {
    let quart = {
        quarto: idquarto,
        user: iduser
    };

    fetch("../backend/quarto/controllers/reserva.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(quart)
    })
    .then(res => res.text())
    .then(json => {
        openSucesso()
    })
    .catch(err => console.log(err))
}