// =========================================================================================
//     File Name: invoice.js
//     Description: Invoice print js
//     --------------------------------------------------------------------------------------
//     Author URL: https://kodatik.com
//

// ==========================================================================================

$(document).ready(function () {
  // print invoice with button
  $(".btn-print").click(function () {
    window.print();
  });
});
