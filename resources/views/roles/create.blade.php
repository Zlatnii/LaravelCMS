<x-header/>
<body style="margin-left: 15px;">
    <h1> Add Role </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp" 
                    placeholder="Enter Name" name="name" value="{{ old('name') }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please enter a role name.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Slug</label>
                    <input type="text" class="form-control" id="exampleInputPassword" aria-describedby="SlugHelp" 
                    placeholder="Enter Slug" name="slug" value="{{ old('slug') }}" required>
                    <small id="SlugHelp" class="form-text text-muted">Please enter a slug.</small>
                </div>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer/>