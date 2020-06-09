let idElementSelected, orderElementSelected, elementSelected, idElementChange, orderElementChange, elementChange;
const dragstart= (e) => {
    e.preventDefault();
    idElementSelected = e.target.id;
    orderElementSelected = $(e.target).attr('order');
    elementSelected = e.target;
};

const allow = (e) => {
    e.preventDefault();
};

const drop = (e) => {
    idElementChange = e.target.id;
    orderElementChange = $(e.target).attr('order');
    elementChange = e.target;
    // console.log(idElementSelected, ' - ', orderElementSelected, elementSelected);
    // console.log(idElementChange, ' - ', orderElementChange, elementChange);
    if($.isNumeric(idElementSelected) && $.isNumeric(idElementChange) && $.isNumeric(orderElementSelected) && $.isNumeric(orderElementChange)){
        let formData = new FormData();
        formData.append('idSelected', idElementSelected);
        formData.append('idChange', idElementChange);
        formData.append('orderSelected', orderElementSelected);
        formData.append('orderChange', orderElementChange);
        asyncPost({
            url: '/update-order-photos',
            formData: formData,
            type: 'text'
        }).then(response => {
            // console.log(response);
            if(response){
                location.reload();
            }
        });
    }else{
        Swal.fire({
            title: 'Por favor intentalo de nuevo pero esta vez dejalo sobre la linea donde lo quieras dejar',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
        })
    }
};
