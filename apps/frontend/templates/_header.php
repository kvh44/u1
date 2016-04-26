
<div class="header">
            <div class="top_info">
				<div class="top_info_right">
                                <ul class="nav nav-pills pull-right">    
                                    <li><a href="<?php echo url_for('utoconsult_aboutus') ?>">关于优拓</a></li>
                                    <li><a href="/index.html"><img src="/images/cn.gif" style="vertical-align:middle;">中文</a></li>
				    <li><a href="#"><img src="/images/en.gif" style="vertical-align:middle;">English</a></li>
				<?php 
				if ($sf_user->getAttribute('user')!=null ) {
				?>
			            <li>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            <?php  echo $sf_user->getAttribute('user')->getUsername(); ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                        <?php 
                                          if ($sf_user->getAttribute('user')->getIsadmin()){
                                             echo '<li><a href = "/articles/listadmin/page/1">HTML文章管理 </a></li>';
                                             echo '<li><a href = "/category1">一级目录管理 </a></li>';
                                             echo '<li><a href = "/category2">二级目录管理 </a></li>';
                                             echo '<li><a href = "/file/listadmin/page/1">PDF文档管理 </a></li>';
                                             echo '<li><a href = "/userback">用户管理 </a></li>';
                                          }
                                        ?>    
                                        </ul>
                                        </div>    
                                    </li>
				    <li><a id="logoutlink" href="#">退出</a></li>

                                    <?php }else{ ?>
				    <li><a href="/login.html" id="loginlink2">登录</a></li>
				    <li><a href="/newuser.html">免费注册</a></li>
                                    <?php } ?>
                                </ul>  
                                   

                                    
                                </div> 
                                <div class="top_info_left">
					
				</div>
			</div>

			<div class="logo">
				<a href="/index.html" title="优拓建筑工程技术交流平台"><img src="/images/utoconsult.png" style="width:360px;" /></a>
			</div>
    
    <div class="pull-right" style="width: 400px;">
    <div class="input-group"> 
      <input type="text" class="form-control" placeholder="关键词" id="search_text" value="<?php echo $sf_request->getParameter('query') ?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="search_button">搜索</button>
      </span>
    </div><!-- /input-group -->
    </div>

</div>
<br><br>	 

      <div class="navbar">

        <div class="container">

          <div class="nav-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="/articles/index/category/1/name/工程设计.html">工程设计<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[1] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>  
              <li class="dropdown">
                <a href="/articles/index/category/3/name/项目管理.html">项目管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[3] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>  
              <li class="dropdown">
                <a href="/articles/index/category/4/name/工程材料.html">工程材料<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[4] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="/articles/index/category/5/name/相关设备.html">相关设备<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[5] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="/articles/index/category/2/name/节能环保.html">节能环保<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[2] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>
              
              <li class="dropdown">
                <a href="/articles/index/category/6/name/规范标准.html">规范标准<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[6] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>
              
              <li class="dropdown">
                <a href="/articles/index/category/7/专业术语.html">专业术语<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                foreach ($arrayLinksCategory2[7] as $Category2) {
                	echo "<li><a href='/articles/index/category2/{$Category2['id']}/name/{$Category2['name']}.html'>{$Category2['name']}</a></li>";
                }
                
                ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="/file.html">技术文档<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <?php
                        foreach($arrayLinksFileCategory as $i => $category)
                        {
                            echo "<li><a href='/file.html?category={$i}'>{$category}</a></li>";
                        }
              ?>
                </ul>
              </li>
              <li class="dropdown">
              <a href="http://bbs.utoconsult.com" >交流平台</a>
              </li>  
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>








