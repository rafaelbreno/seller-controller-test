@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
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
