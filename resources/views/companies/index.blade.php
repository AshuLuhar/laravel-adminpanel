@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row float-end">
                    <button type="button" class="btn btn-dark"> <a href="{{ route('companies.create') }}">Add</a>
                    </button>
                </div>
                <div class="container-fluid">
                    <h3>Company Detail</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Website</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <th scope="row">{{ $company->id }}</th>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->logo }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                class="btn btn-secondary btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            &nbsp;
                                            <form method="POST" action="{{ url('/companies' . '/' . $company->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Company"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $companies->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
