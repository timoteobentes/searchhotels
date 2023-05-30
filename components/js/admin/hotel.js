fetch("../../admin/controllers/listhoteis.php")
.then(res => res.json())
.then(json => {
    let linha = `
                <thead>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>País</th>
                </thead>`;
    json.forEach((data) => {
        linha += `
                <tr class="lista">
                    <td>${data.nome}</td>
                    <td>${data.cnpj}</td>
                    <td>${data.pais}</td>
                </tr>`;
    });

    document.querySelector("#table-hotel").innerHTML = linha;
})
.catch(err => console.log(err))