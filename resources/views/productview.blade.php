
    @foreach ($products as $product)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a  class="btn btn-success upProductForm" data-id="{{ $product->id }}" >
                <i class="las la-edit"></i>
            </a>
            <a href="" class="btn btn-danger delete_product" id="{{ $product->id }}"><i class="las la-times"></i></a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="4">
    {!! $products->links() !!}

    </td>
</tr>

