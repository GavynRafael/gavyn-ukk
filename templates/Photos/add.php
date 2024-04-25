<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Add Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($photo, ['enctype' => 'multipart/form-data', 'valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']) ?>
        <?= $this->Form->control('title') ?>
        <?= $this->Form->control('description') ?>
        <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('album_id', ['options' => $albums, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>