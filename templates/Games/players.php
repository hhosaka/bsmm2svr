<div class="row">
    <div>
        <div class="users view content">
            <?= 'Title : '.$outline->Title?><br>
            <?= 'Owner : '.$outline->Owner?><br>
            <?= 'Started : '.$outline->ElapseTime?><br>
            <?= 'Rule : '.$outline->RuleName?><br>
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
                        <td style="text-align: center;"><?= h(round($player->Point->WinPoint, 2)) ?></td>
                        <td style="text-align: center;"><?= h($player->Point->LifePoint) ?></td>
                        <td style="text-align: center;"><?= h($player->OpponentPoint->MatchPoint) ?></td>
                        <td style="text-align: center;"><?= h(round($player->OpponentPoint->WinPoint,2)) ?></td>
                        <td style="text-align: center;"><?= h($player->OpponentPoint->LifePoint) ?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <?= $this->Html->link('<<Switch to Matches>>', ['action' => 'matches',$guid])?>
        </div>
    </div>
</div>
