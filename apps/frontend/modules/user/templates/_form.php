
<form style="margin: 0 auto;padding: 40px;width: 400px;" action="<?php echo url_for('/user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<div>如果您目前不是《优拓建筑工程技术网》用户，请您免费注册。</div>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('/home') ?>" class="btn btn-primary">返回</a>

          <input class="btn btn-primary pull-right" type="submit" value="注册"/>
        </td>
      </tr>
    </tfoot>
    <tbody>
    
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <td width="30%"><?php echo $form['username']->renderLabel('用户名') ?></td>
        <td>
          <?php echo $form['username']->render(array('class' => 'form-control ')) ?>
          <?php echo $form['username']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['password']->renderLabel('密码') ?></td>
        <td>
          <?php echo $form['password']->render(array('class' => 'form-control')) ?>
          <?php echo $form['password']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['repassword']->renderLabel('确认密码') ?></td>
        <td>
          <?php echo $form['repassword']->render(array('class' => 'form-control')) ?>
          <?php echo $form['repassword']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['email']->renderLabel('电子邮箱') ?></td>
        <td>
          <?php echo $form['email']->render(array('class' => 'form-control')) ?>
          <?php echo $form['email']->renderError() ?>
        </td>
      </tr>
       
    </tbody>
  </table>
</form>
