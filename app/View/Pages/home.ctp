<?php
/**
 * COmanage Directory Home Layout
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
<script>
$(function() {
        $( "#query" ).autocomplete({
                source: "/directory/people/complete.json"
        });
});

$(document).ready(function() {
  $("input#query").keyup(function(event) {
    if(event.which == 13) {
      // 13 is enter/return
      // Disable search button while search is running
      $("input:submit").attr("disabled", true);
      $.get(
        'people/search/' + document.getElementById('query').value,
        function(data) {
          $('div#results').html(data);
          $("input:submit").attr("disabled", false);
        }
      );
    }
  });
  
  // Make submit button pretty
  $("input:submit").button();
  
  // Execute search on submit
  $("input:submit").click(function() {
    $.get(
      'people/search/' + document.getElementById('query').value,
      function(data) {
        $('div#results').html(data);
      }
    );
  });
});
</script>

<div class="ui-widget">
  <input size=80 id="query" />
  <input value="Search" type="submit" id="search" />
</div>

<div style="height:20px">
</div>

<div id="results">
</div>