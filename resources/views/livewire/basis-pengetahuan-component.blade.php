<div class="nk-content-body ">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Basis Pengetahuan</h3>
                <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#modelId"
                    id="anjay">
                    Tambah Data
                </button>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block bg-white p-3 rounded">
        <div class="row g-gs">
            <div class="col-xxl-6">
                <table class="table text-center">
                    <thead class="thead-dark">

                        <th scope="col" class="text-capitalize">No</th>
                        <th class="text-capitalize">Kode OPT</th>
                        <th class="text-capitalize">Nama OPT</th>
                        <th class="text-capitalize">Gejala Terkait</th>
                        <th class="text-capitalize">Aksi</th>

                    </thead>
                    <tbody>
                        @forelse ($lists as $no => $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no+1
                                }}</td>
                            <td class="text-center">{{ $item->kode }}</td>
                            <td class="text-start">{{ $item->nama_opt }}</td>
                            <td class="text-start">
                                @php
                                $totalGejala = count($item->gejala);
                                @endphp
                                @foreach ($item->gejala as $key => $gejala)
                                @if ($key + 1 == $totalGejala)
                                {{ $gejala->kode_gejala }}
                                @else
                                {{ $gejala->kode_gejala }},
                                @endif
                                @endforeach
                            </td>

                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <button class="btn btn-md btn-warning"
                                            wire:click.prevent="edit({{ $item->id }})">Edit</button>
                                        <button class="btn btn-md btn-danger"
                                            wire:click.prevent="hapusKonfirmasi({{ $item->id }})">Hapus</button>
                                    </div>
                                </div>

                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Data tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Modal CREATE AND UPDATE-->
                <div wire:ignore.self class="modal fade" id="modelId" data-bs-backdrop="static" data-bs-keyboard="false"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $options }} Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    wire:click="resetInput"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                                        @if ($options == 'Tambah')
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">OPT</label>
                                            <div class="col-sm-8">
                                                <select class="form-select @error('opt_id') is-invalid @enderror "
                                                    wire:model.defer="opt_id">
                                                    <option value="" selected>Pilih OPT</option>
                                                    @foreach($opts as $opt)
                                                    <option value={{ $opt->id }}>{{ $opt->nama_opt }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('opt_id')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @else
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">OPT</label>
                                            <div class="col-sm-8">
                                                <select class="form-select @error('opt_id') is-invalid @enderror "
                                                    wire:model.defer="opt_id">
                                                    <option value="{{ $opt_id }}" selected>{{ $opt_nama }}</option>

                                                </select>
                                                @error('opt_id')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Gejala-gejala</label>
                                            <div class="col-sm-8">
                                                @error('gejala_id')
                                                <small class="text-danger">{{ $message }}</small>
                                                <br>
                                                @enderror
                                                <div class="">
                                                    @foreach ($gejalas as $gejala)
                                                    <input type="checkbox" class="form-check-input"
                                                        wire:model.defer="gejala_id.{{ $gejala->id }}"
                                                        value="{{ $gejala->id }}">
                                                    <label class="form-check-label" for="validationFormCheck1">{{
                                                        $gejala->nama_gejala}}</label>
                                                    <br>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                wire:click="resetInput">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>


                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->

    <!-- Modal Hapus-->
    <div wire:ignore.self class="modal fade" id="deleteId" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center fs-4">
                        Apakah anda yakin mau menghapus data?
                    </p>
                    <div style="float: right;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" wire:click="hapus({{ $idHapus }})">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toastId" class="toast align-items-center text-white bg-primary border-0" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('message') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toastDeleteId" class="toast align-items-center text-white bg-danger border-0" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body">
                    Data berhasil dihapus
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>

@push('title', 'Halaman OPT')