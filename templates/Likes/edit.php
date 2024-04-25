<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Like $like
 */
?>

<?php
$this->assign('title', __('Edit Like'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Likes'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $like->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($like) ?>
    <div class="card-body">
        <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('photo_id', ['options' => $photos, 'class' => 'form-control']) ?>
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
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $like->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>