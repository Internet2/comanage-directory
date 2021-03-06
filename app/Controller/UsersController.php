<?php
/**
 * COmanage Directory Users Controller
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

class UsersController extends AppController {
  public $name = 'Users';

  public $components = array(
    'Auth' => array(
      'authenticate' => array(
        'RemoteUser'
      )
    ),
    'RequestHandler',
    'Session'
  );
  
  /**
   * Login a user
   * - precondition: User has been authenticated
   * - precondition: Session updated with User information
   * - postcondition: User logged in via Auth component
   * - postcondition: Redirect to / issued
   *
   * @since  COmanage Directory v0.1
   * @throws RuntimeException
   * @return void
   */
  
  public function login() {
    if($this->Auth->login()) {
      $this->redirect("/");
    } else {
      throw new RuntimeException("Failed to invoke Auth component login");
    }
  }
  
  /**
   * Logout a user
   * - precondition: User has been logged in
   * - postcondition: Curret session auth information is deleted
   * - postcondition: Redirect to / issued
   *
   * @since  COmanage Directory v0.1
   * @return void
   */
  
  public function logout() {
    $this->Session->delete('Auth.User');
    // XXX should redirect to /auth/logout/index.php to trip external logout
    $this->redirect("/");
  }
}
