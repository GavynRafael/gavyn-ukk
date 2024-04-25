<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Users'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->name) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($user->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Address') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
</div>

<div class="related related-album view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Albums') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Album'), ['controller' => 'Albums', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Albums'), ['controller' => 'Albums', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->albums)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Albums record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->albums as $album) : ?>
                    <tr>
                        <td><?= h($album->id) ?></td>
                        <td><?= h($album->name) ?></td>
                        <td><?= h($album->description) ?></td>
                        <td><?= h($album->created) ?></td>
                        <td><?= h($album->modified) ?></td>
                        <td><?= h($album->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Albums', 'action' => 'view', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Albums', 'action' => 'edit', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Albums', 'action' => 'delete', $album->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-coment view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Coments') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Coment'), ['controller' => 'Coments', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Coments'), ['controller' => 'Coments', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Coment') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Photo Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->coments)) : ?>
                <tr>
                    <td colspan="7" class="text-muted">
                        <?= __('Coments record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->coments as $coment) : ?>
                    <tr>
                        <td><?= h($coment->id) ?></td>
                        <td><?= h($coment->coment) ?></td>
                        <td><?= h($coment->created) ?></td>
                        <td><?= h($coment->modified) ?></td>
                        <td><?= h($coment->user_id) ?></td>
                        <td><?= h($coment->photo_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Coments', 'action' => 'view', $coment->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Coments', 'action' => 'edit', $coment->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Coments', 'action' => 'delete', $coment->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $coment->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-like view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Likes') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Like'), ['controller' => 'Likes', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Likes'), ['controller' => 'Likes', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modifed') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Photo Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->likes)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Likes record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->likes as $like) : ?>
                    <tr>
                        <td><?= h($like->id) ?></td>
                        <td><?= h($like->created) ?></td>
                        <td><?= h($like->modifed) ?></td>
                        <td><?= h($like->user_id) ?></td>
                        <td><?= h($like->photo_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $like->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-photo view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Photos') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($user->photos)) : ?>
                <tr>
                    <td colspan="9" class="text-muted">
                        <?= __('Photos record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->photos as $photo) : ?>
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
