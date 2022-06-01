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
                        {{ __('Employees Detail ') }}
                        <div class="float-end">
                            <a href="{{ route('employees.create') }}"
                                class="btn btn-dark float-start">{{ __('New') }}</a>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session('message-success'))
                            <div class="alert alert-success">{{ session('message-success') }}</div>
                        @endif
                        <div class="table-responsive">

                            <table id="tblEmployees" class="display table" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('id') }}</th>
                                        <th>{{ __('company_id') }}</th>
                                        <th>{{ __('first name') }}</th>
                                        <th>{{ __('last name') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('phone') }}</th>
                                        <th>{{ __('options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->company->name }}</td>

                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td class="text-nowrap">
                                                <a href="{{ route('employees.edit', [$employee->id]) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true">
                                                    </i>
                                                </a>
                                                {{-- <a href="{{ route('employees.edit', [$company->id, $employee->id]) }}"
                                                class="btn btn-secondary btn-sm"><span class="fa fa-pencil"></span></a> --}}
                                                &nbsp;
                                                <form method="POST"
                                                    action="{{ url('/employees' . '/' . $employee->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Employee"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $employees->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('page-scripts')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script>
        $(document).ready( function () {
            $('#tblEmployees').DataTable({
                order: [[0,"DESC"]]
            });
            $('[data-toggle="tooltip"]').tooltip();
        } );

        $(document).on('click','[id^=btnDelete]',function(){
            let employeeid = $(this).attr('employeeid');
            let route = $(this).attr('route');
            let conf = confirm('{{ __('Do you want to delete employee') }}, '+employeeid+'?');

            if (conf) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    success: function(data) {
                        // data returned is JSON object
                        if (data.status) {
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    },
                    error : function (xhr, status, error) {
                        alert('Error: '+error);
                    }
                });
            }
        });
    </script>
@endsection --}}
