@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{ __('Create new Employee') }}
                        <div class="float-end">
                            <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm ">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('employees.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="company">{{ __('Company Name') }}</label>
                                <select class="form-control" name="company_id" id="company_id" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">
                                            {{ $company->name }}</option>
                                    @endforeach
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="first_name" class="mt-2">{{ __('First Name') }}</label>
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    placeholder="{{ __('First Name') }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="mt-2">{{ __('Last Name') }}</label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    placeholder="{{ __('Last Name') }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="mt-2">{{ __('Email') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('Email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-2">{{ __('Phone') }}</label>
                                <input type="text" name="phone"  maxlength="10" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="{{ __('Phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-dark btn-block mt-5 float-end"
                                type="submit">{{ __('Create this Employee') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
