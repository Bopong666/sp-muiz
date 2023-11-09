<div class="nk-content-body ">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Riwayat</h3>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block bg-white p-3 rounded">
        <div class="row g-gs">
            <div class="col-xxl-6">
                <table class="table text-center">
                    <thead class="thead-dark">

                        <th scope="col" class="text-capitalize">No</th>
                        <th class="text-capitalize">Nama</th>
                        <th class="text-capitalize">Alamat</th>
                        <th class="text-capitalize">Opt</th>

                    </thead>
                    <tbody>
                        @forelse ($lists as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ ($lists->currentpage()-1) *
                                $lists->perpage()
                                + $loop->index + 1
                                }}</td>
                            <td class="text-center">{{ $item->nama }}</td>
                            <td class="text-start">{{ $item->kota }}</td>
                            <td class="text-center">{{ $item->opt->nama_opt }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Data tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>				
            </div><!-- .col -->
        </div><!-- .row -->
        	
    </div><!-- .nk-block -->
</div>

@push('title', 'Halaman Riwayat')