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
    if(isset( $_FILES['fotos'])){
        $fotos = $_FILES['fotos'];
    } else {
        $fotos = array();
    }

    $a->editAnuncio($titulo, $categotia, $valor, $descricao, $estado, $fotos, $_GET['id']);

    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Parabéns!</strong> Anuncio Editado com sucesso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $info = $a->getAnuncio($_GET['id']);
}else{
    ?>
    <script type="text/javascript">window.location.href="./login.php";</script>
    <?php
    exit;
}

?>

    <main>
        <div class="container">
            <h1>Meus Anúncios - Editar Anúncio</h1>

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
                            <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria'] == $cat['id']) ?'selected="selected"' : ''; ?>><?php echo $cat['nome']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="title">Titulo: </span>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $info['titulo']; ?>" placeholder="Titulo" aria-label="title"  aria-describedby="title" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="vlr">Valor: </span>
                    <input type="number" step="0.01" class="form-control" name="valor" id="valor" value="<?php echo $info['valor']; ?>" placeholder="Valor" aria-label="valor"  aria-describedby="vlr" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="descrpt">Descrição: </span>
                    <textarea class="form-control" name="descricao" id="descricao" aria-label="descrpt"><?php echo $info['descricao']; ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="state">Estado de Conservação: </span>
                    <select class="form-select" name="estado" id="estado" aria-label="state" required>
                        <option selected>Selecione uma opção</option>
                        <option value="0" <?php echo ($info['estado'] == '0') ?'selected="selected"' : ''; ?>>Ruim</option>
                        <option value="1 <?php echo ($info['estado'] == '1') ?'selected="selected"' : ''; ?>">Bom</option>
                        <option value="2" <?php echo ($info['estado'] == '2') ?'selected="selected"' : ''; ?>>Ótimo</option>
                    </select>
                </div>



                <div class="input-group mb-3">
                    <label class="input-group-text" for="add_fotos">Fotos do anúncio: </label>
                    <input class="form-control" name="fotos[]" type="file" id="add_fotos" multiple>
                </div>

                <div class="input-group mb-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fotos do Anúncio</div>
                        <div class="panel-body"></div>
                    </div>
                </div>

                <input type="submit" class="btn btn-outline-secondary" value="Salvar" />
            </form>
        </div>
    </main>

<?php require './pages/footer.php'; ?>