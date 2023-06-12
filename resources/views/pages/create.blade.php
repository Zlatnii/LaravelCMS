<x-header/>
<body style="margin-left: 15px;">
    <h1> Add Page </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="TitleHelp" 
                    placeholder="Enter Title" name="title" value="{{ old('title') }}" required>
                    <small id="TitleHelp" class="form-text text-muted">Please enter a title.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Subtitle</label>
                    <input type="text" class="form-control" id="exampleInputSubitle" aria-describedby="SubitleHelp" 
                    placeholder="Enter Subitle" name="subtitle" value="{{ old('subtitle') }}" required>
                    <small id="SubitleHelp" class="form-text text-muted">Please enter a subtitle.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Content</label>
                    <textarea class="form-control" id="exampleInputContent" aria-describedby="ContentHelp" 
                    placeholder="Enter Content" name="content" value="{{ old('content') }}" required></textarea>
                    <small id="ContentHelp" class="form-text text-muted">Please enter a content.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Slug</label>
                    <input type="text" class="form-control" id="exampleInputPassword" aria-describedby="SlugHelp" 
                    placeholder="Enter Slug" name="slug" value="{{ old('slug') }}">
                    <small id="SlugHelp" class="form-text text-muted">Please enter a slug.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Choose Image</label>
                    <input type="file" class="form-control" id="exampleInputImage" name="image" nullable>
                </div>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer/>