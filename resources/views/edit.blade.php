<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
    crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <tbody>
        <form>
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="name" class="form-control" id="ImputName" aria-describedby="NameHelp" 
                placeholder="Enter Name">
                <small id="NameHelp" class="form-text text-muted">Please, enter name.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputSurname">Surname</label>
                <input type="surname" class="form-control" id="exampleInputSurname" aria-describedby="emailSurname" 
                placeholder="Enter Surname">
                <small id="SurnameHelp" class="form-text text-muted">Please, enter surname.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Please, enter email.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputRole">Roles</label>
                <input type="role" class="form-control" id="exampleInputRole" aria-describedby="RoleHelp" 
                placeholder="Enter role">
                <small id="roleHelp" class="form-text text-muted">Please, enter Role.</small>
            </div>
                <div class="d-flex justify-content-left">
                    <div class="btn btn-primary btn-rounded">
                        <label class="form-label" for="editImage">Choose file</label>
                        <input type="file" class="form-control" id="editImage" />
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </tbody>
</body>
</html>