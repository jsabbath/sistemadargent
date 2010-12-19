

<div class="frequencias index">
    <div id="contentHeader"> 
        <h1>Usuários</h1>
    </div>
    
    <div class="balancoBotoesWraper">
        <div class="balancoBotoes">
            <span class="pagina">Página</span>
            <p><?php echo $this->Paginator->counter(array('format' => __('%page%',true))); ?></p>
            <span class="pagina">de</span>
            <p><?php echo $this->Paginator->counter(array('format' => __('%pages%',true))); ?></p>
            <p>|</p>
            <p><?php echo $this->Paginator->counter(array('format' => __('%count%',true))); ?></p>
            <span class="pagina">Registros</span>
        </div>
    </div>
        
    <div class="relatoriosWraper">
        
        <div id="relatorioRapido">
            
            
        
        </div>
    
    </div>
        
    <div class="registrosWraper">
        
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo $this->Paginator->sort('id');?></th>
                <th><?php echo $this->Paginator->sort('nome');?></th>
                <th><?php echo $this->Paginator->sort('email');?></th>
                <th><?php echo $this->Paginator->sort('Último login','ultimologin');?></th>
                <th><?php echo $this->Paginator->sort('Data do cadastro','created');?></th>
            </tr>
        
            <?php foreach ($usuarios as $value): ?>
            <tr>
                <td>
                    <?php echo $value['Usuario']['id']; ?></td>
                <td>
                    <?php echo h($value['Usuario']['nome']); ?><br />
                    <?php echo h($value['Usuario']['login']); ?>
                </td>
                <td>
                    <?php echo h($value['Usuario']['email']); ?>
                </td>
                <td>
                    <?= $this->Data->formata($value['Usuario']['ultimologin'],'descricaocompleta'); ?>
                </td>
                <td>
                    <?= $this->Data->formata($value['Usuario']['created']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </table>
        
        <div class="paging">
            <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
            <?php echo $this->Paginator->numbers();?>
            <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
        </div>
    </div>

</div>
