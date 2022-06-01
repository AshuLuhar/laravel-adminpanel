@include('includes.app-header')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="mb-3 w-50 m-auto">
        <h1>Add Employee</h1>
    </div>
    <form action="{{ url('employee') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 w-50 m-auto">
            <label class="form-label" for="inputfName">First Name</label>
            <input type="name" class="form-control" name="firstname" id="firstname" placeholder="Enter Your First Name"
                value="" required>
        </div>
        <div class="mb-3 w-50 m-auto">
            <label class="form-label" for="inputlName">Last Name</label>
            <input type="name" class="form-control" name="lastname" id="lastname" placeholder="Enter your Last Name"
                value="" required>
        </div>
        <div class="mb-3 w-50 m-auto">
            <label class="form-label" for="inputCompany">Select Your Company</label>
            <select class="form-control" name="company_id" id="company_id" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">
                        {{ $company->name }}</option>
                @endforeach
                    {{-- @foreach ($companies as $company)
                    <option>{{ $company->name }}</option>
                    <option>2</option>
                    <option>3</option>
                    @endforeach --}}
            </select>
        </div>

        <div class="mb-3 w-50 m-auto">
            <label class="form-label" for="inputEmail">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Valid Email Address"
                required>
        </div>

        <div class="mb-3 w-50 m-auto">
            <label class="form-label" for="inputMobile">Mobile Number</label>
            <input type="text" maxlength="10" name="phone" class="form-control" id="phone" placeholder="Mobile Number"
                required>
        </div>

        <div class="mb-3 w-50 m-auto ">
            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </div>
    </form>
</div>
