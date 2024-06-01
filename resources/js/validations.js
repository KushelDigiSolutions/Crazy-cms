$(document).ready(function() {
    $('#website').on('input', function() {
        var url = $(this).val();
        var regex = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;

        if (regex.test(url)) {
            $('#validation-message').text('Valid URL').css('color', 'green');
        } else {
            $('#validation-message').text('Invalid URL').css('color', 'red');
        }
    });
});
