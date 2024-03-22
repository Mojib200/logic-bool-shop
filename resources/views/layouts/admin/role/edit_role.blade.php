@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12 mt-5 mb-5">
                <div class="">
                    <div class="container">
                        <div class="row ">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center bg-primary">
                                        <h3> Role Permission</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <form action="{{ route('update_permission_info') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="" class="form-label">Edit Role Name</label>
                                                <input type="text" readonly class="form-control" value="{{$role_info->name}}">
                                                <input type="hidden"  class="form-control" name="role_id" value="{{$role_info->id}}">
                                            </div>
                                            <div class="mb-3">
                                                <h5>Select Permission</h5>
                                                <div class="form-group">
                                                    @foreach ($permission_info as $permission_info)
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" multiple {{($role_info->hasPermissionTo($permission_info->name))?'checked':''}} name="permissions[]" class="form-check-input"
                                                                    value="{{ $permission_info->name }}">{{ $permission_info->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-danger">Click Me</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
