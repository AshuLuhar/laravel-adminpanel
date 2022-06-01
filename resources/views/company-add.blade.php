 @include('includes.app-header')
 @if (session('status'))
     <div class="alert alert-success">
         {{ session('status') }}
     </div>
 @endif
 <div class="container">
     <div class="mb-3 w-50 m-auto">
         <h1>Add Company</h1>
     </div>
     <form action="{{ url('company') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group mb-3 w-50 m-auto">
             <label for="name">Name</label>
             <input type="name" class="form-control" id="name" name="name">
         </div>
         <div class="form-group mb-3 w-50 m-auto">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="email" name="email">
         </div>
         <div class="mb-3 w-50 m-auto">
             <label class="form-label" for="logo">Logo</label>
             <input type="file" name="logo" id="logo" class="form-control">
             {{-- <input type="file" class="form-control custom-file-input" id="logo" name="logo"> --}}
             @error('logo')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
             @enderror
         </div>
         <div class="form-group mb-3 w-50 m-auto">
             <label for="website">Website</label>
             <input type="website" class="form-control" id="website" name="website">
         </div>
         <div class=" form-group mb-3 w-50 m-auto ">
             <button type="submit" class="btn btn-primary float-end">Submit</button>
         </div>
     </form>
 </div>
 @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
