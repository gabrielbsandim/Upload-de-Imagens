<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Adicionar imagem</title>
</head>
<body style="padding:5%;">
    <a href="/index.php"><button type="button" class="btn btn-secondary">Voltar</button></a><br><br>
    <form id="form" enctype="multipart/form-data">        
        <input type="file" / id="file"><br><br>
        <div class="form-group">
            <label for="descricao">Descrição: </label><br>
            <input class="form-control" type="text" name="descricao" id="descricao"/><br>
            <a href="/index.php"><button class="btn btn-primary" type="button" id="salvar">Salvar</button></a>
        </div>
    </form>
</body>

<script>
    $('#salvar').click(function() {
        let form = new FormData();

        form.append('descricao', $('#descricao').val())
        form.append('file', $('#file')[0].files[0])        
        $.ajax({
            type: 'POST',
            url: '/controller/upload.php',
            data: form,
            dataType: 'JSON',
            success: function(response) {
                if (response.success) {
                    window.location.href = '/';
                }
            },
            error: function(xhr) {
                console.log(xhr)
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>

</html>