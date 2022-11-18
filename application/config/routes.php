<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//base_url('home/index')
//base_url('usuario/index')
//base_url('cadastros/funcoes')
//base_url('cadastros/fornecedores')
//base_url('cadastros/tipos_documentos')
//base_url('cliente/listagem')
//base_url('motoristas/listagem')
//base_url('produtos/listagem')
//base_url('manutencao/listagem')
//base_url('frota/listagem')
//base_url('frota/tipos_pneus')
//base_url('frota/unidades_pneus')
//base_url('frota/marcas')
//base_url('frota/modelos')
//base_url('frota/tipos_veiculo')
//base_url('frota/tipos_munck')
//base_url('frota/tipos_cabine')
//base_url('frota/status')
//base_url('login/sair')
//
//
// Home
$route['inicio']                        = "home/index";
$route['inicio/(:num)/(:num)']          = "home/index/$1/$1";

$route['trocasenha']                    = "home/newpass";


// Cadastros
$route['cadastros']                     = "cadastros/index";
$route['funcoes']                       = "cadastros/funcoes";
$route['cadastrarfuncao']               = "cadastros/novaFuncao";
$route['editarfuncao/(:num)']           = "cadastros/novaFuncao/$1";

$route['fornecedores']                  = "cadastros/fornecedores";
$route['fornecedores/n/(:num)']         = "cadastros/fornecedores/n/$1";
$route['fornecedores/n']                = "cadastros/fornecedores";
$route['fornecedores/f/(:any)/(:num)']  = "cadastros/fornecedores/f/$1/$1";
$route['fornecedores/f/(:any)']         = "cadastros/fornecedores/f/$1";



$route['cadastrarfornecedor']           = "cadastros/novoFornecedor";
$route['mostrarfornecedor/(:num)']      = "cadastros/verfornecedor/$1";
$route['editarfornecedor/(:num)']       = "cadastros/editaFornecedor/$1";
$route['documentos']                    = "cadastros/tipos_documentos";

// Usuario
$route['usuarios']                      = "usuario/pesquisa";
$route['mostrarusuario/(:num)']         = "usuario/mostrar/$1";
$route['editarusuario/(:num)']          = "usuario/cadastro/$1";
$route['cadastrarusuario']              = "usuario/cadastro";

// Cliente
$route['clientes']                      = "cliente/listagem";
$route['clientes/n/(:num)']             = "cliente/listagem/n/$1";
$route['clientes/n']                    = "cliente/listagem";
$route['clientes/f/(:any)/(:num)']      = "cliente/listagem/f/$1/$1";
$route['clientes/f/(:any)']             = "cliente/listagem/f/$1";

$route['cadastrarcliente']              = "cliente/cadastro";
$route['clienterelatoriogeral']         = "cliente/relatorioGeral";
$route['mostrarcliente/(:num)']         = "cliente/verCliente/$1";
$route['clienterelatoriounico']         = "cliente/relatorioUnico";
$route['editarcliente/(:num)']          = "cliente/telaEdita/$1";

// Motoristas
$route['motoristas']                    = "motoristas/listagem";
$route['motoristas/n/(:num)']           = "motoristas/listagem/n/$1";
$route['motoristas/n']                  = "motoristas/listagem";
$route['motoristas/f/(:any)/(:num)']    = "motoristas/listagem/f/$1/$1";
$route['motoristas/f/(:any)']           = "motoristas/listagem/f/$1";


$route['cadastrarmotorista']            = "motoristas/cadastro";
$route['editarmotorista/(:num)']        = "motoristas/cadastro/$1";
$route['mostrarmotorista/(:num)']       = "motoristas/ver/$1";

// Estoque
$route['estoque']                       = "estoque/index";

$route['movimentosestoque']                    = "estoque/indice";
$route['movimentosestoque/n/(:num)']           = "estoque/indice/n/$1";
$route['movimentosestoque/n']                  = "estoque/indice";
$route['movimentosestoque/f/(:any)/(:num)']    = "estoque/indice/f/$1/$1";
$route['movimentosestoque/f/(:any)']           = "estoque/indice/f/$1";


$route['mostrarnota/(:num)']            = "estoque/vernota/$1";
$route['editarnota/(:num)']             = "estoque/editarnota/$1";
$route['operacoesestoque']              = "estoque/tiposMovimento";
$route['mostrarpecaestoque/(:num)']     = "estoque/mostrar/$1";
$route['atualizanota']                  = "estoque/atualizanota";

//  Produtos
$route['pecas']                         = "produtos/listagem";
$route['pecas/n/(:num)']                = "produtos/listagem/n/$1";
$route['pecas/n']                       = "produtos/listagem";
$route['pecas/f/(:any)/(:num)']         = "produtos/listagem/f/$1/$1";
$route['pecas/f/(:any)']                = "produtos/listagem/f/$1";


$route['mostrarpeca/(:num)']            = "produtos/mostrar/$1";
$route['cadastrarpeca']                 = "produtos/cadastro";
$route['editarpeca/(:num)']             = "produtos/cadastro/$1";

// Grupos de Peças
$route['grupospecas']                   = "produtos/grupospecas";

// Manutenção
$route['manutencao']                    = "manutencao/index";

$route['ordemdeservicos']                   = "manutencao/listagem";
$route['ordemdeservicos/n/(:num)']          = "manutencao/listagem/n/$1";
$route['ordemdeservicos/n']                 = "manutencao/listagem";
$route['ordemdeservicos/f/(:any)/(:num)']   = "manutencao/listagem/f/$1/$1";
$route['ordemdeservicos/f/(:any)']          = "manutencao/listagem/f/$1";





