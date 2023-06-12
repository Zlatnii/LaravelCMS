<x-header/>
<body style="margin-left: 15px;">
    <h1> Edit Page </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;"> 
            <form action="{{ route('pages.update', $pages->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="TitleHelp" 
                    placeholder="Enter Title" name="title" value="{{ $pages->title }}" required>
                    <small id="TitleHelp" class="form-text text-muted">Please enter a title.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Subtitle</label>
                    <input type="text" class="form-control" id="exampleInputSubitle" aria-describedby="SubitleHelp" 
                    placeholder="Enter Subitle" name="subtitle" value="{{ $pages->subtitle }}" required>
                    <small id="SubitleHelp" class="form-text text-muted">Please enter a subtitle.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Content</label>
                    <textarea class="form-control" id="exampleInputContent" aria-describedby="ContentHelp" 
                    placeholder="Enter Content" name="content" value="{{ $pages->content }}" required>{{$pages->content}}</textarea>
                    <small id="ContentHelp" class="form-text text-muted">Please enter a content.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Slug</label>
                    <input type="text" class="form-control" id="exampleInputPassword" aria-describedby="SlugHelp" 
                    placeholder="Enter Slug" name="slug" value="{{ $pages->slug }}" required>
                    <small id="SlugHelp" class="form-text text-muted">Please enter a slug.</small>
                </div>
                <img src="{{ Storage::url($pages->img_path) }}" alt="Current Image" width="50" height="50">
                </div>
                    <div class="d-flex justify-content-left">
                        <div class="btn btn">
                            <label for="formFileDisabled" class="form-label">Choose file</label>
                            <input class="form-control" type="file" name="image" id="image" value="{{ old('image')}}"/>
                        </div>
                    </div>
                </div>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer/>