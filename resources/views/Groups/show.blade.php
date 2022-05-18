@extends('layouts.app')

@section('title', 'Coba')

@section('content')

{{-- tampilan detai groups --}}
<section id="show" class="about">
    <div class="container">
  
      <div class="section-title">
        <h2 class="mt-5">Groups</h2>
        <h3>Detail <span class="text-success">Groups</span></h3>
        <a class="btn btn-outline-primary mt-5" href="/groups/#portfolio" role="button">kembali</a>
      </div>
      <div class="row content">
          <div class="d-flex flex-wrap justify-content-center">
            <div class="card my-4 border-success" style="width: 20rem;">
                <div class="card-body my-5">
                  {{-- menampilkan nama --}}
                  <h3 class="card-title my-2"> Name : {{ $group['name'] }} </h3>
                  {{-- menampilkan description --}}
                  <h5 class="card-subtitle my-4"> Description : {{ $group['description'] }} </h5>
                  
                </div>
            </div>
            
            <div class="card my-4 border-success" style="width: 20rem;">
              {{-- menghitung jumlah data-data member  --}}
              <div class="card-body my-2">
              @php
                  $id = $group['id'];
                  $count = DB::table('friends')->where('groups_id','=',$id)->count();
                  $all = DB::table('history_friends')->where('groups_id','=',$id)->count();
                  
              @endphp
              <h5 class="my-2"> Member : <br>@php echo $count; @endphp</h5>
              <h5 class="my-2"> Member yang pernah masuk : <br> @php echo $all; @endphp</h5>
              <h5 class="my-2"> Member yang pernah keluar : <br>@php echo $all - $count; @endphp </h5>
              </div>
            </div>
            <div class="card my-4 border-success" style="width: 20rem;">
              <div class="card-body my-2">

                  {{-- list --}}
                      <h5><b>Member List</b></h5>
                      <div  class="mt-2">
                        <ul class="list-group">
                          @foreach ($group->friends as $friend)
                          <li class="border-success list-group-item d-flex justify-content-between align-items-center">
                            {{-- menampilkan semua nama member --}}
                            <h5>{{$friend->nama}}</h5>
                            <span class="">
                              <form action="/groups/deletemember/{{$friend->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-danger m-2 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')">X</button>
                              </form>
                            </span>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                      <div class="mt-3">
                        <a class="btn btn-outline-primary" href="/groups/addmember/{{ $group['id'] }}/#add" role="button">Tambah Anggota Baru</a>
                      </div>
                    
                  {{-- end list --}}
              </div>
            </div>
          </div>
        </div>
    </div>
</section> 

@endsection


