<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  
  <title><?php echo $this->Lang->write('app_browser_title');?></title>

  <!-- CORE CSS-->
  <link href="<?php print $this->TemplatePath; ?>min/css/app.min.css" type="text/css" rel="stylesheet" media="screen,projection">

<script>
	var defaultmsg = {
		"confirm_headline": {
			"msg": "<?php echo $this->Lang->write('modal_confirmation_headline');?>"
		},
		"confirm_paragraph": {
			"msg": "<?php echo $this->Lang->write('modal_confirmation_paragraph');?>"
		}
	};

	<?php if(isset(CONFIG['pusher']) && isset(CONFIG['pusher']['key']) && !empty(CONFIG['pusher']['key'])) { ?>
	pappkey  = '<?php echo CONFIG['pusher']['key'];?>';
	chanchan = '<?php echo CONFIG['pusher']['mainchannel'];?>';
	cluster  = '<?php echo CONFIG['pusher']['cluster'];?>';
	hash 	 = "<?php echo substr(md5($this->Session->getUserEmail()), 0, 12);?>";
	<?php if(isset($_GET['rootid'])) { ?>
		rooter = <?php echo (int)$_GET['rootid'];?>;
	<?php }?>
	<?php } ?>
</script>

	<script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/top.js"></script>  
	<?php $this->getStyles(); ?>
  <?php $this->getScripts(); ?>
  
  <?php $this->addModuleLanguageFromTemplate(array('account'));?>
  
  <?php if(isset($this->tplVar['thislang']) && !empty($this->tplVar['thislang'])) { ?>
  	<script>var thislang = '<?php echo $this->tplVar['thislang'];?>';</script>
  <?php } ?>
  
</head>

<body>

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li>
                      	<h1 class="logo-wrapper">
                      		<a href="/dashboard/index/index/" class="brand-logo darken-1">
                      			<span class="page-h1">Database Admin</span>
                      		</a> 
                      	
                      	</h1>
                      	</li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                    </div>
                    
                    <ul class="right hide-on-med-and-down">
                        
                        <li>
    
                        	<a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                        		<img src="<?php print $this->TemplatePath; ?>images/flag-icons/<?php echo $this->tplVar['thislang'];?>.png" alt="<?php echo $this->tplVar['thislang'];?>" />
                        	</a>
                        	
                        </li>
                        
                    </ul>
                    <!-- translation-button -->
                    <ul id="translation-dropdown" class="dropdown-content">
                    	
                    	<?php if(isset(CONFIG['langwhitelist']) && is_array(CONFIG['langwhitelist']) && count(CONFIG['langwhitelist'])) { ?>
                    	
                    		<?php foreach(CONFIG['langwhitelist'] AS $key => $value) { ?>
                    			
								<li>
									<a href="/account/index/changelang/lang/<?php echo strtolower($key);?>/">
										<img src="<?php print $this->TemplatePath; ?>images/flag-icons/<?php echo strtolower($key);?>.png" alt="<?php echo strtolower($key);?>" />  
										<span class="language-select"></span>
									</a>
								</li>
                    		
                    		<?php } ?>
                    			
                    	<?php } ?>
                      
                    </ul>

                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->


  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
      
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details light-blue darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                	
                	<?php echo $this->renderAvatar();?>
                   
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="/account/profile/index/"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a href="/account/settings/index/"><i class="mdi-action-settings"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/account/index/logout/"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                    	<?php echo $this->CurrentUser['username'];?> <i class="mdi-navigation-arrow-drop-down right"></i>
                    </a>
                    <p class="user-roal"></p>
                </div>
            </div>
            
            </li>
            
            
            <li>
				<a class="waves-effect waves-light-blue" href="/dashboard/index/index/"><i class="mdi-action-dashboard"></i> <?php echo $this->Lang->write('app_main_navigation_dashboard_module');?></a>
			</li>
			
			<li>
				<a class="waves-effect waves-light-blue" href="/dashboard/forum/index/"><i class="mdi-communication-chat"></i> <?php echo $this->Lang->write('app_main_navigation_forum_module');?></a>
			</li>
            
            <li>
				<a class="waves-effect waves-light-blue" href="/directory/index/index/"><i class="mdi-action-view-module"></i> <?php echo $this->Lang->write('app_main_navigation_directory_module');?></a>
			</li>
			
			<li>
				<a class="waves-effect waves-light-blue" href="/content/scenes/index/"><i class="mdi-action-view-list"></i> <?php echo $this->Lang->write('app_main_navigation_constent_module_scene');?></a>
			</li>
			
            <li>
				<a class="waves-effect waves-light-blue" href="/account/user/index/"><i class="mdi-social-people"></i> <?php echo $this->Lang->write('app_main_navigation_account_module');?></a>
			</li>
            
