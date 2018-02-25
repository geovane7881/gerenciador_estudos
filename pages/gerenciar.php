<?php if(!empty($add)):?>
    
    <a href="<?php echo URL;?>gerenciar.php">Voltar</a><br/><br/>

    <form method="POST">
        <input type="hidden" name="opcao" value="1"/>
        Nome:<br/>
        <input type="text" name="nome"/><br/>
        Ordem:<br/>
        <input type="text" name="ordem"/><br/>
        Quantidade de pomodoros:<br/>
        <input type="text" name="qtd_pomodoros"/><br/><br/>
        <input type="submit" value="Cadastrar Materia"/>
    </form>

<?php elseif(!empty($edit)):?>

    <div class="container">
        <a href="<?php echo URL;?>gerenciar.php">Voltar</a><br/><br/>
        <div class="form-area">
            <form class="form-edit" method="POST">
                <div class="form-left">
                    <input type="hidden" name="opcao" value="2"/>
                    <input type="hidden" name="id" value="<?php echo $materia['id'];?>"/>
                    Nome:<br/>
                    <input type="text" name="nome" value="<?php echo $materia['nome'];?>"/><br/>
                    Ordem:<br/>
                    <input type="text" name="ordem" value="<?php echo $materia['ordem'];?>"/><br/>
                    Quantidade de pomodoros:<br/>
                    <input type="text" name="qtd_pomodoros" value="<?php echo $materia['qtd_pomodoros'];?>"/>
                </div>


                <div class="form-right">
                    <a id="btn-add-topico" href="">Adicionar Topico</a>
                    <?php if(!empty($topicos)):?>
                    <table class="topicos">
                       <tr>
                            <th>Nome</th>
                            <th>Links (json)</th>
                        </tr> 
                        <?php foreach($topicos as $topico):?>
                        <tr class="topico">
                            <td class="topico-nome"><input type="text" name="nome_topico[]" value="<?php echo $topico['nome'];?>"/></td>
                            <td class="topico-links"><input type="text" name="links[]" value='<?php echo $topico['links'];?>'/><a class="btn-remove-topico" href="">Remover</a></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            
            <!-- sem topicos -->
            <?php else:?>
                <table class="topicos">
                   <tr>
                        <th>Nome</th>
                        <th>Links (json)</th>
                    </tr> 
                    <tr class="topico">
                        <td class="topico-nome"><input type="text" name="nome_topico[]" value="Topico"/></td>
                        <td class="topico-links"><input type="text" name="links[]" value='{"link" : "http://sitequalquer.com"}'/><a class="btn-remove-topico" href="">Remover</a></td>
                    </tr>
                </table>
            </div>
            <?php endif;?>
            <input class="botao_enviar"type="submit" value="Salvar"/>
            </form>
        </div>
    </div>

<?php else:?>

<!-- menu topo -->
<div class="topo">
    <a href="<?php echo URL;?>gerenciar.php?add=true">Adicionar Materia</a>
</div>

<ul class="materias">
<?php if(!empty($data)):?>
    <?php foreach($data as $materia):?>
        <!--botao deletar-->
        <a class="btn-delete" href="<?php echo URL;?>gerenciar.php?delete=<?php echo $materia['id'];?>">
            <img src="<?php echo URL;?>images/excluir.png"/>
        </a>

        <!-- botao editar -->
        <li><a href="<?php echo URL;?>gerenciar.php?edit=<?php echo $materia['id'];?>"><?php echo $materia['nome'];?></a></li> 
    <?php endforeach;?>
<?php endif;?>
</ul>

<?php endif;?>
