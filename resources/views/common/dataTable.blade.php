<div class="card">

    <div class="card-body">
        <table class="table table-bordered yajra-datatable table-striped table-bordered">
            <thead>
                <tr>
                    @foreach($data['dataTable']['columnsTitles'] as $value)
                    <th>{{ $value }}</th>

                    @endforeach
                    <th>{{ __('dataTable.tableAction') }}</th>
                </tr>

            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<?php if ($data['dataTable']['popup']) { ?>
    <script>
        var routeUrl = "<?php echo $data['dataTable']['route']; ?>";

        $('body').on('click', '#edit', function(event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.get(routeUrl + '/' + id, function(data) {

                $('#modal-id').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                // $('#email').val(data.email);
            })
        });
    </script>
<?php } ?>
<script>
    $(function() {
        var id = '<?php if (isset($data['dataTable']['id'])) {
                        echo $data['dataTable']['id'];
                    } else {
                        echo '';
                    } ?>';
        var source = '<?php echo $data['dataTable']['source']; ?>';
        var columnsStr = '<?php echo json_encode($data['dataTable']['columns']); ?>';
        var columnsArr = JSON.parse(columnsStr);

        var tempArr = [];
        $.each(columnsArr, function(index, item) {
            tempArr.push({
                data: item,
                name: item
            });
        });
        tempArr.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        });
        var table = $('.yajra-datatable').DataTable({

            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getAjaxData') }}",
                data: {
                    model: source,
                    id: id,
                    // status:value

                },
            },
            columns: tempArr,
        });
    });
    //delete
    $(function() {
        $('body').on('click', '#delete', function(event) {
            event.preventDefault();
            var title;
            var id = $(this).data('id');
            // var title = $(this).data('title');
            // alert(title);

            var routeUrl = "<?php echo $data['dataTable']['route']; ?>";
            var titleField = "<?php echo $data['dataTable']['delete']['titleField']; ?>";
            $.get(routeUrl + '/' + id, function(data) {

                if (titleField == 'title') {
                    title = data.title;
                } else {
                    title = data.name;
                }

                swal({
                        title: "Are you sure?",
                        text: title,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // var id = $(this).data("id");
                            var token = $("meta[name='csrf-token']").attr("content");
                            $.ajax({
                                url: routeUrl + "/" + id,
                                type: 'DELETE',
                                data: {
                                    _token: token,
                                    id: id,
                                },
                            });
                            // swal("Deleted!", {
                            //     icon: "info",

                            // });
                            location.reload();
                        }
                        // else {
                        //     swal("See you!");
                        // }
                    });
            });

        })
    })
</script>