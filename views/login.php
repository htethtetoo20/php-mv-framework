<?php $this->title="Login" ?>

<h1>Login</h1>
<?php use htethtetoo\phpmvc\form\Form;
$form= Form::begin('','post');

echo $form->field($model,'email');
echo $form->field($model,'password')->passwordField();
?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end();?>