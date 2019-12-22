<?= $this->Form->create($student, ['class' => 'register_form', 'id' => 'registerform']) ?>
<div class="row register_row">
    <div class="col-lg-12 register_col">
        <?= $this->Form->control('nationalCode', ['type' => 'tel','class' => 'form_input','placeholder' => 'National Code', 'maxlength' => 10, 'required' => true, 'label' => false]); ?>
    </div>
    <div class="col-lg-12 register_col">
        <?= $this->Form->control('mobile', ['type' => 'tel','class' => 'form_input','placeholder' => 'Mobile', 'maxlength' => 11, 'required' => true, 'label' => false]); ?>
    </div>
    <div class="col">
        <?= $this->Form->button(__('Register'), ['class' => 'form_button trans_200']) ?>
    </div>
</div>
<?= $this->Form->end() ?>

<div class="<?= $alertStyle ?> mt-3">
    <?= $message ?>
</div>
