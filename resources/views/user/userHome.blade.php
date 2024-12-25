@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

<!-- CREATE POST COMPONENT -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    {{-- <div>{{$errors->first('content')}}</div> --}}
                    @if($errors->any())
                    <div id="alert" class="alert alert-warning" role="alert">
                        Please write something before posting !
                    </div>
                    @endif

                    <!-- NORMAL MAKE POST (ONLY POST) -->
                    <form action="/create_post" method="POST">
                        @csrf
                        <textarea class="form-control custom-input" placeholder="Share what's on your mind here !"
                            style="resize: none" name="content"></textarea>
                        <div class="mt-3 clearfix">
                            <button class="btn float-end" style="background-color: #B3DFF2" type="submit">
                                <i class="fa fa-pencil fa-fw"></i>
                                Share
                            </button>
                        </div>
                    </form>

                    <!-- CAMERA ICON FOR USER TO ADD IMAGE IN THEIR POST -->
                    <a class="btn btn-sm btn-icon fa fa-camera add-tooltip" data-bs-toggle="modal"
                        href="#createPostModal"></a>

                    <!-- IMAGE WORD CREATE POST MODAL -->
                    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header d-flex justify-content-center align-items-center">
                                    <h5 class="modal-title text-center" style="color: black">Create post</h5>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button> --}}
                                </div>

                                <div class="modal-body">
                                    <form action="/create_post" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <textarea class="form-control"
                                                placeholder="Share what's on your mind here !" style="resize: none"
                                                name="content" id="modalContentInput"></textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <input type="file" accept=".jpg, .png" name="picture" class="form-control">
                                        </div>
                                        <!-- <div class="mt-3 clearfix">
                                            <button type="submit" class="btn btn-primary w-100" id="modalPostButton"
                                                disabled>POST</button>
                                        </div> -->

                                        <span class="mt-3 clearfix" id="PostWrapper" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Please write something or insert an image before posting !">">
                                            <button class="btn btn-primary w-100" id="modalPostButton" type="submit" disabled>POST</button>
                                        </span>

                                    </form>
                                </div>



                                {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-primary w-100">Save changes</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@livewire('post-component', ['posts'=> $posts, 'post_size' => 'col-md-6'])

<style>
    .custom-input {
        /* Add your custom styles here */
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 5px;
        color: #333;
        /* Add any other styles you want */
    }
</style>

<script>
    // INITIALIZE TOOLTIPS
    // const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    // tooltipTriggerList.map(function (tooltipTriggerEl) {
    //     return new bootstrap.Tooltip(tooltipTriggerEl);
    // });

    setTimeout(function() {
        var alertElement = document.getElementById('alert');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }, 3000);

    // const modal = document.getElementById('createPostModal');

    // modal.addEventListener('shown.bs.modal', function() {
    //     const textarea = document.querySelector('textarea[id="modalContentInput"]');
    //     const pictureInput = document.querySelector('input[name="picture"]');
    //     const submitButton = document.querySelector('button[id="modalPostButton"]');
    //     const submitButtonContainer = document.getElementById('PostWrapper');

    //     const handleInputChange = function() {
    //         const isContentValid = textarea.value.trim().length > 0;
    //         const isPictureValid = pictureInput.files.length > 0;

    //         submitButton.disabled = !(isContentValid || isPictureValid);

    //         if(submitButton.disabled){
    //             submitButtonContainer.setAttribute('data-bs-toggle', 'tooltip');
    //             submitButtonContainer.setAttribute('data-bs-title', 'Disabled tooltip');
    //             console.log("add tool")
    //         } else {
    //             submitButtonContainer.removeAttribute('data-bs-toggle');
    //             submitButtonContainer.removeAttribute('data-bs-title');
    //             console.log('not adding');
    //         }
    //     };

    //     textarea.addEventListener('input', handleInputChange);
    //     pictureInput.addEventListener('change', handleInputChange);
    // });

    const modal = document.getElementById('createPostModal');

    modal.addEventListener('shown.bs.modal', function () {
        const textarea = document.querySelector('textarea[id="modalContentInput"]');
        const pictureInput = document.querySelector('input[name="picture"]');
        const submitButton = document.querySelector('button[id="modalPostButton"]');
        const submitButtonContainer = document.getElementById('PostWrapper');
        let tooltipInstance = new bootstrap.Tooltip(submitButtonContainer);

        const handleInputChange = function () {
            const isContentValid = textarea.value.trim().length > 0;
            const isPictureValid = pictureInput.files.length > 0;
            const isButtonDisabled = !(isContentValid || isPictureValid);

            submitButton.disabled = isButtonDisabled;

            if (isButtonDisabled) {
                if (!tooltipInstance) {
                    tooltipInstance = new bootstrap.Tooltip(submitButtonContainer);
                }
            } else {
                if (tooltipInstance) {
                    tooltipInstance.dispose();
                    tooltipInstance = null;
                }
            }
        };

        textarea.addEventListener('input', handleInputChange);
        pictureInput.addEventListener('change', handleInputChange);
    });
</script>

@endsection