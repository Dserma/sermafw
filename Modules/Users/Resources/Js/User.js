$(document).ready(function() {
    
    $('#load').on('click', function(){

        $.ajax({
            url:  $('#load').attr('data-space')+'/Ajax/loadUsers.php',
            success: function(data) {
              $('#bodyUsers').html(data); 
            },
            beforeSend: function(){
              $('#mymodal').modal();
            },
            complete: function(){
              $('#mymodal').modal('hide');
            }
        });
        
    });
    
});
