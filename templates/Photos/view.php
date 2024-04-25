<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>
<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Photo') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Html->image('../img/' . $photo->photo, ['class' => 'card-img-top']); ?>
    </div>
</div>
<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($photo->title) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Title') ?></th>
                <td><?= h($photo->title) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $photo->has('user') ? $this->Html->link($photo->user->name, ['controller' => 'Users', 'action' => 'view', $photo->user->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $photo->has('album') ? $this->Html->link($photo->album->name, ['controller' => 'Albums', 'action' => 'view', $photo->album->id]) : '' ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($photo->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($photo->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($photo->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $photo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>



<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Description') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($photo->description)); ?>
    </div>
</div>

<div class="related related-coment view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Coments') ?></h3>
        <div class="ml-auto">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                Coment
            </button>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Coment') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($photo->coments)) : ?>
            <tr>
                <td colspan="7" class="text-muted">
                    <?= __('Coments record not found!') ?>
                </td>
            </tr>
            <?php else : ?>
            <?php foreach ($photo->coments as $key => $coment) : ?>
            <tr>
                <td><?= h($key + 1) ?></td>
                <td><?= h($coment->coment) ?></td>
                <td><?= h($coment->user_id) ?></td>
                <td class="actions">
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
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($photo->likes)) : ?>
            <tr>
                <td colspan="6" class="text-muted">
                    <?= __('Likes record not found!') ?>
                </td>
            </tr>
            <?php else : ?>
            <?php foreach ($photo->likes as $key => $like) : ?>
            <tr>
                <td><?= h($key + 1) ?></td>
                <td><?= h($like->created) ?></td>
                <td><?= h($like->user_id) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $like->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Coment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= $this->Form->create(null, ['url' => ['controller' => 'coments', 'action' => 'add'], 'role' => 'form']) ?>
                <div class="modal-body">
                    <?php
                    $auth = $this->getRequest()->getSession()->read()['Auth'];
                    ?>
                    <input type="hidden" name="user_id" id="" value="<?= $auth['id'] ?>">
                    <input type="hidden" name="photo_id" value="<?= $photo->id ?>">
                    <textarea name="coment" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>