<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Users Buying List</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                            <th class="text-center text-info">#</th>
                            <th class="text-center text-info">Email</th>
                            <th class="text-center text-info">Username</th>
                            <th class="text-center text-info">Total Price</th>
                            {{-- <th class="text-center text-info">Picture</th> --}}
                            <th class="text-center text-info">Buying Date</th>
                            <th class="text-center text-info">Status</th>
                            <th class="text-center text-info"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($payproduct->count() > 0)
                            @foreach ($payproduct as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">Rp {{ $item->total_price }}</td>
                                    {{-- <td class="text-center">
                                        <img src="{{ asset('storage/photo-product/' . $item->photo) }}"
                                        alt="Image-Product" width="150">
                                    </td> --}}
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">-</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                                x-placement="bottom-end"
                                                style="position: absolute; transform: translate3d(-80px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="{{ route('admin.product.product-detail', ['id' => $item->id]) }}"
                                                    class="dropdown-item">Detail</a>
                                                <a href="#" class="dropdown-item"
                                                    onclick="confirmDelete({{ $item->id }})">Delete</a>
                                                <form id="deleteForm-{{ $item->id }}"
                                                    action="{{ route('admin.product.product-delete', ['id' => $item->id]) }}"
                                                    method="POST" style="display: none;"
                                                    onsubmit="return confirm('Are you sure want to delete this product with ID {{ $item->id }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center pt-5" colspan="7">Product Not Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(productId) {
        if (confirm('Are you sure want to delete this product with ID ' + productId + '?')) {
            document.getElementById('deleteForm-' + productId).submit();
        }
    }
</script>
