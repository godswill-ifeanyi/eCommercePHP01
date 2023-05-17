$(document).ready(function () {
    
    $('.delete_product_btn').click(function(e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover it",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "script.php",
                data: {
                'product_id': id,
                'delete_product_btn': true
                },
                success: function (response) {

                    if (response == 200) {
                        swal("Success!", "Product Delete is Successful!", "success");
                        window.location.reload();
                    } else if (response == 500) {
                        swal("Error!", "SQL Error!", "error");
                    }
                }
              });
            }
          });
    })

})