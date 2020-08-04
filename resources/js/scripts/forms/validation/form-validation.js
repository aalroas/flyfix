/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootsreap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Kodatik CPanel

  Author URL: https://kodatik.com
==========================================================================================*/

(function(window, document, $) {
  'use strict';

  // Input, Select, Textarea validations except submit button
  $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

})(window, document, jQuery);
