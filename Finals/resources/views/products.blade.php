@include('header')
@include('cdn')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class ="row">
            <div class ="col col-md-6"><b>Inventory</b></div>
            <div class ="col col-md-6">
                <a href="{{ route('addprod') }}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class ="table table-bordered">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @if(isset($data) && is_countable($data) && count($data) > 0)

                @foreach($data as $row)

                    <tr>

                        <td><img src="{{ asset('images/' . $row->product_image) }}" width ="75"/></td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->product_description }}</td>
                        <td>{{ $row->product_quantity }}</td>
                        <td>{{ $row->product_price }}</td>
                        <td>
                            <form method="post" action="{{ route ('delete', $row->id) }}">
                                @csrf
                                @method('DELETE')
                            <a href = "{{ route('viewprod', $row->id) }}" class ="btn btn-warning btn-sm">View</a>
                            <a href = "{{ route('editprod', $row->id) }}" class ="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" class = "btn btn-danger btn-sm" value="Delete"/>
                        </form>

                    </tr>

                @endforeach

            @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table> 
        {!! isset($data) ? $data->links() : '' !!}
    </div>
</div>


@include('footer')
