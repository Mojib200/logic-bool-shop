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
                                        <form action="{{ route('role_permission') }}" method="post">
                                            @csrf
                                            <div>
                                                <label for=""> Permission*</label>
                                                <input type="text" placeholder="Like User List Permission"
                                                    name="permission" class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-danger">Click Me</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center bg-primary">
                                        <h3> Role User Assigned</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <form action="{{ route('role_user_assigned') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for=""> User Name*</label>
                                                    <select name="user_id" class="form-control">
                                                        <option value="">---Select User Name---</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for=""> Role Name*</label>
                                                    <select name="role_id" class="form-control">
                                                        <option value="">---Select Role Name---</option>
                                                        @foreach ($role_info as $role)
                                                            <option value="{{ $role->name }}">
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-danger">Click Me</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header text-center bg-primary">
                                        <h3> Role Create</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <form action="{{ route('role_add') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for=""> Role Name*</label>
                                                <input type="text" placeholder="Like Supper Admin" name="role_name"
                                                    class="form-control">
                                            </div>
                                            <h5>Select Permission</h5>
                                            <div class="form-group">
                                                @foreach ($permission_info as $permission_info)
                                                    <div class="form-check form-check-inline ">
                                                        <label class="mb-2">
                                                            <input type="checkbox" multiple name="permissions[]"
                                                                class="form-check-input"
                                                                value="{{ $permission_info->name }}">
                                                            {{ $permission_info->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-danger">Click Me</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5 pl-50">
                                <div class="card">
                                    <div class="card-header text-center  bg-primary">
                                        <h3>User Show</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <table class="table table-dark text-center" id="myTable">
                                           <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role Name</th>
                                                <th>Action</th>
                                            </tr>
                                           </thead>
                                           <tbody>
                                            @foreach ($users as $users )
                                            <tr>
                                                <td>{{$users->name}}</td>
                                                <td> @forelse ($users->getRoleNames() as $role_name)
                                                    <span class="badge badge-info "> {{ $role_name }}</span>
                                                @empty
                                                    Not Assigned Yet
                                                @endforelse
                                            </td>
                                                
                                                <td>
                                                    <a href="{{route('delete_role_info',$users->id)}}" class=" btn-sm fa fa-trash "  title="Delete"></a>
                                                    
                                                </td>
                                            </tr>
                                                
                                            @endforeach
                                           </tbody>
                                          
    
                                        </table>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5 pl-50">
                                <div class="card">
                                    <div class="card-header text-center  bg-primary">
                                        <h3>Role Permission Show</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                        <table class="table table-dark text-center" id="myTable">
                                           <thead>
                                            <tr>
                                                <th>Role ID</th>
                                                <th>Role Name</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                           </thead>
                                           <tbody>
                                            @foreach ($role_info as $role_info )
                                            <tr>
                                                <td>{{$role_info->id}}</td>
                                                <td>{{$role_info->name}}</td>
                                                <td> @foreach ($role_info->getAllPermissions() as $permission)
                                                    <span class="badge badge-info my-2">{{ $permission->name }},</span>
                                                @endforeach</td>
                                                <td>
                                                    <a href="{{route('edit_permission_info',$role_info->id)}}" class=" btn-sm fa fa-edit "  title="Edit"></a>
                                                </td>
                                            </tr>
                                                
                                            @endforeach
                                           </tbody>
                                          
    
                                        </table>
                                    
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
