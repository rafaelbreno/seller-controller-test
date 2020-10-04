<h3>{{ $data['name'] }},</h3><h5>here's your daily report</h5>
<table border="1">
    <thead>
    <tr>
        <td>
            Sale Value
        </td>
        <td>
            Commission
        </td>
        <td>
            DateTime
        </td>
    </tr>
    </thead>
    <tbody>
    @foreach($data['sales'] as $sale)
        <tr>
            <td>{{ $sale['sale_value'] }}</td>
            <td>{{ $sale['commission'] }}</td>
            <td>{{ $sale['created_at'] }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td>
            Total Sales
        </td>
        <td colspan="2">
            {{ $data['total_sales'] }}
        </td>
    </tr>
    <tr>
        <td>
            Total Commission
        </td>
        <td colspan="2">
            {{ $data['total_commission'] }}
        </td>
    </tr>
    </tfoot>
</table>
