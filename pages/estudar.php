<div class="arrow-area">
    <div class="arrow">
        <img data-proxima="-1" class="arrow-left" src="<?php echo URL;?>images/arrow_icon.png"/>
        Materia Anterior
    </div>
    <div class="pomodoros-estudados">
    <?php for($i = 1; $i<=$qtd_pomodoros; $i++):?>
    <input type="radio" data-materia="<?php echo $id;?>" id="radio-<?php echo $i;?>" <?php echo ($i<=$pomodoros_estudados) ? 'checked="true"' : '';?>/>
    <?php endfor;?>
    </div>
    <div class="arrow">
        Próxima Materia
        <img data-proxima="1" class="arrow-right" src="<?php echo URL;?>images/arrow_icon.png"/>
    </div>
</div>
<div class="materia-content">
    <h1 class="materia-title"><?php echo $nome;?></h1>
    <div class="materia-topicos">
        <ul class="materia-list">
            <!--
            <li><a href="topico.php">PHP topicos avançados</a></li>
            <li>Composer</li>
            <li>PSR's</li>
            -->
            <?php foreach($topicos as $topico):?>
                <li class="topico" data-links='<?php echo !empty($topico['links']) ? $topico['links'] : '';?>'><?php echo $topico['topico'];?></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
