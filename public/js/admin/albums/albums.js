const modal = (idModal,header,data,footer, size = 'modal-md') => {
    $('body').append(globalAppModal({
        id: idModal,
        size: size,
        close: '',
        classHeader: 'bg-light',
        header: header,
        content: data,
        footer: footer
    }));
};

const tryIt = () => {
    Swal.fire({
        title: 'Intentalo de nuevo.',
        showClass: {
            popup: 'animated fadeInDown faster'
        },
        hideClass: {
            popup: 'animated fadeOutUp faster'
        }
    })
};

const validate = (idForm) => {
    $('div form').destroy();
    let textValidate = 'Por favor diligencie este campo';
      $(idForm).validate({
          rules: {
              title: 'required',
              description: 'required',
          },
          messages: {
              title: textValidate,
              description: textValidate,
          },
          errorPlacement: function (error, element) {
              error.appendTo(element.parent());
          }
      });
};

$(document).ready(() => {

    $('#btn-add-album').on('click', () => {
        let data = new FormData();
        data.append('action', 'create');
        asyncPost({
            url: '/user/my-album/loadForm',
            formData : data,
            type: 'text'
        }).then( data =>
            {
                modal('newAlbumsModal', 'Crear un album', data, `<button type="submit" form="newAlbumForm" class="btn btn-success" id="btn-new-album">Crear</button>`);
                $('#newAlbumsModal').modal('show');
                // validate('newAlbumForm');
            }
        );
    });

    $('.btn-edit-album').on('click', (e) => {
        let data = new FormData();
        let id = $(e.target).attr('idAlbum');
        if(isNaN(id)){
            tryIt();
        }else{
            data.append('action', 'update');
            data.append('id', id);
            asyncPost({
                url: '/user/my-album/loadForm',
                formData : data,
                type: 'text'
            }).then( data =>
                {
                    modal('editAlbumsModal', 'Editar un album', data, `<button type="submit" form="editAlbumForm" class="btn btn-success" id="btn-edit-album">Actualizar</button>`);
                    $('#editAlbumsModal').modal('show');
                    // validate('editAlbumForm');
                }
            );
        }
    });

    $('.btn-delete-album').on('click', (e) => {
        e.preventDefault();
        let id = $(e.target).attr('idAlbum');
        if(isNaN(id)){
            tryIt();
        }else{
            Swal.fire({
                title: 'Estas seguro?',
                text: "Lo que quieres no tiene marcha atras y se borraran todas las fotos asociadas a este album!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Eliminado!',
                        'Tu album ha sido eliminado.',
                        'success'
                    );
                    $(e.target).parent().submit();
                }
            })
        }
    });

    $('.btn-is-visible').on('click', (e) => {
        let id = $(e.target).attr('idAlbum');
        let isVisible = $(e.target).attr('isVisible');
        if(isNaN(id)){
            tryIt();
        }else{
            Swal.fire({
                title: 'Cambiar estado de visibilidad del album?',
                text: isVisible == 1 ? "Este album ya no sera visible para los demas" : "Este album sera visible para los demas",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cambiarlo!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Cambiado con exito!',
                        'Tu album cambio su estado de visible para los demas.',
                        'success'
                    );
                    let data = new FormData();
                    let status;
                    isVisible == 1 ? status = 0 : status = 1;
                    data.append('id', id);
                    data.append('status', status);

                    asyncPost({
                        url: 'user/album/changeIsVisible',
                        formData : data,
                        type: 'text'
                    }).then((data) => {
                        if(data){
                            location.reload();
                        }
                    });
                }
            })
        }
    });

});
