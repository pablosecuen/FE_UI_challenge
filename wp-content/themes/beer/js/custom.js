(function ($) {
  // Obtén el SKU code desde la URL
  var urlParams = new URLSearchParams(window.location.search);
  var productCode = urlParams.get("code");

  // Actualizar información cada 5 segundos
  setInterval(function () {
    $.ajax({
      url: "http://localhost/wordpress/wp-json/beer_ecommerce/v1/stock-price/" + productCode,
      type: "GET",
      success: function (data) {
        // Actualizar la información en tu página PDP
        if (!data.error) {
          $("#stock-info").text("Stock: " + data.stock);
          $("#price-info").text("Price: $" + data.price);
        }
      },
      error: function () {
        console.log("Error al obtener la información de stock y precio");
      },
    });
  }, 5000); 
})(jQuery);
