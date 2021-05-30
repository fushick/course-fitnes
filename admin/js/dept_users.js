$(document).ready(function(){

$(".product_check").click(function(){
  var action = 'data';
  var label = get_filter_text('label');
  var price = get_filter_text('price');

  $.ajax ({
    url: 'action.php',
    method: 'POST',
    data: {action:action, label:label, price:price},
    success:function(response){
      $("#result").html(response);
    }
  });

});

function get_filter_text(text_id){
  var filterData = [];
  $('#'+text_id+':checked').each(function(){
    filterData.push($(this).val());
  });
  return filterData;
}

});
