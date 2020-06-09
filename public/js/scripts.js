$(document).ready(() => {
    $('.avatars').on('click', (e) => {
        // console.log(e.target.parentNode.firstChild);
        $(e.target.parentNode.firstChild).attr('check', true);
        $('.container-avatars img').removeClass('selected-border');
        e.target.classList.add('selected-border');
        $('#avatar').val($(e.target.parentNode.firstChild).val());
        // console.log($(e.target)[0]);
    });
});
