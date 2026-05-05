$("#password").keyup(function(){

    let pass = $(this).val();

    if(pass.length < 6){
        $("#msg").text("Password must be at least 6 characters");
    }else{
        $("#msg").text("");
    }
/// Password validation
$("#password").keyup(function(){

let pass = $(this).val();

if(pass.length < 6){
$("#msg").text("Password must be at least 6 characters");
}else{
$("#msg").text("");
}

});

// Ajax Ticket Submit
$("#ticketForm").submit(function(e){

e.preventDefault();

$.ajax({
url:"submit_ticket.php",
type:"POST",
data:$(this).serialize(),

success:function(response){

if(response=="success"){
$("#popup").fadeIn();
$("#ticketForm")[0].reset();
}

}

});

});

// Close popup
$(document).on("click","#closePopup",function(){
$("#popup").fadeOut();
});
});
// Password validation
$("#password").keyup(function(){

    let pass = $(this).val();

    if(pass.length < 6){
        $("#msg").text("Password must be at least 6 characters");
    }else{
        $("#msg").text("");
    }

});

// Ajax Ticket Submit
$("#ticketForm").submit(function(e){

    e.preventDefault();

    $.ajax({
        url:"submit_ticket.php",
        type:"POST",
        data:$(this).serialize(),

        success:function(response){
            $("#response").html(response);
            $("#ticketForm")[0].reset();
        }

    });

});
