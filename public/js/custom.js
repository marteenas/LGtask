$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var sysid = button.data('sysaction')
    var modal = $(this)
    modal.find('.modal-form').attr('action', sysid)
})