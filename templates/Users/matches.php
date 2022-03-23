<div class="row">
    <div>
        <div class="users view content">
            <?= 'Title : '.$game->Title?><br>
            <?= 'Owner : '.$game->Owner?><br>
            <?= 'Started : '.$game->Started?><br>
            <table>
                <th>
                    <td>id</td>
                    <td>status</td>
                    <td>gap match</td>
                    <td>player1</td>
                    <td>player2</td>
                </th>
                <?php foreach ($matches as $match):?>
                    <tr>
                        <td></td>
                        <td><?= h($match->Id) ?></td>
                        <td><?= $match->Status?h('Finished'):h('Progress')?></td>
                        <td><?= $match->IsGapMatch?h('GAP'):''?></td>
                        <?php echo $match->IsPlayer1Win?'<td bgcolor="#c0ffc0">':'<td>'?>
                            <?= h($match->Player1Name) ?></td>
                        <?php echo $match->IsPlayer2Win?'<td bgcolor="#c0ffc0">':'<td>'?>
                            <?= h($match->Player2Name) ?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <?= $this->Html->link('<<Switch to Players>>', ['controller' => 'Users', 'action' => 'players',$id])?>
        </div>
    </div>
</div>
