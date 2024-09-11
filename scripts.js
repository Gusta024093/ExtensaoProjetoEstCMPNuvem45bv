function formatarCPF(entrada) {
    let cpf_formatado = entrada.value.replace(/\D/g, '');
    if (cpf_formatado.length > 11) {
        cpf_formatado = cpf_formatado.slice(0, 11); 
    }
    entrada.value = cpf_formatado;
}

function verificarCPF(entrada){
    let cpf = entrada.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
        return false;
    }

    function calcularDigito(digitos, peso) {
        let soma = 0;
        for (let i = 0; i < digitos.length; i++) {
            soma += digitos[i] * peso--;
        }
        let resto = (soma * 10) % 11;
        return resto === 10 ? 0 : resto;
    }

    const digitos = cpf.split('').map(Number);
    const digito1 = calcularDigito(digitos.slice(0, 9), 10);
    const digito2 = calcularDigito(digitos.slice(0, 10), 11);
    return digitos[9] === digito1 && digitos[10] === digito2;
}

function erroPreenchimentoCliente(){
    PNotify.error({
        title: 'Erro!',
        text: 'Você não preencheu corretamente os campos!.'
        });
}

document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('table');

    table.addEventListener('click', function(event) {
        const target = event.target;

        if (target.classList.contains('editable')) {
            const td = target;
            const id = td.dataset.id;
            const oldValue = td.textContent;
            const newValue = prompt('Digite o novo estado:', oldValue);


            if (newValue !== null && newValue !== oldValue) {
                const formData = new FormData();
                formData.append('id', id);
                formData.append('estado', newValue);

                fetch('atualiza.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    if (data.trim() === 'success') {
                        td.textContent = newValue; 
                    } else {
                        alert('Erro ao atualizar estado.');
                    }
                })
                .catch(error => {
                    console.error('Houve um problema com a solicitação fetch:', error);
                    alert('Erro ao atualizar estado.');
                });
            }
        }
    });
});
