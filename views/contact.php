<?php /** @var $model \app\models\ContactForm */ ?>


<?php $this->title="Contact" ?>

<h1>Contact</h1>
<?php $form =\htethtetoo\phpmvc\form\Form::begin('','post') ?>
<?php echo $form->field($model,'subject')?>
<?php echo $form->field($model,'email')?>
<?php echo new \htethtetoo\phpmvc\form\TextareaField($model,'body')?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \htethtetoo\phpmvc\form\Form::end(); ?>

<!--<form action="" method="post">-->
<!--    <div class="form-group">-->
<!--        <label>Subject</label>-->
<!--        <input type="text" name="subject" class="form-control">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label>Email</label>-->
<!--        <input type="text" name="email" class="form-control">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label>Body</label>-->
<!--        <input type="text" name="body" class="form-control"/>-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->