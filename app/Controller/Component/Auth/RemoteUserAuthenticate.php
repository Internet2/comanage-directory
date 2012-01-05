<?php
/**
 * COmanage Directory Remote User Authentication
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

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class RemoteUserAuthenticate extends BaseAuthenticate {
  /**
   * Authenticate a user via $REMOTE_USER
   * - precondition: User has been authenticated via web server and $REMOTE_USER is populated
   *
   * @since  COmanage Directory v0.1
   * @param  CakeRequest Request information
   * @param  CakeResponse Response structure
   * @return array Array of authenticated user information
   */
  
  public function authenticate(CakeRequest $request, CakeResponse $response) {
    $u = env('REMOTE_USER');
    $u = "plee";
    
    if(empty($u)) {
      return false;
    }
    
    $ret['username'] = $u;
    
    return($ret);
  }
}