<!--             <li class="no-padding"> -->
<!--                 <ul class="collapsible collapsible-accordion"> -->
<!--                     <li class="bold"> -->
<!--                     	<a class="collapsible-header waves-effect waves-cyan"> 
                    		<i class="mdi-social-people"></i> <?php //echo $this->Lang->write('app_main_navigation_accounts_account_module');?>
<!--                     	</a> -->
                        
<!--                         <div class="collapsible-body"> -->
<!--                             <ul> -->
<!--                                 <li> -->
<!-- 									<a class="waves-effect waves-cyan" href="/account/user/index/"> 
										<i class="mdi-social-group"></i> <?php //echo $this->Lang->write('app_main_navigation_accounts_user');?>
<!-- 									</a> -->
<!-- 								</li> -->
<!-- 								<li> -->
<!-- 									<a class="waves-effect waves-cyan" href="/account/group/index/"> 
										<i class="mdi-action-lock"></i> <?php //echo $this->Lang->write('app_main_navigation_accounts_groups');?>
<!-- 									</a> -->
<!-- 								</li> -->
                                
<!--                             </ul> -->
<!--                         </div> -->
                        
<!--                     </li> -->
                    
<!--                 </ul> -->
<!--             </li> -->
            
            <li>
				<a class="waves-effect waves-light-blue" href="/account/index/logout/"><i class="mdi-action-exit-to-app "></i> <?php echo $this->Lang->write('app_main_navigation_accounts_logout');?></a>
			</li>
            
            
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        
			<?php $this->renderErrors();?>
			<?php $this->renderSuccess();?>
			<?php $this->renderModule();?>
            
      </section>
      <!-- END CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START RIGHT SIDEBAR NAV-->
      <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
            <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
            <div id="right-search" class="row">
                <form class="col s12">
                    <div class="input-field">
                        <i class="mdi-action-search prefix"></i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Search</label>
                    </div>
                </form>
            </div>
            </li>
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                    <div class="collapsible-body recent-activity">
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">just now</a>
                                <p>Jim Doe Purchased new equipments for zonal office.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Yesterday</a>
                                <p>Your Next flight for USA will be on 15th August 2015.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Last Week</a>
                                <p>Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                    <div class="collapsible-body sales-repoart">
                        <div class="sales-repoart-list  chat-out-list row">
                            <div class="col s8">Target Salse</div>
                            <div class="col s4"><span id="sales-line-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Payment Due</div>
                            <div class="col s4"><span id="sales-bar-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Delivery</div>
                            <div class="col s4"><span id="sales-line-2"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Progress</div>
                            <div class="col s4"><span id="sales-bar-2"></span>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </li>
        </ul>
      </aside>
      <!-- LEFT RIGHT SIDEBAR NAV-->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->


<div id="confirmation-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4></h4>
      <p></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat agree">Yes</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat disagree">No</a>
    </div>
  </div>
  
<div id="blank-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>

  </div>  
  
  <div class="lean-overlay" id="blanko-overlay"></div>


  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
<!--   <footer class="page-footer"> -->
<!--     <div class="footer-copyright"> -->
<!--       <div class="container"> -->


<!--         </div> -->
<!--     </div> -->
<!--   </footer> -->
  <!-- END FOOTER -->



    <script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/bottom.js"></script>
    <script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/modules.js"></script>  
    
    
</body>

</html>