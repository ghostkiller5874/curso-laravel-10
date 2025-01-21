function deleteRegistroPaginacao(rotaUrl, idRegistro) {

    if (confirm('Realmente deseja excluir? ')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: idRegistro
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Um instante por favor ...',
                    timeout: 2500,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            }
            else {
                alert("Nao foi possivel deletar")
            };
        }).fail(function (data) {
            unblockUI();
            alert('Não foi possivel buscar os dados');
        });
    }
}

// nao esta respondendo, analisar melhor posteriormente
// resolvido => desceu a ordem do arquivo
$('#mascara_valor').mask('#.##0,00', { reverse: true });

// puxando pelo cep
$("#Cep").blur(function () {
    let cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        let validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#Logradouro").val(" ");
            $("#Bairro").val(" ");
            $("#Cidade").val(" ");
            // $("#uf").val(" ");
            // $("#ibge").val(" ");

            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#Logradouro").val(dados.logradouro.toUpperCase());
                    $("#Bairro").val(dados.bairro.toUpperCase());
                    $("#Cidade").val(dados.localidade.toUpperCase());
                    //    $("#uf").val(dados.uf.toUpperCase());
                    //    $("#ibge").val(dados.ibge.toUpperCase());
                } else {
                    alert("CEP não encontrado de forma automatizada, digite manualmente ou tente novamente.");
                }
            });
        }
    }
});