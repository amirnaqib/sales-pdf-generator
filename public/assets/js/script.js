$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })

 function onGeneratePDF() {

  let paddress = $('#paddress').val();
  let price = $('#price').val();

  console.log('generating pdf for ... : ', paddress,price);

 }

 function onAddSalesPerson(){
  console.log('open modal..');
  // addSalesPersonModal
  // $('#addSalesPersonModal').modal('show');

 }