<div class="row">
    <div>
        <div class="users view content">
            <?= 'Title : '.$outline->Title?><br>
            <?= 'Owner : '.$outline->Owner?><br>
            <?= 'Started : '.$outline->ElapseTime?><br>
            <table>
                <th>
                    <td>id</td>
                    <td>status</td>
                    <td>player1</td>
                    <td>player2</td>
                    <td>gap match</td>
                </th>
                <?php foreach ($matches as $match):?>
                    <tr>
                        <td></td>
                        <td><?= h($match->Id) ?></td>
                        <td><?= $match->Status?h('Finished'):h('Progress')?></td>
                        <?php echo $match->IsPlayer1Win?'<td bgcolor="#c0ffc0">':'<td>'?>
                            <?= h($match->Player1Name) ?></td>
                        <?php echo $match->IsPlayer2Win?'<td bgcolor="#c0ffc0">':'<td>'?>
                            <?= h($match->Player2Name) ?></td>
                        <td><?= $match->IsGapMatch?h('GAP'):''?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <?= $this->Html->link('<<Switch to Players>>', ['action' => 'players',$guid])?>
        </div>
    </div>
</div>
