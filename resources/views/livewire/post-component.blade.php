<div>
    <!-- POST COMPONENT -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="{{$post_size}}">

                @foreach($posts as $post)

                @php
                $likes = json_decode($post->likes, true);

                //=====IF THE THE LOGGED IN USER HAS ALREADY LIKED THIS POST BEFORE=====
                if(in_array(session()->get('std_id'), $likes)) {
                $liked = 'liked';
                } else {
                $liked = '';
                }
                @endphp

                <div class="card mb-4">

                    <!-- UPPER TAG-->
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center">

                            <!-- SHOW PROFILE PICTURE -->
                            @if(preg_match('/^https/', $post->byUser->profile_pic))
                            <img src="{{$post->byUser->profile_pic}}" width="50" height="50" class="rounded-circle">
                            @else

                            {{-- @php
                            $lastSlashPos = strrpos($post->byUser->profile_pic, '\\');
                            $secondLastSlashPos = strrpos($post->byUser->profile_pic, '\\', $lastSlashPos -
                            strlen($post->byUser->profile_pic) - 1);
                            $picPath = substr($post->byUser->profile_pic, $secondLastSlashPos + 1);
                            @endphp
                            <div>{{$picPath}}</div> --}}

                            <img src="{{ asset($post->byUser->profile_pic) }}" width="50" height="50"
                                class="rounded-circle">
                            @endif

                            <!-- SHOW NAME -->
                            <div class="d-flex flex-column ms-2">
                                <span class="font-weight-bold">{{$post->byUser->name}}</span>
                                <!-- <small class="text-primary">Collegues</small>  -->
                            </div>
                        </div>
                        <!-- <div class="d-flex flex-row mt-1 ellipsis"> 
                                    <small class="mr-2">20 mins</small> 
                                    <i class="fa fa-ellipsis-h"></i> 
                                </div> -->

                        {{-- <div class="d-flex flex-row align-items-center mt-1 ellipsis">
                            <small class="me-2">20 mins</small>
                            <i class="fa fa-ellipsis-h"></i>
                        </div> --}}

                        <div class="dropdown float-end">
                            <div data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end">
                                @if(session()->get('std_id') == $post->byUser->student_id)
                                <a href="#" class="dropdown-item" id="editButton" data-bs-toggle="modal" data-bs-target="#editPostModal_{{$post->id}}">Edit</a>
                                {{-- <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#{{ hash('sha256', 'deletePostModal_' . $post->id) }}">Delete</a> --}}
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$post->id}}">Delete</a>
                                @else
                                <a href="" class="dropdown-item">Report</a>
                                @endif
                            </div>
                        </div>

                        <!-- EDIT POST MODAL -->
                        <div class="modal fade" id="editPostModal_{{$post->id}}" tabindex="-1" aria-labelledby="EditPostModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Edit Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/editPost" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="post_id" value="{{$post->id}}">

                                            <div class="row mb-3">
                                                <label for="content"><b>Caption :</b></label>
                                                <textarea class="form-control"
                                                    placeholder="Write something here to edit your post caption !" style="resize: none"
                                                    name="content" id="editModalContentInput">{{$post->content}}</textarea>
                                            </div>

                                            @if($post->file_path)
                                            <div class="row mb-3">
                                                <label for="image"><b>Uploaded image : </b></label>
                                                <img src="{{ asset($post->file_path) }}" id="oriPicture" class="img-fluid img-thumbnail" style="image-rendering: crisp-edges; object-fit: cover; width: 100%; height: 100%;">
                                                <input type="hidden" name="ori_file_path" value="{{$post->file_path}}" >
                                            </div>

                                            <div class="row mb-3">
                                                <div class="form-check form-check-reverse">
                                                    <input class="form-check-input" type="checkbox" name="noImage" value="" id="noImage">
                                                    <label class="form-check-label" for="reverseCheck1">
                                                      <b>Tick to remove image</b>
                                                    </label>
                                                  </div>
                                            </div>
                                            @endif

                                            <div class="row mb-3">
                                                <label for="picture"><b>Select image to change uploaded image : </b></label>
                                                <input type="file" accept=".jpg, .png" name="picture" class="form-control">
                                            </div>
                                            
                                            <span class="mt-3 clearfix" id="EditWrapper" tabindex="0" data-bs-toggle="tooltip" data-bs-title="Please write something or insert an image before updating !">
                                                <button class="btn btn-primary w-100" id="modalEditButton" type="submit">CONFIRM CHANGE</button>
                                            </span>
    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- DELETE POST MODAOL -->
                        @include('partials.prompt_window', [
                        'modal_id' => "deletePostModal_".$post->id,
                        'aria_label' => 'deletePostModalLabel',
                        'modal_title' => 'Delete Post',
                        'modal_body' => 'DO YOU WANT TO DELETE THIS POST ?',
                        'id' => $post->id,
                        'route_name' => "/deletePost/".$post->id
                        ])

                    </div>

                    <!-- IMAGE -->
                    @if($post->file_path)
                    <img src="{{ asset($post->file_path) }}" class="img-fluid img-thumbnail" style="image-rendering: crisp-edges; object-fit: cover; width: 100%; height: 100%;">
                    @endif

                    <div class="p-2">

                        <!-- Content -->
                        <p class="text-justify">{{$post->content}}</p>

                        <hr>

                        <!-- LIKE AND COMMENT -->
                        <div class="d-flex justify-content-between align-items-center">

                            <!-- Like button -->
                            <div class="d-flex flex-row icons d-flex align-items-center">
                                <button class="button {{$liked}}" wire:click="handleLike({{$post->id}})">
                                    <div class="hand">
                                        <div class="thumb"></div>
                                    </div>
                                    <span>Liked</span>
                                </button>
                            </div>

                            <!-- Likes count and comment -->
                            <div class="d-flex flex-row muted-color">
                                <span id="likesCount">{{ count($likes) }} likes</span>
                                <span class="ms-2">{{ count($post->comments) }} comments</span>
                            </div>

                        </div>

                        <hr>

                        <!-- COMMENT BUTTON -->
                        <div class="comments">

                            <!-- OPEN COMMENT MODAL BUTTON -->
                            <button type="button" class="btn btn-dark" style="width: 100%" data-bs-toggle="modal"
                                data-bs-target="#postModal_{{$post->id}}">Comments</button>

                            <!-- COMMENT MODAL -->
                            <div class="modal fade comment-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                                id="postModal_{{ $post->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true" wire:ignore.self>

                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title fs-5" id="postModal_{{ $post->id }}">{{
                                                $post->byUser->name }}'s postsss</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                wire:click="closeModal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <!-- UPPER TAG-->
                                            <div class="d-flex justify-content-between p-2 px-3">
                                                <div class="d-flex flex-row align-items-center">

                                                    <!-- SHOW PROFILE PICTURE -->
                                                    @if(preg_match('/^https/', $post->byUser->profile_pic))
                                                    <img src="{{$post->byUser->profile_pic}}" width="50" height="50"
                                                        class="rounded-circle">
                                                    @else

                                                    <img src="{{ asset($post->byUser->profile_pic) }}" width="50"
                                                        height="50" class="rounded-circle">
                                                    @endif

                                                    <!-- SHOW NAME -->
                                                    <div class="d-flex flex-column ms-2">
                                                        <span class="font-weight-bold">{{$post->byUser->name}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- IMAGE -->
                                            @if($post->file_path)
                                            {{-- @php
                                            $lastSlashPos = strrpos($post->file_path, '\\');
                                            $secondLastSlashPos = strrpos($post->file_path, '\\', $lastSlashPos -
                                            strlen($post->file_path) - 1);
                                            $sharedPic = substr($post->file_path, $secondLastSlashPos + 1);
                                            @endphp --}}

                                            <img src="{{ asset($post->file_path) }}" class="img-fluid img-thumbnail"
                                                style="image-rendering: crisp-edges; object-fit: cover; width: 100%; height: 100%;">
                                            @endif

                                            <div class="p-2">

                                                <!-- Content -->
                                                <p class="text-justify">{{$post->content}}</p>
                                                <hr>

                                                <!-- LIKE AND COMMENT -->
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <!-- Like button -->
                                                    <div class="d-flex flex-row icons d-flex align-items-center">
                                                        <button class="button {{$liked}}"
                                                            wire:click="handleLike({{$post->id}})">
                                                            <div class="hand">
                                                                <div class="thumb"></div>
                                                            </div>
                                                            <span>Liked</span>
                                                        </button>
                                                    </div>

                                                    <!-- Likes count and comment -->
                                                    <div class="d-flex flex-row muted-color">
                                                        <span id="likesCount">{{ count($likes) }} likes</span>
                                                        <span class="ms-2">{{ count($post->comments) }}
                                                            comments</span>
                                                    </div>

                                                </div>

                                                <hr>

                                                <div class="comments">

                                                    <!-- Comment -->
                                                    @foreach($post->comments as $comment)
                                                    <div class="d-flex flex-row mb-2">

                                                        <!-- Commentor profile image -->
                                                        @if($comment->createdByUser->profile_pic ==
                                                        'https://upload.wikimedia.org/wikipedia/commons/2/2c/Default_pfp.svg')
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Default_pfp.svg"
                                                            width="40" class="rounded-image">
                                                        @else
                                                        <img src="{{ asset($comment->createdByUser->profile_pic) }}"
                                                            width="40" class="rounded-image">
                                                        @endif

                                                        <div class="d-flex flex-column ms-2">

                                                            <!-- Commentor name -->
                                                            <span class="name">{{ $comment->createdByUser->name
                                                                }}</span>

                                                            <!-- Commentor's comment -->
                                                            <small class="comment-text">{{ $comment->comment
                                                                }}</small>

                                                            <!-- Additional information -->
                                                            <div class="d-flex flex-row align-items-center status">
                                                                <!-- <small>Like</small>
                                                                    <small>Reply</small>
                                                                    <small>Translate</small>
                                                                    <small>18 mins</small> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <!-- Comment input button -->
                                            <div class="comment-input" style="width: 100%;">
                                                <input type="text" class="form-control" id="commentInput"
                                                    wire:model="inputComment">
                                                <div class="fonts" style="margin-left: 10px;">
                                                    <div wire:click="handleComment({{$post->id}})" style="{{$style}}">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="currentColor" class="bi bi-send-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                                        </svg>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- WARNING MODAL (BACKUP)-->
                            {{-- <div class="modal fade" id="warningModal" data-bs-backdrop="static" tabindex="-1"
                                aria-labelledby="warningModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title" id="warningeModalLabel">Leave page ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to leave this page ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-danger"
                                                id="confirmCloseModal">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>

        <style>
            /* POST CSS */
            /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"); */
            .card {
                border: 1;
                border-width: 2px;
                border-color: black
            }

            .ellipsis {
                color: #a09c9c
            }

            hr {
                /* color: #a09c9c; */
                color: black;
                margin-top: 4px;
                margin-bottom: 8px
            }

            .dropdown:hover i {
                color: blue;
            }

            .muted-color {
                color: #a09c9c;
                font-size: 13px
            }

            .ellipsis i {
                margin-top: 3px;
                cursor: pointer
            }

            .icons i {
                font-size: 25px
            }

            .icons .fa-heart {
                color: red
            }

            .icons .fa-smile-o {
                color: yellow;
                font-size: 29px
            }

            .rounded-image {
                border-radius: 50% !important;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 50px;
                width: 50px
            }

            .name {
                font-weight: 600
            }

            .comment-text {
                font-size: 12px
            }

            .status small {
                margin-right: 10px;
                color: blue
            }

            .form-control {
                border-radius: 26px
            }

            .comment-input {
                position: relative
            }

            .fonts {
                position: absolute;
                right: 13px;
                top: 8px;
                color: #a09c9c
            }

            .form-control:focus {
                color: #495057;
                background-color: #fff;
                border-color: #8bbafe;
                outline: 0;
                box-shadow: none
            }

            /* FOR LIKED BUTTON  */
            .button {
                --color: #1E2235;
                --color-hover: #1E2235;
                --color-active: #fff;
                --icon: #BBC1E1;
                --icon-hover: #8A91B4;
                --icon-active: #fff;
                --background: #fff;
                --background-hover: #fff;
                /* --background-active: #362A89; */
                --background-active: #275EFE;
                --border: #E1E6F9;
                --border-active: #362A89;
                --shadow: #{rgba(#001177, .025)};
                display: block;
                outline: none;
                cursor: pointer;
                position: relative;
                border: 0;
                background: none;
                padding: 8px 20px 8px 24px;
                border-radius: 9px;
                line-height: 27px;
                font-family: inherit;
                font-weight: 600;
                font-size: 14px;
                color: var(--color);
                -webkit-appearance: none;
                -webkit-tap-highlight-color: transparent;
                transition: color .2s linear;

                &.dark {
                    --color: #F6F8FF;
                    --color-hover: #F6F8FF;
                    --color-active: #fff;
                    --icon: #8A91B4;
                    --icon-hover: #BBC1E1;
                    --icon-active: #fff;
                    --background: #1E2235;
                    --background-hover: #171827;
                    --background-active: #275EFE;
                    --border: transparent;
                    --border-active: transparent;
                    --shadow: #{rgba(#001177, .16)};
                }

                &:hover {
                    --icon: var(--icon-hover);
                    --color: var(--color-hover);
                    --background: var(--background-hover);
                    --border-width: 2px;
                }

                &:active {
                    --scale: .95;
                }

                &:not(.liked) {
                    &:hover {
                        --hand-rotate: 8;
                        --hand-thumb-1: -12deg;
                        --hand-thumb-2: 36deg;
                    }
                }

                &.liked {
                    --span-x: 2px;
                    --span-d-o: 1;
                    --span-d-x: 0;
                    --icon: var(--icon-active);
                    --color: var(--color-active);
                    --border: var(--border-active);
                    --background: var(--background-active);
                }

                &:before {
                    content: '';
                    min-width: 103px;
                    position: absolute;
                    left: 0;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    border-radius: inherit;
                    transition: background .2s linear, transform .2s, box-shadow .2s linear;
                    transform: scale(var(--scale, 1)) translateZ(0);
                    background: var(--background);
                    box-shadow: inset 0 0 0 var(--border-width, 1px) var(--border), 0 4px 8px var(--shadow), 0 8px 20px var(--shadow);
                }

                .hand {
                    width: 11px;
                    height: 11px;
                    border-radius: 2px 0 0 0;
                    background: var(--icon);
                    position: relative;
                    margin: 10px 8px 0 0;
                    transform-origin: -5px -1px;
                    transition: transform .25s, background .2s linear;
                    transform: rotate(calc(var(--hand-rotate, 0) * 1deg)) translateZ(0);

                    &:before,
                    &:after {
                        content: '';
                        background: var(--icon);
                        position: absolute;
                        transition: background .2s linear, box-shadow .2s linear;
                    }

                    &:before {
                        left: -5px;
                        bottom: 0;
                        height: 12px;
                        width: 4px;
                        border-radius: 1px 1px 0 1px;
                    }

                    &:after {
                        right: -3px;
                        top: 0;
                        width: 4px;
                        height: 4px;
                        border-radius: 0 2px 2px 0;
                        background: var(--icon);
                        box-shadow: -.5px 4px 0 var(--icon), -1px 8px 0 var(--icon), -1.5px 12px 0 var(--icon);
                        transform: scaleY(.6825);
                        transform-origin: 0 0;
                    }

                    .thumb {
                        background: var(--icon);
                        width: 10px;
                        height: 4px;
                        border-radius: 2px;
                        transform-origin: 2px 2px;
                        position: absolute;
                        left: 0;
                        top: 0;
                        transition: transform .25s, background .2s linear;
                        transform: scale(.85) translateY(-.5px) rotate(var(--hand-thumb-1, -45deg)) translateZ(0);

                        &:before {
                            content: '';
                            height: 4px;
                            width: 7px;
                            border-radius: 2px;
                            transform-origin: 2px 2px;
                            background: var(--icon);
                            position: absolute;
                            left: 7px;
                            top: 0;
                            transition: transform .25s, background .2s linear;
                            transform: rotate(var(--hand-thumb-2, -45deg)) translateZ(0);
                        }
                    }
                }

                .hand,
                span {
                    display: inline-block;
                    vertical-align: top;

                    span {
                        opacity: var(--span-d-o, 0);
                        transition: transform .25s, opacity .2s linear;
                        transform: translateX(var(--span-d-x, 4px)) translateZ(0);
                    }
                }

                &>span {
                    transition: transform .25s;
                    transform: translateX(var(--span-x, 4px)) translateZ(0);
                }
            }

            .disabled-link {
                pointer-events: none;
                color: gray;
                text-decoration: none;
                cursor: default;
            }

            /* FOR MODAL */
            .comment-modal {
                z-index: 1061 !important;
            }

            #warningModal {
                z-index: 1062 !important;
            }
        </style>

        <script>
            // var comment_Input = '';

            //=====LIKE FUNCTION=====
            document.querySelectorAll('.button').forEach(button => {
        
            button.addEventListener('click', e => {
                button.classList.toggle('liked');
            
                // // Update the like button in the modal
                // const postId = button.getAttribute('id').split('_')[1];
                // console.log('postId : ' + postId);
                // console.log(`#postModal_${postId}`);

                // const modalLikeButton = document.querySelector(`#postModal_${postId} .button`);
                // console.log('modalLikeButton : ' + modalLikeButton);
            
                // if (modalLikeButton) {
                //     console.log('here');
                //     modalLikeButton.classList.toggle('liked');
                //     // gsap.fromTo(modalLikeButton, {
                //     //     '--hand-rotate': 8
                //     // }, {
                //     //     ease: 'none',
                //     //     keyframes: [{
                //     //         '--hand-rotate': -45,
                //     //         duration: .16,
                //     //         ease: 'none'
                //     //     }, {
                //     //         '--hand-rotate': 15,
                //     //         duration: .12,
                //     //         ease: 'none'
                //     //     }, {
                //     //         '--hand-rotate': 0,
                //     //         duration: .2,
                //     //         ease: 'none',
                //     //         clearProps: true
                //     //     }]
                //     // });
                // }

                if(button.classList.contains('liked')) {
                    gsap.fromTo(button, {
                        '--hand-rotate': 8
                    }, {
                        ease: 'none',
                        keyframes: [{
                            '--hand-rotate': -45,
                            duration: .16,
                            ease: 'none'
                        }, {
                            '--hand-rotate': 15,
                            duration: .12,
                            ease: 'none'
                        }, {
                            '--hand-rotate': 0,
                            duration: .2,
                            ease: 'none',
                            clearProps: true
                        }]
                    });
                }
            })
            });

            // $(document).ready(function() {
            //     // When the first modal is shown
            //     $('.comment-modal').on('shown.bs.modal', function() {

            //         // Get the input field inside the modal
            //         const commentInput = $(this).find('#commentInput');

            //         // Add a click event handler to the close modal button
            //         $(this).find('[data-bs-dismiss="modal"]').on('click', function() {
            //             console.log('clicked closed button');
            //             console.log('comment_Input : ' + comment_Input);
                        
            //             // Check if the input field is not empty
            //             if(comment_Input.trim() !== '') {
            //                 $('#warningModal').modal('show');
            //             } else {
            //                 $(this).closest('.comment-modal').modal('hide');
            //             }
            //         });

            //         // // Add a click event handler to the modal backdrop (the area outside the modal)
            //         $('.comment-modal').on('click', function(e) {
            //             // Check if the clicked element is the modal backdrop itself (not its children)
            //             if ($(e.target).hasClass('comment-modal')) {
            //                 // Prevent the click event from propagating to the underlying elements
            //                 // e.stopPropagation();

            //                 // Show the second modal (warning)
            //                 $('#warningModal').modal('show');
            //             }
            //             // if($(e.target).hasClass('comment-modal')){
            //             //     console.log('clicked outside of comment modal')
            //             // }
            //         });
            //     });
            // });

            // document.addEventListener('livewire:load', function () {
            //     const commentInput = document.querySelector('#commentInput');
            //     comment_Input = commentInput.value;

            //     commentInput.addEventListener('input', function (event) {
            //         comment_Input = event.target.value;
            //         console.log('Input value changed: ' + comment_Input);
            //     });
                
            // });

            //=====(EDIT POST) SELECT ALL POST BASED, ADD AN CLICK EVENT, AND PERFORM JAVASCRIPT LOGIC ACCORDINLY=====
            const posts = document.querySelectorAll('#editButton[data-bs-toggle="modal"]');

            posts.forEach((post) => {
                post.addEventListener('click', function () {
                    const modalId = this.getAttribute('data-bs-target').slice(1); // GET MODAL ID
                    const modal = document.getElementById(modalId); // SELECT MODAL
                    const textarea = modal.querySelector('textarea[id="editModalContentInput"]'); // TEXT AREA INPUT CAPTION
                    const pictureInput = modal.querySelector('input[name="picture"]'); // INPUT IMAGE
                    const submitButton = modal.querySelector('button[id="modalEditButton"]'); // SUBMIT BUTTON
                    const submitButtonContainer = modal.querySelector('#EditWrapper'); // SUBMIT BUTTON CONTAINER
                    const oriPicture = modal.querySelector('img[id="oriPicture"]'); // ORIGINAL IMAGE THAT WAS UPLOADED
                    const checkbox = modal.querySelector('input[name="noImage"]'); // NO IMAGE CHECK BOX
                    let tooltipInstance = null;

                    const handleInputChange = function () {
                        const isContentValid = textarea.value.trim().length > 0;
                        const isPictureValid = pictureInput.files.length > 0;
                        let isButtonDisabled = null;

                        if(checkbox){
                            const isCheckboxChecked = checkbox.checked;

                            if(isCheckboxChecked) {
                                isButtonDisabled = !(isContentValid || isPictureValid);
                            } else {
                                isButtonDisabled = !(isContentValid || isPictureValid || oriPicture);
                            }
                        } else {
                            isButtonDisabled = !(isContentValid || isPictureValid);
                        }

                        submitButton.disabled = isButtonDisabled;

                        //=====IF THE CONFIRM CHANGES BUTTON IS DISABLED=====
                        if (isButtonDisabled) {
                            if (!tooltipInstance) {
                                tooltipInstance = new bootstrap.Tooltip(submitButtonContainer);
                            }
                        //======IF THE CONFIRM CHANGES BUTTON IS NOT DISABLED=====
                        } else {
                            if (tooltipInstance) {
                                tooltipInstance.dispose();
                                tooltipInstance = null;
                            }
                        }
                    };

                textarea.addEventListener('input', handleInputChange);
                pictureInput.addEventListener('change', handleInputChange);

                if(checkbox){
                    checkbox.addEventListener('change', handleInputChange);
                }
            });
        });

        </script>
    </div>
</div>