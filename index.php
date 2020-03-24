<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Salvar imagem</title>
</head>
<body style="padding:5%;">
    <h1>Upload de imagens</h1>
    <br><br><br>
    <form>        
        <div>
            <a href="/imagem.php"><button type="button" class="btn btn-secondary">Nova imagem</button></a>
        </div>
    <br><br><br>
        <div id="images" style="display: flex; ">
        </div>
    </form>
</body>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: '/controller/getImages.php',
            dataType: 'JSON',
            success: function(response) {
                    response.forEach((value) => {
                        $('#images').append(                        
                            '<div style="margin-right: 10px;">' +
                                '<img class="img-thumbnail" style="width: 200px !important; height: 200px !important;" src="/upload/' + value.url + '" />' +
                                '<label style="display:block;">'+ value.descricao +'</label>' +
                            '</div>'                        
                    )
                });
            },
            error: function(xhr) {
                console.log(xhr);
            }
        })
    });
</script>

</html>