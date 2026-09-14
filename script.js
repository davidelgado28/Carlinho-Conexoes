document.addEventListener('DOMContentLoaded', () => {
   
    const botoesCurtir = document.querySelectorAll('.btn-curtir');

    botoesCurtir.forEach(botao => {
        botao.addEventListener('click', function() {
            const postId = this.getAttribute('data-id');
            const icone = this.querySelector('.icone-coracao');
            const contadorElemento = this.nextElementSibling; 

            fetch('curtir.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${postId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    contadorElemento.innerText = `${data.novas_curtidas} curtidas`;
                    icone.classList.add('curtido');
                } else {
                    console.error("Erro ao curtir");
                }
            })
            .catch(error => console.error("Erro na requisição:", error));
        });
    });
});
