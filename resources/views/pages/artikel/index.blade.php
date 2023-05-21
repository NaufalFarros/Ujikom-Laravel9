@extends('masterlayouts.index')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Artikel</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <th>{{ $d->judul_artikel }}</th>
                                <th>{{ $d->isi_artikel }}</th>
                                <th>{{ $d->penulis }}</th>
                                <th>{{ $d->created_at }}</th>
                                <th>
                                    <a href="/artikel/edit/{{$d->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="
                                    event.preventDefault();
                                    if(confirm('Yakin ingin menghapus data ini?')){
                                        document.getElementById('delete-form').submit();
                                    }
                                ">Hapus</button>
                                    <form id="delete-form" action="{{route('artikel.destroy', $d->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#dataTable').DataTable();
    </script>
@endsection
