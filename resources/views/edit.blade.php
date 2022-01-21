<div class="card">
    <div class="card-header">
        {{ __('Thông tin vật phẩm') }}
    </div>
    <div class="card-body">
        <form action="{{ route(config('vgp_ingame_item.routes.put_update_item'), $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên vật phẩm</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    aria-describedby="name" placeholder="Tên" value="{{ old('name', $item->name) }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="game_id">GAME ID</label>
                <input type="number" min="0" class="form-control @error('game_id') is-invalid @enderror" id="game_id"
                    name="game_id" aria-describedby="game_id" placeholder="GAME ID"
                    value="{{ old('game_id', $item->game_id) }}" required>
                @error('game_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="picture">Ảnh minh hoạ</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="ckfinder-picture" name="picture"
                        value="{{ old('picture', $item->picture) }}">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info"
                            onclick="selectFileWithCKFinder('picture')">Browse</button>
                    </span>
                </div>
                <img class="mw-100 mt-2 rounded" src="{{ old('picture', $item->picture) }}" id="preview-picture">

            </div>

            <div class="form-group">
                <label for="stats">Chỉ số</label>
                <div>
                    <textarea name="stats" id="stats" class="form-control"
                        rows="10">{{ json_encode(old('stats', $item->stats)) }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Lưu lại</button>
                <a data-action="{{ route(config('vgp_ingame_item.routes.delete_item'), $item->id) }}"
                    class="btn btn-danger btn-delete float-right">
                    <i class="fas fa-trash"></i>
                    Xoá</a>
            </div>
        </form>
    </div>
</div>
