<div class="nk-content-body ">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Profil</h3>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block bg-white p-3 rounded">
        <div class="row g-gs">
            <div class="col-xxl-6">
                @if($gantiForm == false)
                <div class="card-content">
                    <div class="card-body">
                        <h3 class="card-title">Username</h3>
                        <fieldset class="form-group">
                            <p class="form-control-static">{{ $username }}</p>
                        </fieldset>
                        <div class="my-2" style="float: right;">
                            <button class="btn btn-md btn-warning" wire:click.prevent="edit()">Edit</button>
                        </div>
                    </div>
                </div>
                @else
                <div class="ml-2">
                    <button class="btn btn-md btn-secondary" wire:click.prevent="gantiFormIni">Kembali</button>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h3 class="card-title">Username Profil</h3>
                        <fieldset class="form-group">
                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="text" wire:model.defer="username" class="form-control">
                        </fieldset>
                        <h3 class="card-title">Password Baru</h3>
                        <fieldset class="form-group">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password" wire:model.defer="password" class="form-control"
                                placeholder="iniuntukyangmasuk123">
                        </fieldset>
                        <h3 class="card-title">Konfirmasi Password</h3>
                        <fieldset class="form-group">
                            <input type="password" wire:model.defer="password_confirmation" class="form-control"
                                placeholder="iniuntukyangmasuk123">
                        </fieldset>
                        <h3 class="card-title">Password Sekarang</h3>
                        <fieldset class="form-group">
                            @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="password" wire:model.defer="current_password" class="form-control"
                                placeholder="iniuntukyangmasuk123">
                        </fieldset>
                        <div class="my-2" style="float: right;">
                            <button class="btn btn-md btn-info" wire:click.prevent="store">Simpan
                                Data</button>
                        </div>
                    </div>
                    @endif

                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .nk-block -->





    </div>
</div>


@push('title', 'Halaman Profil')