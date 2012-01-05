<?php
/**
 * COmanage Directory People Controller
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

class PeopleController extends AppController {
  public $name = 'People';

  public $components = array(
    'RequestHandler',
    'Session'
  );
  
  /**
   * Callback before action is invoked
   *
   * @since  COmanage Directory 0.1
   * @todo   Implement useful functionality
   * @return void
   */
  
  public function beforeFilter() {
    // Placeholder for doing something useful
    
    if($this->Session->check('Auth.User')) {
      print "(Authenticated Mode)";
    }
  }
  
  /**
   * Perform a limited search for a person, intended for autocomplete
   * (search while typing)
   * - precondition: $this->request->query['term'] populated
   * - postcondition: $matches populated with entries retrieved
   *
   * @since  COmanage Directory 0.1
   * @return void
   */
  
  public function complete() {
    $q = "";
    
    if(!empty($this->request->query['term'])) {
      $q = $this->request->query['term'];
    }
    
    if($q != "") {
      $ldap = ldap_connect(Configure::read('Ldap.host'));
      
      if($ldap) {
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, Configure::read('Ldap.protocol'));
       
        if(ldap_bind($ldap)) {
          $result = ldap_search($ldap,
                                Configure::read('Ldap.searchbase'),
                                "(&(objectclass=". Configure::read('Ldap.objectclass') .")(cn=*" . $q . "*))",
                                array('cn'));
          
          $entries = ldap_get_entries($ldap, $result);
          
          $this->set('matches', $entries);
          
          ldap_unbind($ldap);
        } else {
          // XXX throw an error?
          $this->Session->setFlash("Could not find directory server", '', array(), 'error');
        }
      }
    }
  }
  
  /**
   * Perform a search for a person
   * - postcondition: $people populated with entries retrieved
   * - postcondition: Flash message set on error
   *
   * @since  COmanage Directory 0.1
   * @param  string Terms to search for
   * @return void
   */
  
  public function search($query) {
    $ldap = ldap_connect(Configure::read('Ldap.host'));
    
    if($ldap) {
      ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, Configure::read('Ldap.protocol'));
     
      if(ldap_bind($ldap)) {
        $result = ldap_search($ldap,
                              Configure::read('Ldap.searchbase'),
                              "(&(objectclass=". Configure::read('Ldap.objectclass') .")(cn=*" . $query . "*))");
        
        $entries = ldap_get_entries($ldap, $result);
        
        $this->set('people', $entries);
        
        ldap_unbind($ldap);
      } else {
        $this->Session->setFlash("Could not find directory server", '', array(), 'error');
      }
    }
  }
}
