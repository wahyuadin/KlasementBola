@extends('template.layout')
@section('judul','Klasement Bola')

@section('content')
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Club
</button>
<a href="/update" class="btn btn-warning mb-3">Update Score</a>

  <!-- Modal -->
  <form method="POST" action="">
    @csrf
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Club</label>
                  <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nama Club">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Kota Club</label>
                  <input type="text" name="kota" value="{{ old('kota') }}" class="form-control" id="exampleInputPassword1" required placeholder="Kota Club">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="dataClub" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  {{-- end modal --}}

<div style="overflow-x:auto;">
  <table>
    <tr>
        <?php $no=1;?>
        <th>No</th>
        <th>Klub</th>
        <th>Asal</th>
        <th>Ma</th>
        <th>Me</th>
        <th>S</th>
        <th>K</th>
        <th>GM</th>
        <th>GK</th>
        <th>Points</th>
    </tr>
    @foreach ($data as $d)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $d->nama }}</td>
        <td>{{ $d->kota }}</td>
        <td>{{ $d->main }}</td>
        <td>{{ $d->menang }}</td>
        <td>{{ $d->seri }}</td>
        <td>{{ $d->kalah }}</td>
        <td>{{ $d->gm }}</td>
        <td>{{ $d->gk }}</td>
        <td>{{ $d->point }}</td>
    </tr>
    @endforeach
  </table>
</div>
<h5 class="mt-3">Keterangan:</h5>
<ul>
    <li>Ma = Main</li>
    <li>Me = Menang</li>
    <li>S = Seri</li>
    <li>K = Kalah</li>
    <li>GM = Goal Menang (total Gol yg dicetak tim tersebut)</li>
    <li>GK = Goal Kalah (total yg dicetak tim lawan terhadap team tersebut)</li>
  </ul>
@endsection
