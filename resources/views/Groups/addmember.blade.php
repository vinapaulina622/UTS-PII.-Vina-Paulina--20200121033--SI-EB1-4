@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<section id="add" class="about">
  <div class="container">

    <div class="section-title mx-3">
      <h2 class="mt-5">Groups</h2>
      <h3 >New <span class="text-success">Member</span></h3>
      
    </div>
    <div class="row content">
      <div class="d-flex flex-wrap justify-content-start">
          <div class="card m-3 border-success" style="width: 20rem;">
            <div class="card-body">
              <form action="/groups/addmember/{{ $group->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group ">
                  <label for="name" class="form-label">Name</label>
                  <select class="form-select border-success" aria-label="Default select example" id="name" name="friend_id">
                    <option selected>- Pilihan -</option>
                    @foreach ($friends as $item)
                      <option value="{{ $item->id }}">
                        {{ $item->nama}}
                      </option> 
                    @endforeach
                  
                  </select>
                </div>
                
                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-outline-danger" href="/groups/#portfolio" role="button">Cancel</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
  </div>
</section> 

  

@endsection