<?php require './pages/header.php'; ?>

    <main>
        <div class="container">
            <h1>Cadastre-se</h1>
            <?php
            require './classes/usuarios.class.php';
            $u = new Usuarios();
            if(isset($_POST['nome'])&& !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];
                $telefone = addslashes($_POST['telefone']);

                if(!empty($nome)&& !empty($email) && !empty($senha)){
                    if($u->cadastrar($nome, $email, $senha, $telefone)){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="./login.php" class="alert-link">Faça o login agora.</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Este usuário já existe!</strong> <a href="./login.php" class="alert-link">Faça o login agora.</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                } else{
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Preencha todos os campos!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }

            }
            ?>
            <form method="post" autocomplete="off">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="usernamen">Nome: </span>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" aria-label="Nome"  aria-describedby="usernamen" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="mail">E-mail: </span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email"  aria-describedby="mail" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="password">Senha: </span>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" aria-label="Senha"  aria-describedby="password" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="fone">Telefone: </span>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Telefone" aria-label="Telefone"  aria-describedby="fone" required>
                </div>
                <input type="submit" class="btn btn-outline-secondary" value="Cadastrar" />
            </form>
        </div>
    </main>

<?php require './pages/footer.php'; ?>