<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Games'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Game'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="games view content">
            <h3><?= h($game->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Guid') ?></th>
                    <td><?= h($game->guid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($game->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($game->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($game->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($game->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Outline') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($game->outline)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Players') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($game->players)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Matches') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($game->matches)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Game') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($game->game)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
