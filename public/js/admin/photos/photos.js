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

$(document).ready( () => {

    $('#btn-add-photo').on('click', () => {
        let data = new FormData();
        data.append('action', 'create');
        asyncPost({
            url: '/user/my-photo/loadForm',
            formData : data,
            type: 'text'
        }).then( data =>
            {
                modal('newPhotoModal', 'Subir una foto', data, `<button type="submit" form="newPhotoForm" class="btn btn-success" id="btn-new-photo">Subir</button>`);
                $('#newPhotoModal').modal('show');
            }
        );
    });

    $('.btn-delete-album').on('click', (e) => {
        e.preventDefault();
        let id = $(e.target).attr('idPhoto');
        if(isNaN(id)){
            tryIt();
        }else{
            Swal.fire({
                title: 'Estas seguro?',
                text: "Lo que quieres no tiene marcha atras y se borrara la foto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarla!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Eliminada!',
                        'Tu foto ha sido eliminada.',
                        'success'
                    );
                    $(e.target).parent().submit();
                }
            })
        }
    });

    $('.btn-edit-photo').on('click', (e) => {
        let data = new FormData();
        let id = $(e.target).attr('idPhoto');
        if(isNaN(id)){
            tryIt();
        }else{
            data.append('action', 'update');
            data.append('id', id);
            asyncPost({
                url: '/user/my-photo/loadForm',
                formData : data,
                type: 'text'
            }).then( data =>
                {
                    modal('editPhotoModal', 'Editar una foto', data, `<button type="submit" form="editPhotoForm" class="btn btn-success" id="btn-edit-Photo">Actualizar</button>`);
                    $('#editPhotoModal').modal('show');
                }
            );
        }
    });

    $('.btn-is-visible').on('click', (e) => {
        let id = $(e.target).attr('idPhoto');
        let isVisible = $(e.target).attr('isVisible');
        if(isNaN(id)){
            tryIt();
        }else{
            Swal.fire({
                title: 'Cambiar estado de visibilidad del album?',
                text: isVisible == 1 ? "Esta foto ya no sera visible para los demas" : "Esta foto sera visible para los demas",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cambiarlo!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Cambiado con exito!',
                        'Tu foto cambio su estado de visible para los demas.',
                        'success'
                    );
                    let data = new FormData();
                    let status;
                    isVisible == 1 ? status = 0 : status = 1;
                    data.append('id', id);
                    data.append('status', status);
                    asyncPost({
                        url: 'user/photo/changeIsVisible',
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
