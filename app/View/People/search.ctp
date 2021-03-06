<?php
/**
 * COmanage Directory Search Layout
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
?>
<?php for($i = 0;$i < $people['count'];$i++): ?>
<div style="background-color:<?php print ($i % 2 == 0) ? "lightgray" : "white"; ?>">
  <span style="font-family:verdana;font-weight:bold">
    <?php if(isset($people[$i]['cn'][0])) print $people[$i]['cn'][0]; ?><br />
  </span>
  <span style="font-family:monospace">
    <?php if(isset($people[$i]['edupersonaffiliation'][0])) print $people[$i]['edupersonaffiliation'][0]; ?><br />
    <?php if(isset($people[$i]['mail'][0])) print $people[$i]['mail'][0]; ?><br />
    <?php if(isset($people[$i]['street'][0])) print $people[$i]['street'][0]; ?><br />
    <?php if(isset($people[$i]['l'][0])) print $people[$i]['l'][0]; ?><br />
    <?php if(isset($people[$i]['st'][0])) print $people[$i]['st'][0]; ?><br />
    <?php if(isset($people[$i]['telephonenumber'][0])) print $people[$i]['telephonenumber'][0]; ?><br />
  </span>
</div>
<?php endfor; ?>