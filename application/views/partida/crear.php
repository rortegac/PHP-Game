Partida iniciada por el jugador <?php echo $nombreJugador ?>
<br />

<form name="pedir" action="<?php $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="controller" value="Partida" />
    <input type="hidden" name="queryString" value="usuario" />
    <button type="submit" name="action" value="pedir">Pedir una carta</button>
    <button type="submit" name="action" value="plantarse" >Plantarse</button>
</form>

