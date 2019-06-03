<?php
    session_start();

    $user_auth = false;
    $user_id = null;
    $user_id_profile = null;

    $profile = [1 => 'administrator', 2 => 'user'];
    
    $user_app = [
        ['id' => 1, 'email' => 'adm@teste.com', 'password' => '1234', 'id_profile' => 1],
        ['id' => 1, 'email' => 'user@teste.com', 'password' => '1234', 'id_profile' => 1],
        ['id' => 2, 'email' => 'jose@teste.com', 'password' => '1234', 'id_profile' => 2],
        ['id' => 4, 'email' => 'maria@teste.com', 'password' => '1234', 'id_profile' => 2],
    ];

    foreach ($user_app as $user) {
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $user_auth = true;
            $user_id = $user['id'];
            $user_id_profile = $user['id_profile'];
        };
    };

        if($user_auth){ //autenticação / variáveis da sessão
            echo 'usuario válido';
            $_SESSION['authenticated'] = 'yes'; 
            $_SESSION['id'] = $user_id; 
            $_SESSION['id_profile'] = $user_id_profile; 

            header('Location: home.php');
        } else {
            $_SESSION['authenticated'] = 'no';
            header('Location: index.php?login=error');
        };
?>