$route['servicos']                      = "manutencao/servicos";
$route['servicos/n/(:num)']             = "manutencao/servicos/n/$1";
$route['servicos/n']                    = "manutencao/servicos";
$route['servicos/f/(:any)/(:num)']      = "manutencao/servicos/f/$1/$1";
$route['servicos/f/(:any)']             = "manutencao/servicos/f/$1";



$route['cadastrarordemdeservico']       = "manutencao/cadastro";
$route['cadastrarandamento']            = "manutencao/lancarAndamento";
$route['mostrarordemdeservico/(:num)']  = "manutencao/verOrdem/$1";
$route['editarordemdeservico/(:num)']   = "manutencao/edicao/$1";
$route['encerrarordemdeservico']        = "manutencao/encerrarOSListagem";

//  Pneus
$route['manutencaopneus']               = "pneus/indice";
$route['trocarpneus']                   = "pneus/troca";
$route['vinculapneus']                  = "pneus/vincula";
$route['rodiziopneus']                  = "pneus/rodizio";
$route['verlista']                      = "pneus/listagem";

//  Frota
$route['frota']                         = "frota/index";
$route['veiculos']                      = "frota/listagem";
$route['cadastroveiculo']               = "frota/cadastro";
$route['editarveiculo/(:num)']          = "frota/cadastro/$1";
$route['mostrarveiculo/(:num)']         = "frota/verFrota/$1";
$route['pneus']                         = "frota/unidades_pneus";
$route['tipospneu']                     = "frota/tipos_pneus";
$route['marcasveiculo']                 = "frota/marcas";
$route['modelos']                       = "frota/modelos";
$route['tiposveiculo']                  = "frota/tipos_veiculo";
$route['tiposmunck']                    = "frota/tipos_munck";
$route['tiposcabine']                   = "frota/tipos_cabine";
$route['statusveiculo']                 = "frota/status";

// Obra
$route['obras']                         = "obra/listagem";
$route['cadastroobras']                 = "obra/cadastro";
$route['cadastroobras']                 = "obra/cadastro";
$route['cadastroobras/(:num)']                 = "obra/cadastro";

// Ativos
$route['ativos']                         = "ativos/listagem";
$route['cadastroativos']                 = "ativos/cadastro";

// Financeiro
$route['financeiro']                    = "financeiro/index";

$route['movimentosfinanceiro']                   = "financeiro/indice";
$route['movimentosfinanceiro/n/(:num)']          = "financeiro/indice/n/$1";
$route['movimentosfinanceiro/n']                 = "financeiro/indice";
$route['movimentosfinanceiro/f/(:any)/(:num)']   = "financeiro/indice/f/$1/$1";
$route['movimentosfinanceiro/f/(:any)']          = "financeiro/indice/f/$1";


$route['multiplostitulos']              = "financeiro/multiplos";
$route['agendafinanceira/(:any)']       = "financeiro/agenda/$1";
$route['titulobaixa']                   = "financeiro/titulobaixa";
$route['vertitulo/(:num)']              = "financeiro/vertitulo/$1";

$route['excluirtitulo']                 = "financeiro/excluirTitulo";

// Contas
$route['tipoconta']                     = "contas/telaCadastro";
//$route['']                            = "contas/adicionarTipo";
$route['todasdespesas']                 = "contas/telaTodasDespesas";

//Relatorios
$route['relatoriotitulo/(:num)']        = "relatorios/pdftitulo/$1";
$route['relatorioveiculo']              = "relatorios/pdfveiculo";
$route['relatorioveiculos']             = "relatorios/pdfveiculos";
$route['relatorioos/(:num)']            = "relatorios/pdfmanutencao/$1";
$route['relatoriomanutencoes']          = "relatorios/pdfmanutencoes";
$route['relatoriofornecedor/(:num)']    = "relatorios/pdffornecedor/$1";
$route['relatoriofornecedores']         = "relatorios/pdffornecedores";
$route['relatoriopneu/(:num)']          = "relatorios/pdfpneu/$1";
$route['relatoriopneus']                = "relatorios/pdfpneus";
$route['relatoriotitulos']              = "relatorios/pdftitulos";
$route['relatorioproduto/(:num)']       = "relatorios/pdfproduto/$1";
$route['relatorioprodutos']             = "relatorios/pdfprodutos";
$route['relatoriotitulosforne']         = "relatorios/pdftitulosfornecedor";
$route['relatoriofornecedorabc']        = "relatorios/pdffornecedorabc";
$route['relatorioclienteabc']           = "relatorios/pdfclienteabc";
$route['relatorioprodutoabc']           = "relatorios/pdfprodutoabc";

//CheckList
//$route['checklist']                     = "checklist/index";
$route['checkitens']                    = "checklist/itens";
$route['checkgerar']                    = "checklist/gerar";
$route['checkpreencher']                = "checklist/preencher";
$route['checklistFinalizar']            = "login/finalizar";
$route['checklistagem']                 = "checklist/listagem";
$route['checklistVer']                  = "checklist/visualizar";

//Configuracoes
$route['configuracoes']                 = "configuracoes/index";
$route['perfil']                        = "configuracoes/perfil";
$route['configuracao']                  = "configuracoes/configuracao";
$route['backup']                        = "configuracoes/backup";

// Login
$route['sair']                          = "login/sair";
