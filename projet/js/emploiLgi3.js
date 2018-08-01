$(function () {
    $("#selectCours").change(function(event) {
        var $val = $(this).val();
        $.ajax({
          url: 'getterLgi3.php',
          type: 'GET',

              data:{type:"getProf",idCours:$val}
        })
        .done(function(data) {
            $("#selectProf").html(data);
        });
    $("#selectSalle").change(function(event) {
      var $val = $(this).val();
      $.ajax({
        url: 'getterLgi3.php',
        type: 'GET',

            data:{type:"getProf",idSalle:$val}
      })
      .done(function (data) {
          $("#tableContent").html(data);
      })
    });
    });
})
