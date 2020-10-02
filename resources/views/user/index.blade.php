@extends('layout.app')

@section('content')
    <div class="card w-75 mx-auto mt-3">
        <div class="card-header">
            <div class="row justify-content-around">
                <div class="col-6 text-left">
                    Seller's List
                </div>
                <div class="col-6 text-right">
                    @include('partials.modal-create-user')
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="usersTable">
                <thead>
                <tr>
                    <td>Name:</td>
                    <td>Email:</td>
                    <td>Created_at:</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function getUsers() {
            return axios({
                url: "{{ url('/get-user') }}",
                method: "GET"
            }).then(resp => {
                return resp.data;
            }).catch(err => {
                return err.response;
            });
        }

        $(document).ready(function () {
            getUsers()
                .then(data => {
                    console.log(data);
                    $('table[id="usersTable"]').DataTable({
                        data: data,
                        columns: [
                            {data: 'name'},
                            {data: 'email'},
                            {data: 'created_at'},
                        ]
                    });
                })
        });
    </script>
@endpush
