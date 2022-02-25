function dataJobsite() {
    $('#jobsite').select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'Data Jobsite',
        ajax: {
            dataType: 'json',
            url: "<?=site_url('main/ambilDataJobsite')?>",
            delay: 500,
            data: function (params) {
                return {
                    search: params.term
                }
            },
            processResults: function (data, page) {
                return {
                    results: data
                }
            }
        }
    })
}

$(document).ready(function () {
    dataJobsite()
})
