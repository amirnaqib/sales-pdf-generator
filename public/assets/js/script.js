$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })

 let tablearray = [];

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

 var i=0;
 function addSalesPersonRow(){
    console.log('trigger add row..');
    //to track how many row & id 
    console.log('current index is >>> ', ++i);

    //append array on row per click
    $('#fieldcontainer').append(
        '<div class="row" id="container_'+ i +'">'+
                '<div class="col-7">'+
                    '<div class="form-group">'+
                        '<label>Salesperson :</label>'+
                        '<input type="text" class="form-control item" id="salesperson_'+ i +'" placeholder="enter salesperson name">'+
                    '</div>'+
                '</div>'+
                '<div class="col-3">'+
                  '<div class="form-group">'+
                    '<label>Percentage(%) :</label>'+
                    '<input type="text" class="form-control item" id="percentage_'+ i +'" placeholder="enter percentage">'+
                '</div>'+
                '</div>'+
                '<div class="col-2">'+
                  '<label>&nbsp;</label><br>'+
                  '<button type="button" class="btn btn-danger" onclick="deleteSalesPersonRow('+ i +')">-</button>'+
                '</div>'+
              '</div>'
    );

 }

 function deleteSalesPersonRow(id){
    console.log('trigger delete row number .. ', id);
    //append array on row per click
    $('#container_'+id).empty();
 }

 function onApply(){
    console.log('>>> ', i);
    //trigger add salesperson
    for (let index = 0; index <= i; index++) {
        console.log('checking value >>>> .. ', $('#salesperson_'+index).val());
        console.log('checking value >>>> .. ', $('#percentage_'+index).val());

    }
 }

 function onReset(){
    console.log('reset all field..');
 }

 function closeModal(){
    console.log('close modal ...');
    $('#addSalesPersonModal').modal('hide');

 }