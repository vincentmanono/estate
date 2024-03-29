@extends('layouts.admin')

@section('title')
    <title>Chief Properties - {{ $params }}</title>
@stop

@section('content')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">{{ $params }} user </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $params }} user</li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($params == 'create')
                                <form action="{{ route('addUser') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="name">User Name</label>
                                            <input id="name" title="User name"
                                                class="form-control @error('name') is-invalid @enderror" type="text"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="email">User Email</label>
                                            <input id="email" title="user email"
                                                class="form-control @error('email') is-invalid @enderror" type="email"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="phone">User Phone Number </label>
                                            <input id="phone" title="user phone number"
                                                class="form-control @error('phone') is-invalid @enderror" type="text"
                                                name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                                autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="ID">User ID Number / Passport Number </label>
                                            <input id="ID" title="User ID Number or Passport Number"
                                                class="form-control @error('ID') is-invalid @enderror" type="text" name="ID"
                                                value="{{ old('ID') }}" required autocomplete="ID" autofocus>

                                            @error('ID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="kra">KRA Number</label>
                                            <input id="kra" title="KRA Number"
                                                class="form-control @error('kra') is-invalid @enderror" type="text"
                                                name="kra" value="{{ old('kra') }}" required autocomplete="kra" autofocus>

                                            @error('kra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="address">User Address</label>
                                            <input id="address" title="User address"
                                                class="form-control @error('address') is-invalid @enderror" type="text"
                                                name="address" value="{{ old('address') }}" required
                                                autocomplete="address-level1" autofocus>

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="">User Image</label>
                                            <input type="file" title="User Image"
                                                class="form-control-file  @error('image') is-invalid @enderror "
                                                placeholder="Upload Image Only" name="image" autocomplete="photo"
                                                aria-describedby="fileimage">
                                            <small id="fileimage" class="form-text text-muted">Upload User Image</small>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="type"> Select User Type </label>
                                            <select required class="form-control @error('image') is-invalid @enderror "
                                                name="type" id="type">
                                                <option disabled selected>Select User type</option>
                                                <option value="tenant">Tenant</option>

                                                @if ( Auth::user()->isOwner() )
                                                     <option value="owner">owner</option>
                                                     <option value="manager">Manager</option>
                                                @endif

                                            </select>
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>


                                </form>
                            @else

                                <form action="{{ route('updateUser', $user->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    @method("PUT")
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="name">User Name</label>
                                            <input id="name" title="User name"
                                                class="form-control @error('name') is-invalid @enderror" type="text"
                                                name="name" value="{{ $user->name }}" required autocomplete="name"
                                                autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="email">User Email</label>
                                            <input id="email" title="user email"
                                                class="form-control @error('email') is-invalid @enderror" type="email"
                                                name="email" value="{{ $user->email }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="phone">User Phone Number </label>
                                            <input id="phone" title="user phone number"
                                                class="form-control @error('phone') is-invalid @enderror" type="text"
                                                name="phone" value="{{ $user->phone }}" required autocomplete="phone"
                                                autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="ID">User ID Number / Passport Number </label>
                                            <input id="ID" title="User ID Number or Passport Number"
                                                class="form-control @error('ID') is-invalid @enderror" type="text" name="ID"
                                                value="{{ $user->id_no }}" required autocomplete="ID" autofocus>

                                            @error('ID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="kra">KRA Number</label>
                                            <input id="kra" title="KRA Number"
                                                class="form-control @error('kra') is-invalid @enderror" type="text"
                                                name="kra" value="{{ $user->kra_pin }}" required autocomplete="kra"
                                                autofocus>

                                            @error('kra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="address">User Address</label>
                                            <input id="address" title="User address"
                                                class="form-control @error('address') is-invalid @enderror" type="text"
                                                name="address" value="{{ $user->address }}" required
                                                autocomplete="address-level1" autofocus>

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="avatar">User Image</label>
                                            <input  type="file" title="User Image"
                                                class="form-control-file  @error('avatar') is-invalid @enderror "
                                                placeholder="Upload Image Only" name="image" autocomplete="photo"
                                                aria-describedby="fileimage">
                                            <small id="fileimage" class="form-text text-muted">Upload User Image</small>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-6 col-xs-12 ">
                                            <label for="type"> Select User Type </label>
                                            <select required class="form-control @error('type') is-invalid @enderror "
                                                name="type" id="type">
                                                <option value="{{ $user->type }}" selected>{{ $user->type }} </option>
                                                <option value="tenant">Tenant</option>

                                                @if ( Auth::user()->isOwner() )
                                                <option value="manager">Manager</option>
                                                <option value="owner">owner</option>
                                           @endif
                                            </select>
                                            @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>


                                </form>


                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->

            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>



@stop
