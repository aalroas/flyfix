/*=========================================================================================
	File Name: account-setting.js
	Description: Account setting.
	----------------------------------------------------------------------------------------
	Item name: Kodatik CPanel

	Author URL: https://kodatik.com
==========================================================================================*/

$(document).ready(function () {
  // language select
  var languageselect = $("#languageselect2").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
  // music select
  var musicselect = $("#musicselect2").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
  // movies select
  var moviesselect = $("#moviesselect2").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
  // birthdate date
  $('.birthdate-picker').pickadate({
    format: 'mmmm, d, yyyy'
  });
});
