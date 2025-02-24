<?php require './pages/header.php'; ?>

    <main class="text-center">
        <div class="container form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php
            require './classes/usuarios.class.php';
            $u = new Usuarios();
            if(isset($_POST['email'])&& !empty($_POST['email'])){
                $email = addslashes($_POST['email']);
                $senha = $_POST['senha'];

                if($u->login($email, $senha)){
                    ?>
                    <script type="text/javascript">window.location.href="./";</script>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Usuário e/ou Senha Errados!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            ?>
            <form method="post" autocomplete="off">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="mail">E-mail: </span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email"  aria-describedby="mail" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="password">Senha: </span>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" aria-label="Senha"  aria-describedby="password" required>
                </div>

                <input type="submit" class="btn btn-outline-secondary" value="Fazer Login" />
            </form>
        </div>
    </main>

<?php require './pages/footer.php'; ?>