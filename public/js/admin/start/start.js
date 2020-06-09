const getListSearch = (data) => {
    data.map((element) => {
        // console.log(element)
        document.getElementById('findPhotos').innerHTML +=  elementThisList(element);
    });
};

const elementThisList = (element) => {
      return `
        <div class="col-12 list-photos-search py-2">
            <a href="/my-photos/${element.albums_photos[0].id}" class="elementSearch">
                ${element.title}
            </a>
        </div>
      `;
};

$(document).ready( () => {
    $('.like').on('click', (e) => {
        let id = $(e.target).attr('idSet');
        let data = new FormData();
        data.append('id', id);
        asyncPost({
            url: '/user/like',
            formData : data,
            type: 'text'
        }).then( (data) => {
            if(data){
                let like = document.querySelector('.elementNumber'+id);
                like.innerHTML = parseInt(like.innerHTML) + 1;
                e.target.classList.remove('far');
                e.target.classList.add('fas');
            }
        });
    });

    $('#search').on('keyup ', (e) => {
        // console.log(e.target.value);
        let searchTitle = e.target.value;
        if(searchTitle === ''){
            $('#findPhotos').empty();
        }
        asyncGet('/getPhotoForTitle/' + searchTitle).
        then( (data) => {
            // console.log(data);
            $('#findPhotos').empty();
            getListSearch(data);
        });
    });
});
