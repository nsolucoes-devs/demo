<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Populamodel extends CI_Model{
    
    public function html(){
        $html = "<div style='display: none' id='new_eixo'> <div class='row'>
                    <div class='col-md-5'>
                        <input type='hidden' class='anchor-e' value='0'>
                        <div class='e-pneus'>
                            <div class='custom-20-e'>
                            </div>
                            <div class='custom-80-e'>
                                <button type='button' class='btn btn-primary btn-custom btn-e' title='Adicionar Pneu Esquerdo'><em class='fa fa-plus'></em></button>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-2 text-center'>
                        <br>
                        <h4 class='h4-eixo'></h4>
                        <hr class='eixo-h'>
                        <!--<span class='eixo-v'>|<br>-->
                            <button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-vazio' onclick='newVazio()' title='Novo Eixo Sem Pneus'><em style='color: blue' class='fa fa-arrow-down'></em></button>
                            <button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo' onclick='newEixo()' title='Novo Eixo Com Pneus'><em class='fa fa-plus'></em></button>
                            <button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-rem' onclick='rmvEixo()' title='Remover Último Eixo'><em style='color: red' class='fa fa-close'></em></button>
                        <!--</span>-->
                    </div>
                    <div class='col-md-5'>
                        <input type='hidden' class='anchor-d' value='0'>
                        <div class='d-pneus'>
                            <div class='custom-20-d'>
                            </div>
                            <div class='custom-80-d'>
                                <button type='button' class='btn btn-primary btn-custom btn-d' style='margin-top: 7%' title='Adicionar Pneu Direito'><em class='fa fa-plus'></em></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
        return $html;
    }
}