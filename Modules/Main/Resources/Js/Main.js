$(document).ready(function() {
    
   var input = $("#inputFile");
    
   input.fileinput({
    
        uploadUrl: $('#inputFile').attr('data-space')+"/Ajax/upload.php",
        uploadAsync: true,
        maxFileCount: 5,
        uploadExtraData: {module: $('#inputFile').attr('data-space')},
        showPreview:  true
    
    });
    
    input.on('filebatchuploadcomplete', function(event, files, extra) {
    
            alert('File(s) uploaded!');
            window.location.reload();
            
    
    });
    
});
