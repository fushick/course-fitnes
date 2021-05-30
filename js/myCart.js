function addToCart(id) {
  console.log('add' + id);
  $.ajax ({
    async: false,
    type: "POST",
    url: "../ajax/cart.php",
    dataType: "text",
    data: 'action=add&id=' + id,
    error: function () {
      alert("Не смог");
    },
    success: function(response) {
      alert('Добавили' + id);
    }
  }
);
}


function showMyCart() {
  console.log('show');
  $.ajax ({
    async: false,
    type: "POST",
    url: "../ajax/cart.php",
    dataType: "text",
    data: "action=show",
    error: function () {
      alert("Произошла ошибка при выводе тарифа");
    },
    success: function(response) {
      $('#cart-check').html(response);
    }
  }
);
}


function delFromCart(id) {
  console.log('del' + id);
  $.ajax ({
    async: false,
    type: "POST",
    url: "../ajax/cart.php",
    dataType: "text",
    data: 'action=del&id=' + id,
    error: function () {
      alert("Ошибка при удалении товара");
    },
    success: function(response) {
      showMyCart();
      console.log(response);
    }
  }
);
}
