@extends('template.layout')
@section('judul','Update Data')

@section('content')
<form class="row g-3" method="POST" action="">
    @csrf
    <div class="col-md-3">
      <label for="inputEmail4" class="form-label">Club 1</label>
      <select name="club1" class="form-control">
        <option selected disabled>Pilih Data</option>
        @foreach ($data as $d)
            <option value="{{ $d->nama }}">{{ $d->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label"></label>
      <h5 style="text-align: center">VS</h5>
    </div>
    <div class="col-md-3">
      <label for="inputAddress" class="form-label">Club 2</label>
      <select name="club2" class="form-control">
        <option selected disabled>Pilih Data</option>
        @foreach ($data as $d)
            <option value="{{ $d->nama }}">{{ $d->nama }}</option>
        @endforeach
      </select>
    </div>

    {{-- ============ --}}

    <div class="col-12">
      <label for="inputAddress2" class="form-label"></label>
      <h5 style="margin-left: 36%">Score</h5>
    </div>
    <div class="col-md-3">
        <input type="number" name="score1" class="form-control" id="inputEmail4" required placeholder="Score Club 1">
      </div>
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label"></label>
        <h5 style="text-align: center"></h5>
      </div>
      <div class="col-md-3">
        <input type="number" name="score2" class="form-control" id="inputAddress" placeholder="Score Club 2" required>
      </div>
      <div class="col-md-12">
          <button class="btn btn-primary col-md-1" type="submit" name="submit" style="margin: 5px">Kirim</button>
          <a href="/" class="btn btn-warning col-md-1" style="margin: 5px">Kembali</a>
      </div>
  </form>
@endsection
