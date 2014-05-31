<?php
$feedbackClass = ($app->getRequest()->getMethod() == 'POST' && !empty($errors)) ? " has-error" : "";
?>
<div class="row">
    <div class="form-group col-sm-12<?php echo $feedbackClass; ?>">
        <?php echo $view['form']->label($form, $label) ?>
        <?php echo $view['form']->widget($form) ?>
        <?php echo $view['form']->errors($form) ?>
    </div>
</div>