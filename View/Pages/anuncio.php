<?php include '../Templates/header.php'; 

    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/ImovelModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/TelefoneModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/ImagensImovelModel.php";

    $idImovel = $_GET["id"];

    $ImovelModel = new ImovelModel();
    $infoImovel = $ImovelModel->getImovelById($idImovel);

    $idPessoa = $infoImovel['idpessoa'];

    $TelefoneModel = new TelefoneModel();
    $telefones = $TelefoneModel->getTelefonesById($idPessoa);

    $ImagemModel = new ImagensImovelModel();
    $imagens = $ImagemModel->listarArrayImagens($idImovel);

?>
<style>
.gallery {
    -webkit-column-count: 3;
    -moz-column-count: 3;
    column-count: 3;
    -webkit-column-width: 33%;
    -moz-column-width: 33%;
    column-width: 33%; }
    .gallery .pics {
    -webkit-transition: all 350ms ease;
    transition: all 350ms ease; }
    .gallery .animation {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1); 
}

@media (max-width: 450px) {
    .gallery {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    -webkit-column-width: 100%;
    -moz-column-width: 100%;
    column-width: 100%;
    }
}

@media (max-width: 400px) {
    .btn.filter {
    padding-left: 1.1rem;
    padding-right: 1.1rem;
    }
}
</style>

    <div class="container">
        <h1>Detalhes do anúncio:</h1>
        <br>
        <!-- Englobar o form e esse titulo abaixo em uma div para colocar o mapa na frente -->
        <h4>Detalhes do imóvel:</h4>
        <form>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-home"></i> Tipo do imóvel: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["descricaoTipoImovel"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-clipboard-list"></i> Descrição do imóvel: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["descricaoImovel"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-expand-arrows-alt"></i> Dimensões do imóvel: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Área Util: <?php echo $infoImovel["areaUtil"];?>m², Área Total: <?php echo $infoImovel["areaTotal"];?>m².">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-bed"></i> Quantidade de quartos: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["quantQuarto"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-bath"></i> Suítes: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["quantSuite"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-shower"></i> Banheiros: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["quantBanheiro"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-car"></i> Vagas na garagem: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["quantVagaGaragem"];?>">
                </div>
            </div>
            <br>

            <h4>Localização:</h4>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-map-marker-alt"></i> Endereço: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" 
                value="<?php echo $infoImovel["logradouro"];?>, número <?php echo $infoImovel["numero"];?>, <?php echo $infoImovel["nomeBairro"];?>, <?php echo $infoImovel["nomecidade"];?>, <?php echo $infoImovel["siglaEstado"];?>.">
                </div>
            </div>
            <br>

            <h4>Detalhes do Anunciante:</h4>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-user"></i> Nome: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["nome"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-at"></i> Email de contato: </label>
                <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infoImovel["usuario"];?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label"><i class="fa fa-phone"></i> Telefone(s) de contato: </label>
                <div class="col-sm-9">
                <?php foreach($telefones as $telefone) { ?>
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $telefone['telefone'] ?>">
                <?php } ?>
                </div>
            </div>

            <h4>Imagens do imóvel:</h4>
        </form>

        <div class="gallery" id="gallery">
        <?php foreach($imagens as $imagem) { ?>
            <div class="mb-3">
                <img class="img-fluid" src="/corretora/Files/<?php echo $imagem?>">
            </div>
            <?php } ?>
        </div>

    </div>
<script>
    $(function() {
        var selectedClass = "";

        $(".filter").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#gallery").fadeTo(100, 0.1);
            $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
            setTimeout(function() {
                $("."+selectedClass).fadeIn().addClass('animation');
                $("#gallery").fadeTo(300, 1);
            }, 300);
        });
    });
</script>
<?php include "../Templates/footer.php"; ?>