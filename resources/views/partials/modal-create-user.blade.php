<button type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#createUserModal">
    Create New Seller
</button>

<!-- Modal -->
<div class="modal fade"
     id="createUserModal"
     tabindex="-1"
     aria-labelledby="createUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="userCreateForm">
                    <input type="hidden" id="route-data" data-url="{{ url('') }}" data-method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               id="email"
                        >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-primary"
                        id="buttonCreateUser">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('button[id="buttonCreateUser"]').on('click', function () {
            let routeData = $('input[id="route-data"]');
            axios({
                url: routeData.data('url'),
                method: routeData.data('method'),
                data: {
                    name: $('input[id="name"]').val(),
                    email: $('input[id="email"]').val()
                }
            }).then(resp => {
                console.log(resp);
            }).catch(err => {
                console.log(err.response);
            });
        });
    });
</script>
@endpush
