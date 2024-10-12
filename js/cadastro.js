$(document).ready(function() {
  $('#usuario').on('input', function() {
      var usuario = $(this).val();
      $.ajax({
          url: 'verifica_usuario.php',
          type: 'POST',
          data: {usuario: usuario},
          success: function(response) {
              if (response === 'exists') {
                  $('#usuarioMsg').text('Usuário já existe');
                  $('#submitBtn').prop('disabled', true);
              } else {
                  $('#usuarioMsg').text('');
                  $('#submitBtn').prop('disabled', false);
              }
          }
      });
  });
});

//mask de input
$(document).ready(function(){
	$('#nr_processo').inputmask("9999/999999");
	$('#tel_fixo').inputmask("(99)99999-9999");
	$('#data').inputmask("99/99/9999");
	$('#cpf').inputmask("999.999.999-99");
	$('#pcnj').inputmask("9999999.99.9999.9.99.9999")

});

//Consulta de API Viacep
const btnPesquisarCEP = document.querySelector("#btnPesquisar");
btnPesquisarCEP.addEventListener("click", pesquisar)

function pesquisar() {

  const inputDoCep = document.getElementById("cep");
  const valorDoCep = inputDoCep.value;
  const url = 'https://viacep.com.br/ws/' + valorDoCep + '/json/';

  fetch(url)
    .then(response => {
      return response.json();
    })
    .then(data => {
      if (data.erro) {
        alert("O CEP DIGITADO ESTÁ INVÁLIDO");
        return;
      }
      atribuirCampos(data);
    })
}


function atribuirCampos(data) {
  const rua = document.querySelector("#rua");
  const complemento = document.querySelector("#complemento");
  const bairro = document.querySelector("#bairro");
  const cidade = document.querySelector("#cidade");
  const estado = document.querySelector("#estado");

  rua.value = data.logradouro;
  complemento.value = data.complemento;
  bairro.value = data.bairro;
  cidade.value = data.localidade;
  estado.value = data.uf;
}