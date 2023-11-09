<div class="bg-white p-3 min-vh-100 col-md-12 rounded shadow-sm">
    <div class="card-body">
        @if (!$selesaiPerhitungan)
        <form wire:submit.prevent="perhitungan">
            <div class="" id="pertama">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model.defer="nama"
                        placeholder="Ibnu">
                    @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('ttl') is-invalid @enderror" wire:model.defer="alamat"
                        placeholder="Jln.Pramuka Blok.D No-11 Kec Sungai Kunjang">
                    @error('ttl')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="button" class="btn btn-success" style="float: right;" onclick="document.getElementById('pertama').style.display='none';
                        document.getElementById('kedua').style.display='block'; ">Selanjutnya</button>
            </div>
            <div class="" id="kedua" style="display: none;">
                <p class="fs-5 fw-bold">Pilih lah gejala-gejala yang dialami minimal 2 gejala</p>
                @error('gejala_id')
                <small class="text-danger">{{ $message }}</small>
                <br>
                @enderror
                <div class="overflow-auto">
                    @foreach ($gejalas as $key => $gejala)
                    <input type="checkbox" class="form-check-input" wire:model.defer="gejala_id.{{ $gejala->id }}"
                        value="{{ $gejala->id }}">
                    <label class="form-check-label fs-6" for="validationFormCheck1">
                        {{ $gejala->kode_gejala }}
                        {{$gejala->nama_gejala}}</label>
                    <br>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-secondary" style="float: left;" onclick="document.getElementById('pertama').style.display='block' ;
                                document.getElementById('kedua').style.display='none' ;">Kembali</button>

                    <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </div>
            </div>
        </form>

        @else
        <div class="">
            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-primary" onclick="toggle()">Lihat perhitungan</button>
            </div>

            <div class="overflow-auto" id="buka" style="display: none;">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Gejala</th>
                            <th>Penyakit/Hama</th>
                            <th>Belief</th>
                            <th>Plausibility</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rules as $item)
                        <tr>
                            <td>{{ $item['kode_gejala'] }}</td>
                            <td>
                                @php
                                $last = count($item['kode']);
                                @endphp
                                @foreach ($item['kode'] as $key => $kode_penyakit)
                                @if($key == $last - 1)
                                {{ $kode_penyakit }}
                                @else
                                {{ $kode_penyakit }},
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $item['belief'] }}</td>
                            <td>{{ $item['plausibility'] }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <br>


                @foreach ($m as $genap => $item)

                @if ($genap % 2 == 0 && count($m) -1 != $genap )

                <div class="fs-5 text-center">

                    Aturan kombinasi untuk m{{ $genap + 3 }}
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>m{{$genap+2}}(
                                @php
                                $set = count($m[$genap + 1][0]['kd']);
                                @endphp
                                @foreach ($m[$genap + 1][0]['kd'] as $last => $kolom)
                                @php
                                if($last == $set - 1){
                                echo $kolom;
                                }else{
                                echo $kolom. ",";
                                }
                                @endphp
                                @endforeach) ({{ $m[$genap + 1][0]['nilai'] }})</th>
                            <th>m{{ $genap+2 }}(&Theta;) ({{ $m[$genap + 1][1]['nilai'] }})</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($m[$genap] as $baris)
                        <tr>
                            {{-- @dd(count($baris['kd'])) --}}
                            <th>m{{ $genap + 1 }}(
                                @if(is_array($baris['kd']))
                                @php
                                $set = count($baris['kd']);
                                @endphp
                                @foreach ($baris['kd'] as $last => $kolom)

                                @php
                                if($last == $set - 1){
                                echo $kolom;
                                }else{
                                echo $kolom. ",";
                                }
                                @endphp

                                @endforeach

                                @else
                                {{ html_entity_decode($baris['kd']) }}

                                @endif


                                )
                                ({{ $baris['nilai'] }})
                            </th>
                            @foreach ($m[$genap + 1] as $kolom)
                            <td>
                                @php
                                echo "(";
                                if ($baris['kd'] == '&Theta;' && $kolom['kd'] == '&Theta;') {
                                echo html_entity_decode('&Theta;');
                                } elseif ($baris['kd'] == '&Theta;') {
                                $set = count($kolom['kd']);
                                foreach ($kolom['kd'] as $last => $value) {
                                if ($last == $set - 1) {
                                echo $value;
                                }else{
                                echo $value.",";
                                }
                                }
                                } elseif ($kolom['kd'] == '&Theta;') {
                                $set = count($baris['kd']);
                                foreach ($baris['kd'] as $last => $value) {
                                if ($last == $set - 1) {
                                echo $value;
                                }else{
                                echo $value.",";
                                }
                                }
                                } else {

                                $irisan = array_values(array_intersect($baris['kd'],
                                $kolom['kd']));

                                $set = count($irisan);
                                foreach($irisan as $last => $value ){
                                if($last == $set - 1){
                                echo $value;
                                }else{
                                echo $value . ",";
                                }
                                }

                                }
                                echo ")";
                                echo " ".$baris['nilai'] * $kolom['nilai'];
                                @endphp
                            </td>
                            @endforeach

                        </tr>
                        @endforeach

                    </tbody>
                </table>

                @php
                foreach($sementara[$genap] as $key => $value){
                echo " m". $genap+3 ."(";
                if(is_array($value['kd'])){
                foreach ($value['kd'] as $last => $kd) {
                if($last == count($value['kd']) - 1){
                echo $kd;
                }else{
                echo $kd. ",";
                }
                }
                }else{
                echo html_entity_decode('&Theta;');
                }

                echo ") = " . $value['nilai'] . " / 1 - ". $k[$genap] . " = ". $m[$genap+2][$key]['nilai'];

                echo "<br>";
                }
                @endphp
                {{-- @dd($sementara[$genap], $m) --}}

                {{-- m{{ $genap+3 }} --}}
                @endif

                @endforeach

                <div class="fs-4 mt-4">Pemeringkatan</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Densitas m({{ count($m) }})</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilRanking as $item)
                        <tr>
                            <td>m{{ count($m) }}(
                                @if (is_array($item['kd']))


                                @foreach ($item['kd'] as $last => $value)

                                @if($last == count($item['kd']) - 1)
                                {{ $value }}
                                @else
                                {{ $value }},
                                @endif
                                @endforeach
                                @else
                                {{ html_entity_decode($item['kd']) }}
                                @endif
                                )</td>
                            <td>{{ $item['nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                Hasil yang diperoleh merupakan {{ $opt['nama_opt'] }} dengan nilai densitas tertinggi pada perhitungan
                sistem pakar ini yakni {{ round($hasilRanking[0]['nilai'], 4) }}.
            </div>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="text-center">
                        <tr>
                            <th colspan="2" class="fs-4">Hasil Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Nama Lengkap</td>
                            <td>
                                {{$nama}}
                            </td>

                        </tr>
                        <tr>
                            <td scope="row">Alamat</td>
                            <td>{{ $alamat }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Tanaman kemungkinan terkena penyakit/hama </td>
                            <td>{{ $opt['nama_opt'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Solusi</td>
                            <td>
                                <p style="white-space: pre">{{$opt->solusi}}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-md btn-success ms-1" style="float: right" wire:click="cetak">Cetak
                Hasil</button>

        </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    function toggle() {
        var x = document.getElementById("buka");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }
</script>
@endpush
