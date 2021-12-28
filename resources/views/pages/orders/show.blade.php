<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $items->email }}</td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>{{ $items->phone_number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $items->address }}</td>
    </tr>
    <tr>
        <th>Total Order</th>
        <td>{{ $items->order_total }}</td>
    </tr>
    <tr>
        <th>Order Status</th>
        <td>{{ $items->order_status }}</td>
    </tr>
    <tr>
        <th>Purchased Product</th>
        <td>
            <table style="border: 0px">
                <tr>
                    <th style="border: 0px">Name</th>
                    <th style="border: 0px">Price</th>
                </tr>
                @foreach ($items->details as $detail)
                    <tr>
                        <td style="border: 0px">{{ $detail->products->name }}</td>
                        <td style="border: 0px">{{ $detail->products->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
