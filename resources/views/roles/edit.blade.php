<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
    crossorigin="anonymous">
    <title>Edit User</title>
</head>
<body style="margin-left: 15px;">
    <h1> Edit User </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" class="form-control" id="ImputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ $role->name }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please, enter name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputRole">Slug</label>
                    <input type="role" class="form-control" id="exampleInputRole" aria-describedby="RoleHelp" 
                    placeholder="Enter role" name="slug" value="{{ $role->slug }}">
                    <small id="RoleHelp" class="form-text text-muted">Please, enter slug.</small>
                <br>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>