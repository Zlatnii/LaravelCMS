<x-header/>
<body style="margin-left: 15px;">
    <h1> Edit User </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" class="form-control" id="ImputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ $user->name }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please, enter name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputSurname">Surname</label>
                    <input type="surname" class="form-control" id="exampleInputSurname" aria-describedby="emailSurname" 
                    placeholder="Enter Surname" name="surname" value="{{ $user->surname }}" required>
                    <small id="SurnameHelp" class="form-text text-muted">Please, enter surname.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                    placeholder="Enter email" name="email" value="{{ $user->email }}" required>
                    <small id="emailHelp" class="form-text text-muted">Please, enter email.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputRole">Roles</label>
                <select class="form-control" id="exampleInputRole" name="role">
                    <option value="{{$user->role}}">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                <small id="roleHelp" class="form-text text-muted">Please enter a role.</small><br>
                <img src="{{ Storage::url($user->img_path) }}" alt="Current Image" width="50" height="50">
                </div>
                    <div class="d-flex justify-content-left">
                        <div class="btn btn">
                            <label for="formFileDisabled" class="form-label">Choose file</label>
                            <input class="form-control" type="file" name="image" id="image" value="{{ old('image')}}"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer/>