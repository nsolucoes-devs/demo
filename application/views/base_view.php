<!-- essa função é para saber se está em mobile ou não, se aux for igual a 1 é porque está em mobile -->
<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    $aux = 0;
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $aux = 1;
    } else {
        $aux = 0;
    }
?>

<!-- esse style faz com que minha table tenha um comportamento em que quando ela passar do tamanho limite imposto, ela crie uma barra de rolagem -->
<style>
    .tableFixHead          { overflow-y: auto; height: 450px; }
    .tableFixHead thead th { position: sticky; top: 0; }
    
    /* Just common table stuff. Really. */
    table  { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px 16px; }
    th     { background:#eee; }
</style>

<!-- esssa section equivale ao seu body, ela vai ser o pai de todo o conteudo da view, o style="margin-bottom: 427px" é situacional dessa página em questão -->
<section id="main-content" style="margin-bottom: 427px">
    
    <!-- todas as sections com os conteudos da view deve ser da classe "wrapper" para que ele tenha um melhor posicionamento com relação ao pai -->
    <section class="wrapper">
        
        <!-- row do bootstrap -->
        <div class="row">
            <!-- col do bootstrap, o main-chart esta servindo para dar o margin-top, mas não é necessário -->
            <div class="col-lg-12 main-chart">
                
                <!-- puramente visual e ilustrativo -->
                <div class="border-head">
                    <h3>Bem vindo(a)!</h3>
                </div>
                
            </div>
            
        </div>
        
    </section>
    
</section>

<!-- modelo de tabela -->
<div class="tableFixHead">
    <table id="myTable" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- modelo de botão -->
<a href="<?php echo base_url('public/cadastros/bancos') ?>" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">

<!-- esse script faz com que quando a tela termine de carregar, meus selects ganhem os atributos da classe do select2 -->
<script>
    $(document).ready(function(){
        $('.js-example-basic-multiple').select2({theme: "bootstrap"});
        
        // função da mascara do telefone
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('#tel').mask(SPMaskBehavior, spOptions);
        // fim função da mascara do telefone
    });
</script>