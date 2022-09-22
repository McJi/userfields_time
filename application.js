$('#send_install').on("submit", function() {
    let key = $('#key').val();
    
    let domain = $('#domain').val();
    
    $.ajax({
        type: "POST",
        url: "https://server.21vek.it/calculate/create_bd.php",
        data: {key: key, domain: domain},
        success: function(data) {
            console.log(data);
			BX24.installFinish();

        }
    });
});