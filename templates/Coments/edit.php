<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coment $coment
 */
?>

<?php
$this->assign('title', __('Edit Coment'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Coments'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $coment->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($coment) ?>
    <div class="card-body">
        <?= $this->Form->control('coment') ?>
        <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('photo_id', ['options' => $photos, 'class' => 'form-control']) ?>
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
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $coment->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>