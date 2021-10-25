$(document).ready(function () {
    console.log("loaded")

    $("#add_more").click(function () {
        var i = 1;
        console.log("clicked");
        $('#upload_container').append('<div class="row mt-2"><div class="col-md-12"><label" for="file' + i + '"></label > <input type="file" name="files[]"></div></div>');
        i++;
    });
});


