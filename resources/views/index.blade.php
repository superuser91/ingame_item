<div class="card">
    <div class="card-header">
        {{ __('Danh sách vật phẩm') }}
        <a class="btn btn-warning" href="{{ route(config('vgp_ingame_item.routes.get_create_item')) }}">Thêm mới</a>
    </div>

    <div class="card-body">
        <div class="col-md-6 my-2 px-0">
            <div class="input-icon">
                <input name="name" type="text" class="form-control" placeholder="Tìm kiếm..."
                    id="kt_datatable_search_input">
                <span><i class="flaticon2-search-1 text-muted"></i></span>
            </div>
        </div>
        <table class="table table-striped" id="kt_datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">GAME ID</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->game_id }}</td>
                        <td><img src="{{ url($item->picture ?? '') }}" alt="..." class="img-thumbnail"
                                style="max-width:75px"></td>

                        <td>
                            <a href="{{ route(config('vgp_ingame_item.routes.get_edit_item'), $item->id) }}"
                                class="btn btn-success">{{ __('Sửa') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
