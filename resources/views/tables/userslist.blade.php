<div class="col-md-12">
    <div class="card card-plain">
        <div class="card-header">
            <h2 class="card-title text-right">Users List</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class="text-primary">
                        <tr>
                            <th class="text-center text-primary">#</th>
                            <th class="text-center text-primary">Username</th>
                            <th class="text-center text-primary">Email</th>
                            <th class="text-center text-primary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() > 0)
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.profile.user-detail', ['id' => $item->id]) }}" type="button"
                                            class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center pt-5" colspan="4">Users Not Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>