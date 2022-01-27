@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Button trigger modal -->



                    <div class="card-header">{{ __('Employee') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Button trigger modal -->
                  
                        <a href="{{route('create-employee')}}" class="btn btn-primary mb-3">Create New Employee</a>

                        <table class="table table-striped table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">first Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Company </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->user->f_name }}</td>
                                        <td>{{ $employee->user->l_name }}</td>
                                        <td>{{ $employee->company->company_name }}</td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->user->phone }}</td>
                                        <td> 
                                            <button class="btn btn-sm btn-primary"  onclick="editEmployee({{$employee->id}})" >Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="UpdateEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post"  action="{{route('update-employee')}}" id="employeeDataUpdate" enctype="multipart/form-data">
              @csrf
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="employeeid">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="input-group mb-3">
                            <input type="text" id="f_name" class="form-control" placeholder="Name" name="f_name">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" id="l_name" class="form-control" placeholder="Name" name="l_name">
                        </div>

                        <div class="mb-3">

                            <select name="company" id="company" class="form-control">
                                @foreach ($companies as $item)
                                    <option value="{{$item->id}}">{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                            @error('company')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="cphone" class="form-control" placeholder="Phone" name="phone">
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
