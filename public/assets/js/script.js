$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })

 function onGeneratePDF() {

  let paddress = $('#paddress').val();
  let price = $('#price').val();

  console.log('generating pdf for ... : ', paddress,price);
  swal.fire({
    text:"generating pdf..",
    allowOutsideClick: false,
    showCloseButton: false,
    allowEscapeKey: false,
    didOpen: ()=> {
        swal.showLoading();
    }				
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var formData = new FormData();
  formData.append('paddress', paddress);
  formData.append('price', price);

  $.ajax({
      url:"/generatePdf",
      type: 'post',
      contentType: false,
      processData: false,
      dataType: 'json',
      cache: false,
      enctype: 'multipart/form-data',
      data: formData,
      success:function(xhr, res){	
          swal.close();
          // swal.fire(
          //     {
          //     text:"Generating Pdf..",
          //     icon:"success",
          //     buttonsStyling:!1,
          //     showConfirmButton: false,
          //     customClass:{confirmButton:"btn btn-light-primary"}
          // });
          


      },
      error:function(xhr, res){
          console.log('error...', xhr);
              swal.close();
              swal.fire(
                  {
                  text:"Oops, something wrong.",
                  icon:"error",
                  buttonsStyling:!1,
                  confirmButtonText:"Ok, got it!",
                  customClass:{confirmButton:"btn btn-light-primary"}
              });
          
      }
  });

 }

 

 function openAddModal(){
  console.log('open modal..');
  // addSalesPersonModal
  $('#addSalesPersonModal').modal('show');

  //init row array


 }

 function addSalesPersonRow(){
    console.log('trigger add row..');

    //append array on row per click

 }

 function deleteSalesPersonRow(){
    console.log('trigger delete row..');

    //append array on row per click

 }

 function onReset(){
    console.log('reset all field..');
 }