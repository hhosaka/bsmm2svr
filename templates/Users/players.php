<div class="row">
    <div>
        <div class="users view content">
            <?= 'Title : '.$game->Title?><br>
            <?= 'Owner : '.$game->Owner?><br>
            <?= 'Started : '.$game->Started?><br>
            <?= 'Rule : '.$game->RuleName?><br>
            <table border='1'>
                <tr>
                    <th colspan=5></th>
                    <th colspan=3>Opponent</th>
                </tr>
                <tr>
                    <th>order</th>
                    <th>name</th>
                    <th>Match Point</th>
                    <th>Win Point</th>
                    <th>Life Point</th>
                    <th>Match Point</th>
                    <th>Win Point</th>
                    <th>Life Point</th>
                </tr>
                <?php foreach ($players as $player):?>
                    <tr>
                        <td style="text-align: center;"><?= h($player->Order) ?></td>
                        <td><?= h($player->Name) ?></td>
                        <td style="text-align: center;"><?= h($player->Point->MatchPoint) ?></td>
                        <td style="text-align: center;"><?= h($player->Point->WinPoint) ?></td>
                        <td style="text-align: center;"><?= h($player->Point->LifePoint) ?></td>
                        <td style="text-align: center;"><?= h($player->OpponentPoint->MatchPoint) ?></td>
                        <td style="text-align: center;"><?= h($player->OpponentPoint->WinPoint) ?></td>
                        <td style="text-align: center;"><?= h($player->OpponentPoint->LifePoint) ?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <?= $this->Html->link('<<Switch to Matches>>', ['controller' => 'Users', 'action' => 'matches',$id])?>
        </div>
    </div>
</div>
