<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://localhost:8000/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .table> :not(caption)>*>* {
            padding: 0.5rem 0.5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        .table>tbody {
            vertical-align: inherit;
        }

        .table>thead {
            vertical-align: bottom;
            margin-bottom: 400px;
        }

        .table> :not(:first-child) {
            border-top: 2px solid currentColor;
        }

        .caption-top {
            caption-side: top;
        }

        .table-sm> :not(caption)>*>* {
            padding: 0.25rem 0.25rem;
        }

        .table-bordered> :not(caption)>* {
            border-width: 1px 0;
        }

        .table-bordered> :not(caption)>*>* {
            border-width: 0 1px;
        }

        .table-borderless> :not(caption)>*>* {
            border-bottom-width: 0;
        }

        .table-borderless> :not(:first-child) {
            border-top-width: 0;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div id="app">
        <main class="container">
            <h3 style="text-align: center">Hasil Diagnosa</h3>
            <br>
            <table class="table">
                <tbody class="mt-10">
                    <tr>
                        <td style="width: 12rem"></td>
                        <td style="width: 30rem"></td>
                    </tr>
                    <tr>
                        <td scope="row">Nama</td>
                        <td>
                            {{$nama}}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Alamat</td>
                        <td>{{ $alamat }}</td>
                    </tr>
                    <tr>
                        <td>Opt yang menyerang </td>
                        <td>{{ $opt }} dengan nilai = {{ $nilai }}
                        </td>
                    </tr>
                    <tr>
                        <td>Solusi</td>
                        <td>
                            <div style="white-space: pre-line">{{$solusi}}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>

    </div>

</body>

</html>