@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Company') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" aria-describedby="emailHelp">
                                @error('name')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"value="{{old('email')}}" id="email"
                                    aria-describedby="emailHelp">
                                    @error('email')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" value="{{old('website')}}" id="website"
                                    aria-describedby="emailHelp">
                                    @error('website')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">Logo</label>
                                <input type="file" name="logo" onchange="loadfile(event)">
                                @error('logo')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                            <img id="preimage" width="180" alt="" style="background: #c3c3c3;height: 180px;width: 180px">
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    


        function loadfile(event) {
            var output = document.getElementById('preimage');

            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
