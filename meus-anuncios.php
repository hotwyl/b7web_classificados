<?php require './pages/header.php'; ?>
<?php
if (empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="./login.php";</script>
    <?php
    exit;
}
?>

<main>
    <div class="container">
        <div class="d-flex justify-content-between my-3">
            <h1>Meus Anuncios</h1>
            <a href="./add-anuncio.php" class="btn btn-outline-success align-self-center">Adicionar</a>
        </div>

        <table class="table table-striped table-borderless table-hover">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <?php
            require './classes/anuncios.class.php';
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios();

            foreach ($anuncios as $anuncio):
            ?>
            <tr>
                <td>
                    <?php if(!empty($anuncio['utl'])): ?>
                        <img src="./assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" />
                    <?php else: ?>
                        <img src="./assets/images/default.jpg" height="50" />
                    <?php endif; ?>

                </td>
                <td><?php echo $anuncio['titulo']; ?></td>
                <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                <td>
                    <a href="./editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="./excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
                </td>
            </tr>
            <?php endforeach;?>

        </table>
    </div>
</main>

<?php require './pages/footer.php'; ?>
