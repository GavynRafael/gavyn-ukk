<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coment $coment
 */
?>

<?php
$this->assign('title', __('Coment'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Coments'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($coment->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $coment->has('user') ? $this->Html->link($coment->user->name, ['controller' => 'Users', 'action' => 'view', $coment->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Photo') ?></th>
                <td><?= $coment->has('photo') ? $this->Html->link($coment->photo->title, ['controller' => 'Photos', 'action' => 'view', $coment->photo->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($coment->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($coment->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($coment->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coment->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coment->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Coment') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($coment->coment)); ?>
    </div>
</div>
