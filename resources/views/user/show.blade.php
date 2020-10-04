@extends('layout.app')

@section('content')
    <div class="card w-75 mx-auto mt-3">
        <input type="hidden"
               id="getSales"
               data-url="{{ route('seller.sales', $data['id']) }}"
               data-method="GET">
        <div class="card-header">
            {{ $data['name'] }}
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="hidden"
                       id="createSale"
                       data-url="{{ route('sale.create') }}"
                       data-method="POST"
                       data-id="{{ $data['id'] }}">
                <label for="sale_value">Add new Sale</label>
                <input class="form-control"
                       type="number"
                       step="0.01"
                       id="sale_value"
                       name="sale_value">
            </div>
            <div class="form-group">
                <button class="btn btn-success"
                        id="addSale">
                    <i class="fas fa-money-check mr-1"></i> Commit Sale
                </button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <td>Sale Value</td>
                    <td>Commission</td>
                    <td>Date time</td>
                </tr>
                </thead>
                <tbody id="salesTable"></tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            let salesRoute = $('input[id="getSales"]');
            let salesTable = $('tbody[id="salesTable"]');

            function getSales() {
                axios({
                    url: salesRoute.data('url'),
                    method: salesRoute.data('method')
                }).then(resp => {
                    salesTable.find('tr').remove()
                    resp.data.forEach((item, index) => {
                        salesTable.append(
                            $('<tr>')
                                .append($('<td>', {
                                    text: item['sale_value']
                                }))
                                .append($('<td>', {
                                    text: item['commission']
                                }))
                                .append($('<td>', {
                                    text: item['created_at']
                                }))
                        )
                    })
                }).catch(err => {
                    console.log(err.response)
                })
            }
            let addSaleRoute = $('input[id="createSale"]');

            $('button[id="addSale"]').on('click', function () {
                axios({
                    url: addSaleRoute.data('url'),
                    method: addSaleRoute.data('method'),
                    data: {
                        seller_id: addSaleRoute.data('id'),
                        sale_value: $('input[id="sale_value"]').val()
                    }
                }).then(resp => {
                    getSales();
                    console.log(resp)
                }).catch(err => {
                    console.log(err.response)
                })
            })

            getSales()
        });
    </script>
@endpush
