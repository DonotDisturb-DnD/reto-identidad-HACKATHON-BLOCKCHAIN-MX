$(document).ready(function() {

// --------------- LOGIN -----------------
    $("#fooLogin").submit(function(e) {
        e.preventDefault();

        var datos = $("#fooLogin").serialize();

        console.log(datos);

        $.ajax({
            url:"./funciones/hmac.php",
            type: "post",
            data:datos,
            success:function(res){
                var datos = JSON.parse(res);
                console.log(datos);
                if (datos) {
                    //---------------- kairos ------------
                    //once authentication
                    var kairos = new Kairos("2bedf017", "b5502fc22ea2fad67f5924b4f9c54ccf");
                }
            }//end success
        });//end ajax
        $('#fooLogin')[0].reset();//reinicia los campos
    });//end Login

    // window.location = "./admin/editar.php";


// ----------------- REGISTER ----------------
    $("contact_form").submit(function(e) {
        e.preventDefault();

        var data = new FormData (this);

        $.ajax({
            url:"./funciones/upload_img.php",
            type:"post",
            data:data,
            success:function(res){
                console.log(res);
            }//end success
        });//end ajax
        $('#contact_form')[0].reset();//reinicia los campos
    });//en register



});
