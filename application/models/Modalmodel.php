<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalmodel extends CI_Model{
    
    function Money($valor){
        return number_format($valor, 2, ',', '.');
    }
    function atraso($valor){
        $data = strtotime(date('Y-m-d'));
        $diferenca = ($data - strtotime($valor))/86400;
        return $diferenca;
    }
    function formatadata($valor){
	    $valor = date('d/m/Y', strtotime ($valor));
	    return $valor;
	}
    function apagar($valor, $porcento, $dias=null, $multa=null){
	    if($multa == null){
	        $valor = $valor-($valor*($porcento/100)) ;
	    }else{
	        $valor = $valor+($valor*($multa/100))+($dias*($valor*($porcento/100)));
	    }
	    return $this->Money($valor);
	}
    
    public function modaltitulo($id){
        $this->db->where('titulos_id', $id);
        $titulo = $this->db->get('titulos')->row_array();
        
        $this->db->where('contas_id', $titulo['titulos_tipo']);
        $conta = $this->db->get('contas')->row_array();
        $titulo['titulos_tipo'] = $conta['contas_nome'];
        
        $this->db->where('frota_id', $titulo['titulos_frota']);
        $frota = $this->db->get('frota')->row_array();
        $titulo['titulos_frota'] = $frota['frota_codigo'];
        
        
        $help = explode("|", $titulo['titulos_forneclin']);
        if($help[0] == "F"){
            $this->db->where('fornecedor_cnpj', $help[1]);
            $k = $this->db->get('fornecedores')->row_array();
            $titulo['titulos_forneclin'] = $k['fornecedor_nome'];
        }elseif($help[0] == "C"){
            $this->db->where('cliente_cpfcnpj', $help[1]);
            $k = $this->db->get('clientes')->row_array();
            $titulo['titulos_forneclin'] = $k['cliente_nome'];
        }
        
        $atraso = $this->atraso($titulo['titulos_vencimento']);
        $ats = "";
        $ats2 = "";
        $npt = "";
        if($atraso > 0){
            $apagar = $this->apagar($titulo['titulos_valor'], $titulo['titulos_juros'], $atraso, $titulo['titulos_multa']);
            $ats = "<label>Dias em atraso: </label><br>";
            $ats2 = "<label>".$atraso."</label><br>";
            $npt = "<div class='col-md-4 ml-auto text-right'>
                        <label>Juros(%): </label>
                        <input type='text'  class='form-control' value='".$titulo['titulos_juros']."'>
                        </div>
                    <div class='col-md-4 ml-auto text-right'>    
                        <label>Multa(%): </label>
                        <input type='text'  class='form-control' value='".$titulo['titulos_multa']."'>
                    </div>
                    <div class='col-md-4 ml-auto text-right'>    
                        <label>Atraso: </label>
                        <input type='text' id='atraso' name='atraso'  class='form-control' value='".$atraso."' placeholder='% dias'>
                    </div>";
        }elseif($atraso < 0){
            $apagar = $this->apagar($titulo['titulos_valor'], $titulo['titulos_desconto']);
            $atraso = 0;
            $npt = "<div class='col-md-12 ml-auto text-right'>
                        <label>Desconto(%): </label>
                        <input type='text'  class='form-control' value='".$titulo['titulos_desconto']."'>
                    </div>";
        }elseif($atraso == 0){
            $apagar = $this->Money($titulo['titulos_valor']);
        }
        
        
	
	$html = "
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLongTitle'><h2>Baixa de Título</h2></h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <form action='".base_url('financeiro/baixatitulo')."' method='post'>
                            <div class='container-fluid'>
                                <div class='row'>
                                    <div class='col-md-4 ml-auto text-right'>
                                        <label>Tipo: </label><br>
                                        <label>Fornecedor/Cliente:</label><br>
                                        <label>Nº/Série: </label><br>
                                        <label>Vencimento: </label><br>
                                        <label>Valor: </label><br>
                                        <label>Frota: </label><br>
                                        ".$ats."
                                        <label>Observações: </label><br>
                                    </div>
                                    <div class='col-md-8 ml-auto'>
                                        <label>".$titulo['titulos_tipo']."</label><br>
                                        <label>".substr($titulo['titulos_forneclin'], 0, 23)."...</label><br>
                                        <label>".$titulo['titulos_numeroserie']."</label><br>
                                        <label>".$this->formatadata($titulo['titulos_vencimento'])."</label><br>
                                        <label>".$this->Money($titulo['titulos_valor'])."</label><br>
                                        <label>".$titulo['titulos_frota']."</label><br>
                                        ".$ats2."
                                        <label>".$titulo['titulos_observacao']."</label>
                                    </div>
                                </div>
                                <hr style='margin-top:5px;margin-bottom: 5px'>
                                <div class='row'>
                                    ".$npt."
                                </div>
                                <hr style='margin-top:5px;margin-bottom: 5px'>
                                <div class='row'>
                                    <div class='col-md-6 ml-auto'>
                                        <label>Forma de Pagamento</label>
                                        <select id='formpag' name='formpag' class='form-control' width='100%!important' required>
                                            <option value='' disabled selected>-- Forma de pagamento --</option>
                                            <option value='DINHEIRO'>DINHEIRO</option>
                                            <option value='PIX'>PIX</option>
                                            <option value='TRANSFERENCIA'>TRANSFERÊNCIA</option>
                                            <option value='BOLETO'>BOLETO</option>
                                            <option value='CARTÃO DE CREDITO'>CARTÃO DE CRÉDITO</option>
                                            <option value='PERMUTA'>PERMUTA</option>
                                        </select>
                                    </div>
                                    <div class='col-md-6 ml-auto'>
                                        <label>Valor Pago</label>
                                        <input type='text' id='vlrpg' name='vlrpg' value='".$apagar."' class='form-control'>
                                        <input type='hidden' id='titid' name='titid' value='".$titulo['titulos_id']."' class='form-control'>
                                    </div>
                                </div>
                                <hr style='margin-top:5px;margin-bottom: 5px'>
                                <div class='row'>
                                    <div class='col-md-12 ml-auto'>
                                        <label>Observações</label>
                                        <input type='text' id='obspgt' name='obspgt' class='form-control'>
                                    </div>
                                </div>
                            </div>
                            <label style='width: 5%'></label>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
                                <button type='submit' class='btn btn-success'>Baixar Título</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ";
        
        return $html;
    }
    
    
    
}
    