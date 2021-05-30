function FetchSport(id) {
  $('#sport').html('');
  $('#hall').html('<option>Выберите вариант ответа</option>');

  $.ajax({
    type: 'POST',
    url: 'ajax/a_profile.php',
    data: {state_id: id},
    success: function(data) {
      $('#sport').html(data);
    }
  })
}


function FetchHall(id) {
  $('#hall').html('');
  $.ajax ({
    type: 'post',
    url: 'ajax/a_profile.php',
    data: {sport_id : id},
    success: function(data) {
      $('#hall').html(data);
    }
  }
)
}
