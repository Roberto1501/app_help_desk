
<?php

SESSION_start();
$usuario_autentificado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$peris = array(1=> 'Administrativo', 2=> 'Usuario');

$usuarios_app = array(
    array('id'=> 1, 'email' => 'adm@teste.com.br', 'senha' => '123456','perfil_id'=>1),
    array('id'=> 2,'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id'=>2),
    array('id'=> 3,'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id'=>2)

);



// echo '<pre>';
// print_r($usuarios_app);

// echo '</pre>';



foreach ($usuarios_app as $user) {


    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autentificado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
};

if ($usuario_autentificado) {
    echo 'usuario autentificado';

    $_SESSION['autenticado'] = "SIM";
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;

    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = "NAO";
    header('Location: index.php?login=erro');
}


$_POST;


?>