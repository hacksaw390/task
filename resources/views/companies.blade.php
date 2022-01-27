@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Button trigger modal -->



                    <div class="card-header">{{ __('Companies') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Button trigger modal -->
                  
                        <a href="{{route('create')}}" class="btn btn-primary mb-3">Create New Company</a>

                        <table class="table table-striped table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/'.$company->logo)}}" alt="">
                                        </td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td> 
                                            <button class="btn btn-sm btn-primary"  onclick="editCampany({{$company->id}})" >Edit</button>
                                            {{-- <a href="{{ route('edit', ['id' => $company->id])}}" onclick="" id="edit" class="btn btn-sm btn-primary">Edit</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="UpdateCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post"  action="{{route('update')}}" id="companyDataUpdate" enctype="multipart/form-data">
              @csrf
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <input type="hidden" name="id" id="companyid">
                        <div class="input-group mb-3">
                            <input type="text" id="cname" class="form-control" placeholder="Name" name="name">
                        </div>
                       
                        <div class="input-group mb-3">
                            <input type="text" id="cemail" class="form-control" placeholder="Email" name="email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="cwebsite" class="form-control" placeholder="Phone" name="website">
                        </div>
                        <div class="input-group mb-3">

                            <input type="file" name="logo" id="logo" onchange="loadfile(event)">
                            {{-- <img id="preimage" width="180" alt="" style="background: #c3c3c3;height: 180px;width: 180px"> --}}
                            <img id="clogo" src="" width="180" alt="" style="background: #c3c3c3;height: 180px;width: 180px">
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
    


        function loadfile(event) {
            var output = document.getElementById('clogo');

            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
