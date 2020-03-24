<?php
    $action = $_POST['action'];
    $file = $_FILES;
    $descricao = $_POST['descricao'];

    $basename = basename($_FILES['file']['name']);
    $uploaddir = '../upload/' . $basename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir)) {
        $content = json_decode(file_get_contents('../database.json'));
        $newFile = [ 
            url => $basename,
            descricao => $descricao
        ];  
        $content[] = $newFile;                       
        file_put_contents('../database.json', json_encode($content));
        echo json_encode(['success' => true, 'msg' => 'Formulário salvo com sucesso']);
    } else {
        echo json_encode(['success' => false, 'msg' => 'Erro interno']);
    }
?>