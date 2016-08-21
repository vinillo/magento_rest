$(document).ready(function () {
    var modelAlert = Cookies.get('model');
if (typeof modelAlert === "undefined"){
        swal({
            title: "Almost there!",
            text: "You made it! You can now view magento orders and manage them easily!",
            type: "success",
            timer: 6000
        })
}
    Cookies.set("model", "set", { expires: 30 });

    $('.track').on('click',function () {

        var trackClick  = $(this);
        swal({
                title: "Track & Trace Number",
                text: "Add a new tracking number:" +
                "<br><br> <select id='carrier-list'>" +
                "<option selected value='1'>DHL</option> " +
                "<option value='2'>Federal Express</option> " +
                "<option value='3'>United Parcel Service</option> " +
                "<option value='4'>United States Postal Service</option> " +
                "</select>",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "#tracking code",
                html: true
            },
            function(inputValue){
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write at least one tracking #!");
                    return false
                }
                //ajax request
                var carrier_title = $('#carrier-list option:selected').text();
                    $.ajax({
                        'url':  '/api/add/tracking/',
                        'type': 'POST',
                        'data': {

                            'entity': $(trackClick).data('id'),
                            'carrier': $('#carrier-list').val(),
                            'tracking': inputValue,
                            '_token': $('#csrf_token').data('id'),
                        },
                        'success': function (data) {
                            $('.remove-track').remove();
                            $('.add-track:last').after('<hr><ul class="list-group-item-text add-track"><li><b>Track & Trace code</b> <a href="#"><span class="label uppercase label-success">#'+ inputValue +'</span></a></li><li><b>Carrier Title</b> '+  carrier_title +'</li><li><b>Created at</b> '+ new Date().toLocaleString() +'</li></ul>');
                        }
                    });

                //ajax
                swal("Great!", "You added a new tracking #", "success");
            });;
    })
});