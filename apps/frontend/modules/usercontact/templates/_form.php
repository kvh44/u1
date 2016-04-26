<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<style>
<!--
/*
       .ui-widget-content {
         background:#F2F2F2;
       }
*/       
-->
</style>
<form action="<?php echo url_for('usercontact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table width="100%">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('/user') ?>" class='button' >返回</a>
        
          <input type="submit" value="保存" class="rightsubmit" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php // echo $form['user_id']->renderLabel() ?></th>
        <td>
          <?php // echo $form['user_id']->renderError() ?>
          <?php // echo $form['user_id'] ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><?php echo $form['mobile']->renderLabel('手机') ?></th>
        <td>
          <?php echo $form['mobile']->renderError() ?>
          <?php echo $form['mobile']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><?php echo $form['fix']->renderLabel('固定电话') ?></th>
        <td>
          <?php echo $form['fix']->renderError() ?>
          <?php echo $form['fix']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><?php echo $form['qq']->renderLabel('QQ') ?></th>
        <td>
          <?php echo $form['qq']->renderError() ?>
          <?php echo $form['qq']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><?php echo $form['msn']->renderLabel('MSN') ?></th>
        <td>
          <?php echo $form['msn']->renderError() ?>
          <?php echo $form['msn']->render(array('class' => 'login')) ?>
        </td>
      </tr>
      <tr>
        <td width="20%"><?php echo $form['skype']->renderLabel('SKYPE') ?></th>
        <td>
          <?php echo $form['skype']->renderError() ?>
          <?php echo $form['skype']->render(array('class' => 'login')) ?>
        </td>
      </tr>

    </tbody>
  </table>
</form>
