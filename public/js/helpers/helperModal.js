const globalAppModal = (templateData) => {
    let {id,classDialog = '',size,classHeader = '',header,content,footer = '',close='close-to-reload'} = templateData;
    return `
        <div class="modal fade" id="${id}" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog ${classDialog} ${size} modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: .3rem;">
              <div class="modal-header ${classHeader}">
                <h6><b>${header}</b></h6>
                <button type="button" class="close ${close}" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ${content}
              </div>
              ${setFooterModal(footer)}
          </div>
        </div>
    `;
};

const setFooterModal = (footer) => {

    if(typeof footer == undefined || typeof footer === "undefined"){
        return '';
    }

    return`
        <div class="modal-footer">
            ${footer}
        </div>
    `;
};

const removeModalReset = (modal) => {
    $(`#${modal}`).on('hidden.bs.modal', function(e) {
        $(`#${modal}`).remove()
    });
};
