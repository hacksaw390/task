@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Employee') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('store-employee') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="f_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="f_name" value="{{ old('f_name') }}"
                                    id="f_name" aria-describedby="emailHelp">
                                @error('f_name')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="l_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="l_name" value="{{ old('l_name') }}"
                                    id="l_name" aria-describedby="emailHelp">
                                @error('l_name')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="l_name" class="form-label">Company</label>

                                <select name="company" id="company" class="form-control">
                                    @foreach ($companies as $item)
                                        <option value="{{$item->id}}">{{ $item->company_name }}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    id="email" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                    id="phone" aria-describedby="emailHelp">
                                @error('phone')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                    id="password" aria-describedby="emailHelp">
                                @error('password')
                                    <div class="error" style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
