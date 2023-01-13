<?php require './pages/header.php'; ?>
<?php
if (empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="./login.php";</script>
    <?php
    exit;
}

require './classes/anuncios.class.php';
$a = new Anuncios();

if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

    $titulo = addslashes($_POST['titulo']);
    $categotia = addslashes($_POST['categoria']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

    $a->addAnuncio($titulo, $categotia, $valor, $descricao, $estado);

    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Parabéns!</strong> Anuncio Adicionado com sucesso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}

?>

<main>
    <div class="container">
        <h1>Meus Anúncios - Adicionar Anúncios</h1>

        <form method="POST" enctype="multipart/form-data" autocomplete="off">

            <div class="input-group mb-3">
                <span class="input-group-text" id="cat">Categoria: </span>
                <select class="form-select" name="categoria" id="categoria" aria-label="cat" required>
                    <option selected>Selecione uma opção</option>
                    <?php
                    require './classes/categorias.class.php';
                    $c = new Categorias();
                    $cats = $c->getLista();

                    foreach ($cats as $cat):
                     ?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="title">Titulo: </span>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" aria-label="title"  aria-describedby="title" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="vlr">Valor: </span>
                <input type="number" step="0.01" class="form-control" name="valor" id="valor" placeholder="Valor" aria-label="valor"  aria-describedby="vlr" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="descrpt">Descrição: </span>
                <textarea class="form-control" name="descricao" id="descricao" aria-label="descrpt"></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="state">Estado de Conservação: </span>
                <select class="form-select" name="estado" id="estado" aria-label="state" required>
                    <option selected>Selecione uma opção</option>
                    <option value="0">Ruim</option>
                    <option value="1">Bom</option>
                    <option value="2">Ótimo</option>
                </select>
            </div>

            <input type="submit" class="btn btn-outline-secondary" value="Adicionar" />
        </form>
    </div>
</main>

<?php require './pages/footer.php'; ?>