$(document).ready(() => {
    $('.fa-comment').on('click', (e) => {
        let idSet = $(e.target).attr('idSet');
        if(!isNaN(idSet)){
            let formData = new FormData();
            formData.append('idSet', idSet);
            asyncPost({
                url: '/getAllCommentsToPhoto',
                formData : formData,
            }).then( data => {
                data.map( (element) => {
                    $('#comments').append(`
                        <div class="col-12 p-0 m-0">
                            <div class="row my-1 mx-1 mx-md-3" style="border: 1px solid #f0f0f0">
                                <div class="col-12 bg-white">
                                    <div class="row py-2 pl-3">
                                        <span class="pr-2">
                                            ${element.user.nickName}
                                        </span>
                                        <span>
                                            <img src="http://rsf.test/storage/avatars/${element.user.avatar}.png" alt="img avatar" style="border-radius: 70px; width: 25px">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 description">
                                    <p class="text-muted py-1">
                                        ${element.comment}
                                    </p>
                                </div>
                            </div>
                        </div>
                    `);
                });
            });
        }
    });
});
