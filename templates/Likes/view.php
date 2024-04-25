<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Like $like
 */
?>

<?php
$this->assign('title', __('Like'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Likes'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($like->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $like->has('user') ? $this->Html->link($like->user->name, ['controller' => 'Users', 'action' => 'view', $like->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Photo') ?></th>
                <td><?= $like->has('photo') ? $this->Html->link($like->photo->title, ['controller' => 'Photos', 'action' => 'view', $like->photo->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($like->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($like->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($like->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $like->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $like->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $like->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
