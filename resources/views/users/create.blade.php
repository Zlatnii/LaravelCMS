<x-header/>
<body style="margin-left: 15px;">
    <h1> Add User </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ old('name') }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please enter a name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputSurname">Surname</label>
                    <input type="text" class="form-control" id="exampleInputSurname" aria-describedby="SurnameHelp" 
                    placeholder="Enter Surname" name="surname" value="{{ old('surname') }}" required>
                    <small id="SurnameHelp" class="form-text text-muted">Please enter a surname.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="EmailHelp" 
                    placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                    <small id="EmailHelp" class="form-text text-muted">Please enter an email.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="PasswordHelp" 
                    placeholder="Enter password" name="password" value="{{ old('password') }}" required>
                    <small id="PasswordHelp" class="form-text text-muted">Please enter an password.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword" aria-describedby="PasswordHelp" 
                    placeholder="Confirm password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    <small id="PasswordHelp" class="form-text text-muted">Please confirm password.</small>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputRole">Roles</label>
                <select class="form-control" id="exampleInputRole" name="role">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <small id="roleHelp" class="form-text text-muted">Please enter a role.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Choose Image</label>
                    <input type="file" class="form-control" id="exampleInputImage" name="image" nullable>
                </div>
                <br>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer/>
