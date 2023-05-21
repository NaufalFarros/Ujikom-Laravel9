@extends('masterlayouts.index')

@section('content')
    <div class="row">
        <div class="card w-100">
            <div class="card-header">
                Edit data artikel
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="col-8">
                        <form action="{{route('artikel.update', $data->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input class="form-control" name="judul_artikel" value="{{$data->judul_artikel}}">
                            </div>
                            <div class="form-group">
                                <label>Isi Artikel</label>
                                <textarea class="form-control" name="isi_artikel" rows="10">{{$data->isi_artikel}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
