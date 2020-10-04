<button type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#createUserModal">
    <i class="fas fa-user-plus"></i>
    Create New Seller
</button>

<!-- Modal -->
<div class="modal fade text-left"
     id="createUserModal"
     tabindex="-1"
     aria-labelledby="createUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new Seller</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="userCreateForm">
                    <input type="hidden" id="route-data" data-url="{{ url('/seller') }}" data-method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="name"
                        >
                        <ul id="nameErrors"></ul>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email"
                               class="form-control"
                               name="email"
                               id="email"
                        >
                        <ul id="emailErrors"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-primary"
                        id="buttonCreateUser">
                    <i class="fas fa-user-plus"></i>
                    Create New Seller
                </button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        let inputs = ["name", "email"];
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
                $('div[id="createUserModal"]').modal('hide');
                $('div[id="alertMessage"]').append($('<span>', {
                    text: "Seller created successfully, reload to apply modification"
                }));
                $('div[id="alertBox"]').show();

            }).catch(err => {
                window.setErrors(err.response.data.errors, inputs);
            });
        });
    });
</script>
@endpush
