
<div class="ganhos formBox">  
    
    <?= $this->Form->create('Ganho',array('default' => false)); ?>    
    
    <div class="inputsRight">
    
        <?= $this->Form->input('id'); ?>
        <div id="selectCategoria" class="input text required">
            <?= $this->Form->input('fonte_id',
                                array('empty' => 'Escolha um registro',
                                      'div' => false)); ?>
            <a href="#" class="btnadd" title="inserir" id="insereInputFontes">
                INSERIR NOVA FONTE
            </a>
        </div>
        
        <?= $this->Form->input('valor'); ?>
        <?= $this->Form->input('datadabaixa',
                            array('label' => 'Data da baixa',
                                  'type' => 'text',
                                  'class' => 'dataField',
                                  'default' => date('d-m-Y')));  ?>
        
        <?= $this->Form->input('observacoes',
                            array('type' => 'textarea',
                                  'label' => 'Observações',
                                  'id' => 'Observacoes')); ?>
    </div>                

    <div class="submit">
        <input type="submit" id="submitAjax" value="Atualizar">
        <input type="submit" id="fecharColorbox" value="Cancelar" />
    </div>
    
</div>

<script type="text/javascript">
    // variáveis que serão usadas em algumas funções do arquivo form.js
    var urlInsereInput = '<?= $this->Html->url(array("action" => "InsereInput"));?>';
    var urlInsereSelect = '<?= $this->Html->url(array("action" => "InsereSelect"));?>';
</script>
<?php echo $this->Html->script('forms'); ?>

<script type="text/javascript">
    
    $('#fecharColorbox').click(function(){
        parent.jQuery.fn.colorbox.close();
    });
            
    $('#submitAjax').live('click', function(){
        
        var id              = $('#GanhoId').val();
        var nome            = $('#FonteNome').val();
        var fonte_id        = $('#GanhoFonteId').val();
        var valor           = $('#GanhoValor').val();
        var data            = $('#GanhoDatadabaixa').val();
        var obs             = $('#Observacoes').val();
        
        $.ajax({
            
            url: '<?= $this->Html->url(array("action" => "editResponse"));?>', 
            data: ({ Ganho: {id:id, fonte_id:fonte_id, valor:valor, datadabaixa:data, observacoes:obs},
                     Fonte: {nome:nome} }),
            beforeSend: function(){
                $('.submit span').detach();
                $('.submit').append('<?= $this->Html->image('ajax-loader-p.gif'); ?>');
            },
            success: function(result){
                
                $('.submit img').detach();
                if(result == 'error'){
                    $('.submit').append('<span class="ajax_error_response">Registro inválido</span>');
                }else if(result == 'validacao'){
                    $('.submit').append('<span class="ajax_error_response">Preencha todos os campos obrigatórios corretamente</span>');
                }else {
                    $('body').append(result)
                    //parent.$('#ganho-' + id).html(result);
                    //var t=setTimeout("parent.jQuery.fn.colorbox.close()",100);
                }
            }
        });
        return false;
    });
    
</script>