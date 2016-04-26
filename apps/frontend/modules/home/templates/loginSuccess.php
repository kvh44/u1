

<br><br>

<div class="container">

<div class="panel panel-success">
  <div class="panel-heading">登录</div>
      <img id="ajaxloader" style="display:none;float:left;" src="/images/ajax-loader.gif"><div id="loginstatezone" class="alert alert-danger hiddenzone" ></div>
      <form class="form-signin" action="<?php echo url_for('user/login') ?>" method="get">
        <p>如果您目前不是《优拓建筑工程技术网》会员，请您免费注册。</p>  
        <label>用户名:</label>
        <?php echo $loginform['username']->render(array('class' => 'form-control'));?>
        <label>密码:</label>
        <?php echo $loginform['password']->render(array('class' => 'form-control'));?>
        <button class="btn btn-large btn-primary btn-block" id="loginsubmit" type="button">登录</button>
      </form>

</div>
</div> <!-- /container -->