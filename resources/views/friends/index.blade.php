@extends('layouts.app')

@section('title', 'Friends')

@section('content')

<!-- Start tampilan -->
  <section class="py-5 mb-5">
    <div class="container">
      <div class="section-title d-flex flex-wrap">  
        <div class="" style="width: 20rem;">
          <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5"><span class="text-success">Friends</span></h2>
        </div>
        <div class="text-start mt-5">

          @php
            $count = DB::table('friends')->count();
            $price = DB::table('history_friends')->max('id');
          @endphp
          {{-- menampilkan jumlah data-data yang ada --}}
          <div style=""><h5><i> Friends : </i>@php echo $count @endphp</h5></div>
          <div style=""><h5><i> Pernah Dibuat : </i>@php echo $price @endphp</h5></div>
          <div style=""><h5><i> Terhapus : </i>@php echo $price - $count @endphp</h3></div>
        </div>
      </div>
    
      
        <div class="row content">
          <a class="btn btn-primary my-3 col-lg-2 text-center " href="#" role="button" data-bs-toggle="modal" data-bs-target="#createModal">New Friend</a>
            <div class="d-flex flex-wrap justify-content-start">
              {{-- menampilkan data tabel friends --}}
              @foreach ($friends as $friend)
              <div class="card m-3 border-1 border-success" style="width: 15rem;">
                <div class="card-body text-center">
                  <a class="text-decoration-none" href="/friends/{{ $friend['id'] }}/#show" title="Klik Untuk Melihat">
                    {{-- menampilkan nama  --}}
                    <h3 class="card-title text-success">{{ $friend['nama'] }}</h3>
                    {{-- menampilkan alamat  --}}
                    <p class="card-text text-muted" >Alamat : {{ $friend['alamat'] }}</p>
                    
                  </a>

                  <div class="d-flex flex-wrap mt-3 justify-content-center">
                    {{-- tombol edit dan delete --}}
                    <a class="btn btn-outline-success m-2 d-flex justify-content-center" title="Edit" href="/friends/{{ $friend['id'] }}/edit/#edit" role="button" >Edit</a>
                    <form action="/friends/{{$friend['id']}}/#about" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-danger m-2 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>

                  </div>

                </div>
              </div>

              @endforeach

            </div>

            {{-- create MODAL// tampilan membuat friends--}}
              <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Friend</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/friends/#about" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          {{-- input nama friend --}}
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" required value="{{ old('nama') }}">
                          @error('nama')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1" class="form-label">No Telpon</label>
                          {{-- input no tlp  --}}
                          <input type="number" class="form-control" name="no_tlp" id="exampleInputPassword1" required value="{{ old('no_tlp') }}">
                          @error('no_tlp')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1" class="form-label">Alamat</label>
                          {{-- input alamat  --}}
                          <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" required value="{{ old('alamat') }}">
                          @error('alamat')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        
                        <div class="modal-footer">
                          {{-- tombol  --}}
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a class="btn btn-outline-danger" role="button" data-bs-dismiss="modal">Cancel</a>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
            {{-- endModal --}}

          </div>
        </div>       
      </div>
    </div>
  </section>      
      <!-- End Recent Work -->      
@endsection