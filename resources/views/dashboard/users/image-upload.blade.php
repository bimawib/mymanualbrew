


@extends('dashboard.layouts.main')

@section('container')
<div class="kosong">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-center">Upload Profile Picture</h1>
    </div>
</div>
<div class="col-lg-8">


<x-cld-upload-button>
Upload Files
</x-cld-upload-button>

<script>
    const title = document.querySelector('.mb-3 #title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/post/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection