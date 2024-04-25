<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo[]|\Cake\Collection\CollectionInterface $photos
 */
?>

<?php
$this->assign('title', __('Photos'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos')],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-flex flex-column flex-md-row">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="d-flex ml-auto">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control form-control-sm',
                'templates' => ['inputContainer' => '{{content}}']
            ]); ?>
            <?= $this->Html->link(__('New Photo'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm ml-2']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body d-flex flex-wrap">
        <?php foreach ($photos as $photo) : ?>
        <div class="card m-2" style="width: 18rem;">
            <?= $this->Html->image('../img/' . $photo->photo, ['width' => '100px', 'class' => 'card-img-top']); ?>
            <div class="card-body">
                <div>
                    <h5 class="card-title"><?= h($photo->title) ?></h5>
                    <p class="card-text"><?= h($photo->description) ?></p>
                </div>
                <div class="mt-3 d-flex flex-wrap">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $photo->id], ['class' => 'btn btn-primary btn-sm mr-2', 'escape' => false]) ?>
                    <?php
                        $auth = $this->getRequest()->getSession()->read()['Auth'];
                        ?>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Likes', 'action' => 'add']]) ?>
                    <?= $this->Form->hidden('photo_id', ['value' => $photo->id]) ?>
                    <?= $this->Form->hidden('user_id', ['value' => $auth['id']]) ?>
                    <?= $this->Form->button('', ['class' => 'btn btn-danger btn-sm far fa-thumbs-up', 'type' => 'submit']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
    <!-- /.card-body -->
    <div class="card-footer d-flex flex-column flex-md-row">
        <div class="text-muted">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm mb-0 ml-auto">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>