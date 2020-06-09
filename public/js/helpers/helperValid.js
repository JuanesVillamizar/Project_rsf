const validEmpty = (nameForm) => {
    $('#' + nameForm).on('submit', (e) => {
        let isValid = true;
        $('#' + nameForm + ' input').map((index, element) => {
            if($(element).val() === ''){
                esValido = false
            }
        });
        if(!isValid){
            e.preventDefault();
            $('#message-error').removeClass('d-none');
        }
    });
};
