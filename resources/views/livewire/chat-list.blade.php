<div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card chat-app">

                <!-- LEFT CHAT -->
                <div id="plist" class="people-list">

                    <!-- SEARCH BAR -->
                    {{-- <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div> --}}

                    @livewire('user-search-bar', ['context'=> 'chat-list'])

                    @if(!empty($conversations))

                    <!-- USER CHAT LIST -->
                    <ul class="list-unstyled chat-list mt-2 mb-0">

                        @foreach($conversations as $conversation)

                        @php
                            $chat = $conversation->sender;

                            if($conversation->sender->id == auth()->user()->id)
                            {
                                $chat = $conversation->receiver;
                            }
                        @endphp

                        <li class="clearfix">

                            <!-- USER PROFILE PICTURE-->
                            @if(preg_match('/^https/', $chat->profile_pic))
                            <img src="{{$chat->profile_pic}}" alt="avatar">
                            @else
                            <img src="{{ asset($chat->profile_pic) }}" alt="avatar">
                            @endif

                            <div class="about">
                                <div class="name">{{$chat->name}}</div>
                                <!-- <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div> -->
                            </div>

                        </li>

                        @endforeach

                    </ul>

                    @else

                    @endif

                </div>

                <!-- MESSAGES BOX -->
                <div class="chat">

                    <!-- CHAT HEADER -->
                    <div class="chat-header clearfix">
                        <div class="row">

                            <!-- LEFT CHAT HEADER -->
                            <div class="col-lg-6">
                                <!-- LINK TO PROFILE -->
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h4 class="m-b-0">Aiden Chavez</h4>
                                    <!-- <small>Last seen: 2 hours ago</small> -->
                                </div>
                            </div>

                            <!-- RIGHT CHAT HEADER -->
                            <!-- <div class="col-lg-6 text-end">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                        class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                        class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                        class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                        class="fa fa-question"></i></a>
                            </div> -->

                        </div>
                    </div>

                    <!-- MESSAGES -->
                    <div class="chat-history">
                        <ul class="m-b-0">
                            <li class="clearfix">
                                <!--- <div class="message-data text-end">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div> -->
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the
                                    project coming
                                    along? </div>
                            </li>

                            <li class="clearfix">
                                <!-- <div class="message-data">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                </div> -->
                                <div class="message my-message">Are we meeting today?</div>
                            </li>
                        </ul>
                    </div>

                    <!-- MESSAGE INPUT -->
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                            <input type="text" class="form-control" placeholder="Enter text here...">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7;
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea;
        }

        .people-list {
            transition: .5s;
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px;
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer;
        }

        .people-list .chat-list li.active {
            background: #efefef;
        }

        .people-list .chat-list li .name {
            font-size: 15px;
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%;
        }

        .people-list img {
            float: left;
            border-radius: 50%;
        }

        .people-list .about {
            float: left;
            padding-left: 8px;
        }

        .people-list .status {
            color: #999;
            font-size: 13px;
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6;
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px;
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px;
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff;
        }

        .chat .chat-history ul {
            padding: 0;
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px;
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0;
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px;
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px;
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px;
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative;
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px;
        }

        .chat .chat-history .my-message {
            background: #efefef;
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px;
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right;
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%;
        }

        .chat .chat-message {
            padding: 20px;
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle;
        }

        .online {
            color: #86c541;
        }

        .offline {
            color: #e47297;
        }

        .me {
            color: #1d8ecd;
        }

        .float-right {
            float: right;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none;
            }

            .chat-app .people-list.open {
                left: 0;
            }

            .chat-app .chat {
                margin: 0;
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0;
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto;
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto;
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto;
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto;
            }
        }
    </style>
</div>