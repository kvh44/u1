<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('userback/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('userback/index') ?>" class="btn btn-default">返回</a>
          <input type="submit" value="确定" class="btn btn-success pull-right" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>用户名</th>
        <td>
          <?php echo $form['username']->renderError() ?>
          <?php echo $form['username']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>密码</th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>确认密码</th>
        <td>
          <?php echo $form['repassword']->renderError() ?>
          <?php echo $form['repassword']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      <tr>
        <th>电子邮箱</th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email']->render(array('class'=>'form-control')) ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
