<div class="relative" id="outer">
    {{-- <input id="searchBar" type="text" class="form-input" placeholder="Search User..." wire:model="search"/> --}}

    <div class="input-group">
        <input class="form-input py-2 border-right-0 border" type="search" placeholder="Search user..."
            wire:model="search" />
        <span class="input-group-append">
            <div class="input-group-text bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="28" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </div>
        </span>
    </div>

    @if(!empty($search))
        <div class="absolute z-50 w-full bg-white rounded shadow-lg max-h-48 overflow-y-auto">
            @if(count($result) != 0)
                @foreach($result as $user)
                    <!-- USING POST REQUEST CAUSE GET REQUEST FELT LIKE NOT SAFE ENOUGH -->
                    @if($context == 'app')
                    <p class="list-item result-p" onclick="submitUser( {{ $user['id'] }} )">{{ $user['name'] }}</p>
                    @elseif($context == 'chat-list')
                    <p class="list-item result-p" wire:click="createConversation({{$user['id']}})">{{ $user['name'] }}</p>
                    @endif
                @endforeach
            @else
                <div class="list-item">User not found</div>
            @endif
        </div>
    @endif

    <style>

        .relative {
            position: relative;
            display: inline-block;
            z-index: 1;
        }
    
        .absolute {
            position: absolute;
            top: 100%;
            /* Position it below the search input */
            left: 0;
            z-index: 10;
        }
    
        .w-full {
            width: 100%;
        }
    
        .mt-2 {
            margin-top: 0.5rem;
            /* Adjust the margin top according to your preference */
        }
    
        .rounded {
            border-radius: 0.25rem;
            /* Adjust the border radius according to your preference */
        }
    
        .shadow-lg {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            /* Adjust the shadow styles according to your preference */
        }
    
        .overflow-y-auto {
            overflow-y: auto;
            /* Enable vertical scrolling if necessary */
        }
    
        .list-item {
            padding: 0.5rem 1rem;
            /* Adjust the padding according to your preference */
        }
    
        .max-h-48 {
            max-height: 12rem;
            /* Adjust the height as per your preference */
        }
    
        .result-p {
            /* Add your existing styles for the list item here */
    
            /* Set initial background color */
            background-color: transparent;
            transition: background-color 0.3s; /* Add smooth transition effect */
            margin-bottom: 0;
        }
    
        .result-p:hover {
            /* Apply highlight color on hover */
            /* background-color: #ADD8E6;  */
            background-color: #E5F3FD;
        }
    </style>
    
    <script>
    
        function submitUser(id){
    
            // Create a form element
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/view_user';
    
            // Create a hidden input field to hold the student ID
            var studentIdInput = document.createElement('input');
            studentIdInput.type = 'hidden';
            studentIdInput.name = 'id';
            studentIdInput.value = id;
    
            // Append the input field to the form
            form.appendChild(studentIdInput);
    
            // Set the CSRF token value if needed
            var csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                var csrfTokenInput = document.createElement('input');
                csrfTokenInput.type = 'hidden';
                csrfTokenInput.name = '_token';
                csrfTokenInput.value = csrfToken.content;
                form.appendChild(csrfTokenInput);
            }
    
            // Append the form to the document body
            document.body.appendChild(form);
    
            // Submit the form
            form.submit();
        }
    
    </script>
</div>