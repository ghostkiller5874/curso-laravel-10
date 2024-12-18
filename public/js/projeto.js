function deleteRegistroPaginacao(rotaUrl, idRegistro){
    
    if(confirm('Realmente deseja excluir? ')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            data:{
                id: idRegistro
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Um instante por favor ...',
                    timeout: 2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            if(data.success == true){
                window.location.reload();
            } 
            else {
                alert("Nao foi possivel deletar")
            };
        }).fail(function(data){
            unblockUI();
            alert('Não foi possivel buscar os dados');
        });
    }
}