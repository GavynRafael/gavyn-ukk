<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
?>

<?php
$this->assign('title', __('Album'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Albums'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($album->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($album->name) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $album->has('user') ? $this->Html->link($album->user->name, ['controller' => 'Users', 'action' => 'view', $album->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($album->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($album->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($album->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $album->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $album->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Description') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($album->description)); ?>
    </div>
</div>

<div class="related related-photo view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Photos') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add', '?' => ['album_id' => $album->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Album Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($album->photos)) : ?>
                <tr>
                    <td colspan="9" class="text-muted">
                        <?= __('Photos record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($album->photos as $photo) : ?>
                    <tr>
                        <td><?= h($photo->id) ?></td>
                        <td><?= h($photo->photo) ?></td>
                        <td><?= h($photo->title) ?></td>
                        <td><?= h($photo->description) ?></td>
                        <td><?= h($photo->created) ?></td>
                        <td><?= h($photo->modified) ?></td>
                        <td><?= h($photo->user_id) ?></td>
                        <td><?= h($photo->album_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photo->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photo->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photo->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
