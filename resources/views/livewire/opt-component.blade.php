<div class="nk-content-body ">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">OPT</h3>
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
                <div class="col-md-6">
                    <div class="input-group my-2">
                        <div class="form-outline">
                            <input type="search" class="form-control" wire:model.debounce.250ms="search"
                                placeholder="cari kode dan nama opt" />
                        </div>
                        <div class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <table class="table text-center">
                    <thead class="thead-dark">

                        <th scope="col" class="text-capitalize">No</th>
                        <th class="text-capitalize">Foto</th>
                        <th class="text-capitalize">Kode </th>
                        <th class="text-capitalize">Jenis</th>
                        <th class="text-capitalize">Nama OPT</th>
                        <th class="text-capitalize">Solusi</th>
                        <th class="text-capitalize">Aksi</th>

                    </thead>
                    <tbody>
                        @forelse ($lists as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ ($lists->currentpage()-1) *
                                $lists->perpage()
                                + $loop->index + 1
                                }}</td>
                            <td class="text-center">

                                <img src="{{ asset($item->foto) }}" class="img-fluid rounded-top" alt="">
                            </td>

                            <td class="text-center">{{ $item->kode }}</td>
                            <td class="text-center text-capitalize">{{ $item->jenis }}</td>
                            <td class="text-start">{{ $item->nama_opt }}</td>
                            <td class="text-start text-wrap text-justify">
                                <p>{{ $item->solusi }}</p>
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
                {{ $lists->links() }}

                <!-- Modal CREATE AND UPDATE-->
                <div wire:ignore.self class="modal fade" id="modelId" data-bs-backdrop="static" data-bs-keyboard="false"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $options }} Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    wire:click="resetInput"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Kode </label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control @error('kode') is-invalid @enderror"
                                                    wire:model.defer="kode" placeholder="P01">
                                                @error('kode')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Jenis </label>
                                            <div class="col-sm-8">
                                                <select
                                                    class="form-select form-select-lg  @error('jenis') is-invalid @enderror "
                                                    wire:model.defer="jenis">
                                                    <option>Pilih salah satu</option>
                                                    <option value="hama">Hama</option>
                                                    <option value="penyakit">Penyakit</option>
                                                </select>
                                                @error('jenis')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Nama OPT</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    class="form-control @error('nama_opt') is-invalid @enderror"
                                                    wire:model.defer="nama_opt" placeholder="Kumbang Tanduk">
                                                @error('nama_opt')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Solusi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control @error('solusi') is-invalid @enderror"
                                                    wire:model.defer="solusi" rows="8"
                                                    placeholder="Kasih Racun"></textarea>
                                                @error('solusi')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="inputName" class="col-sm-4 col-form-label">Foto</label>
                                            <div class="col-sm-8">

                                                <input type="file" class="form-control" wire:model.defer="foto"
                                                    aria-describedby="fileHelpId">
                                                @error('foto')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
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
