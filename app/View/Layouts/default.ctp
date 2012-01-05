<?php
/**
 * COmanage Directory Default Layout
 *
 * Copyright (C) 2011-12 University Corporation for Advanced Internet Development, Inc.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software distributed under
 * the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 *
 * @copyright     Copyright (C) 2011-12 University Corporation for Advanced Internet Development, Inc.
 * @link          http://www.internet2.edu/comanage COmanage Project
 * @package       directory
 * @since         COmanage Directory v0.1
 * @license       Apache License, Version 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * @version       $Id$
 */

  // Don't cache pages (especially post-auth pages)
  header("Expires: Thursday, 10-Jan-69 00:00:00 GMT");
  header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
  header("Pragma: no-cache");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>COmanage Directory <?php print $title_for_layout ?></title>
    <!-- link rel="shortcut icon" href="favicon.ico" type="image/x-icon" -->
    
    <!-- Get jquery style sheet and code -->
    <?php print $this->Html->css('jquery/ui/css/custom-theme/jquery-ui-1.8.16.custom.css'); ?>
    <?php print $this->Html->script('jquery/ui/js/jquery-1.6.2.min.js'); ?>
    <?php print $this->Html->script('jquery/ui/js/jquery-ui-1.8.16.custom.min.js'); ?>
    
    <!-- Include external files and scripts -->
    <?php print $scripts_for_layout; ?>

    <script type="text/javascript">
    $(function() {
      $(".logoutbutton").button({
        icons: {
          primary: 'ui-icon-power'
        },
      });
    });
    </script>

  </head>

  <body>
    <div>
      <div style="float:left;width:80%">
        <?php
          print $this->Html->image('comanage-logo.jpg',
                                   array('alt'     => 'COmanage',
                                         'height'  => 42,
                                         'width'   => 227));
        ?>
        <font face="verdana">Directory</font>
      </div>
      <div style="float:right;width=20%">
        <?php
          if($this->Session->check('Auth.User')) {
            print $this->Html->link("Logout",
                                    "/auth/logout/index.php",
                                    array('class' => 'logoutbutton'));
          } else {
            print $this->Html->link("Login",
                                    "/auth/login/index.php",
                                    array('class' => 'logoutbutton'));
          }
        ?>
      </div>
      <div style="clear:both;border-bottom-width:2;border-bottom-style:ridge">
      </div>
    </div>
    
    <div style="padding-top:10px">
      <?php
        $f = $this->Session->flash('error');
        
        if($f && $f != ""): ?>
          <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
              <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                <?php print $f; ?>
              </p>
            </div>
          </div>
      <?php endif; ?>
      <!-- Display view content -->
      <?php print $content_for_layout; ?>
    </div>
  </body>
</html>