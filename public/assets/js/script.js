$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');

  generateTableData();

 })

 $(function() {
    $('#price').maskMoney();
  })

 function onGeneratePDF() {

  let paddress = $('#paddress').val();
  let price = $('#price').val();

  $('#iframeid').attr('src', 'http://127.0.0.1:8000/getPdf?paddress='+paddress+'&salesperson='+JSON.stringify(tableArray)+'&price='+price);
 }

 function onClickAddBtn(){
    if($('#paddress').val() != '' && $('#price').val() != ''){
        openAddModal();
        $('#formalert').hide();

    } else {
        $('#formalert').show();

    }
 }

 function onClickApply(){
    for (let i = 0; i <= salespersonrow; i++) {
        if($('#salesperson_'+i).val() != '' && $('#percentage_'+i).val() != ''){
            onApply();
            $('#modalformalert').hide();

        } else {
            $('#modalformalert').show();

        }
    }
 }
 

 function openAddModal(){
  console.log('open modal..');
  // addSalesPersonModal
  $('#addSalesPersonModal').modal('show');
  //init row array


 }

 var salespersonrow=0;
 function addSalesPersonRow(){
    console.log('trigger add row..');
    //to track how many row & id 
    console.log('current index is >>> ', ++salespersonrow);

    //append array on row per click
    $('#fieldcontainer').append(
        '<div class="row" id="container_'+ salespersonrow +'">'+
                '<div class="col-7">'+
                    '<div class="form-group">'+
                        '<label>Salesperson :</label>'+
                        '<input type="text" class="form-control item" id="salesperson_'+ salespersonrow +'" placeholder="enter salesperson name">'+
                    '</div>'+
                '</div>'+
                '<div class="col-3">'+
                  '<div class="form-group">'+
                    '<label>Percentage(%) :</label>'+
                    '<input type="text" class="form-control item" id="percentage_'+ salespersonrow +'" placeholder="enter percentage">'+
                '</div>'+
                '</div>'+
                '<div class="col-2">'+
                  '<label>&nbsp;</label><br>'+
                  '<button type="button" class="btn btn-danger" onclick="deleteSalesPersonRow('+ salespersonrow +')">-</button>'+
                '</div>'+
              '</div>'
    );

 }

 function deleteSalesPersonRow(id){
    console.log('trigger delete row number .. ', id);
    //append array on row per click
    $('#container_'+id).empty();
 }

//calculation for percent
 function percentCalculation(percentage){
    var saleprice = $('#price').val();
    console.log('testing check >>>> ', saleprice);

    const sanitizedString = saleprice.replace(/,/g, '');
    const value = parseFloat(sanitizedString);
    const result = value * (percentage / 100);
    return result.toFixed(2);
 }

 function onApply(){
    $('#tableData').empty();



    //trigger add salesperson
    for (let index = 0; index <= salespersonrow; index++) {
        console.log('checking salesperson >>>> .. ', $('#salesperson_'+index).val());
        console.log('checking percentage >>>> .. ', $('#percentage_'+index).val());
        console.log('checking commission >>>> .. ', percentCalculation($('#percentage_'+index).val()));

        tableArray.push(
            {
                salesperson: $('#salesperson_'+index).val(),
                percentage: $('#percentage_'+index).val(),
                commission: percentCalculation($('#percentage_'+index).val())
            }
        );

    }
    $('#addSalesPersonModal').modal('hide');
    generateTableData();

 }

 function onReset(){
    console.log('reset all field..');
    $('#tableData').empty();
    tableArray.length = 0;
    generateTableData();

    $('#paddress').val('');
    $('#price').val('');
    $('#iframeid').attr('src', '');


 }

 function closeModal(){
    console.log('close modal ...');
    $('#addSalesPersonModal').modal('hide');

 }

 var tableArray = [];

 function generateTableData() {
    console.log('generating table data...');
     //to make a condition if the salesperson list is empty
    if(tableArray.length <= 0){
        $('#generateBtn').attr('disabled','disabled');
        $('#warningalert').show();
        
    } else {
        $('#generateBtn').removeAttr('disabled');
        $('#warningalert').hide();


    }


    $('#tableData').empty()
    for (let index = 0; index <= tableArray.length; index++) {
        if(tableArray.length > 0){
            $('#tableData').append(
                '<tr>'+
                '<th scope="row">'+ (index+1) +'</th>'+
                '<td>'+ tableArray[index].salesperson +'</td>'+
                '<td>'+ tableArray[index].percentage +'</td>'+
                '<td>'+ tableArray[index].commission +'</td>'+
                '<td>'+
                '<button type="button" class="btn btn-danger" onclick="deleteSalesperson('+index+')">-</button>'+
                '</td>'+
                '</tr>'
            );
        } else {
            $('#tableData').append(
                '<tr><td colspan=5>no record available</td></tr>'
            )
        }
        
    }
 }

 function deleteSalesperson(id){
    console.log('delete this.. ', id);
    tableArray.splice(id, 1)
    generateTableData();
 }

 