<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff"> -->

    <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
    

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/testJobProduction.css')}}">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/testProduct.css')}}">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/timelineProduction.css')}}">
    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/domModals.css')}}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- <script>

        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.csrfToken = "{{ csrf_token() }}";

    </script> -->

    <!-- DATETIMEPICKER -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/datepicker.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/magic-mouse.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script type="text/javascript" src="{{secure_asset('/js/echo.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('/js/pushertest.min.js')}}"></script> -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <title>Agoratekton | Timeline</title>
</head>
<body id="body" onload="loginn()">
    @include('layouts.domModals')

    <div id="messagingIframeContainer">
        <div id="messagingExitButtoncontainer">
            <div id="messagingExitButton" class="fa fa-remove"></div>
        </div>
        <iframe id="messagingIframe" src="/chatify" frameborder="0"></iframe>
    </div>

    <div id="mountainBG2"><img width="100%" src="{{secure_asset('/images/topo7c.png')}}" alt=""></div>
    <div id="mountainBG"><img width="100%" src="{{secure_asset('/images/topo7a.png')}}" alt=""></div>

    @include('layouts.menu')

    <div id="lines"></div>
    <div id="black" onclick="clickBlack(this)">
        <div id="blackLeft"></div>
        <div id="blackRight"></div>
        <div id="blackMiddle"></div>
    </div>

    @include('layouts.navBar')

    <div id="dashboardContainer">
        <div id="dashboardWrapper">
            <div id="dashboardWrapperB">
                <div id="dashboardWrapperFiller1"></div>
                <div id="dashboardWrapperC">
                    <div id="dashboardWindowFiller"></div>
                    <div id="dashboardWindowFiller2"></div>
                    <div id="dashboardWindow">
                        <div id="dashboardTitle">
                            <p>Dashboard</p>
                            <div id="dashboardMinimize">
                                <div class="fa fa-eye" style="pointer-events: all" onclick="hideDashboard()"></div>
                                <div class="fa fa-eye-slash" style="pointer-events: all; display: none;" onclick="unhideDashboard()"></div>
                            </div>
                        </div>
                        <div id="dashboardDate">
                            <span id='dashboardTime'></span>
                        </div>
                        <div id="tasksMeeetingsContracts">
                            <div id="dashboardTasksContainer">
                                <p id="tasksTitle">Tasks today</p>
                                <div id="tasksContent">
                                    <div id="tasksPlaceholder">no tasks today.</div>
                                    <div class="taskNormal">
                                        <p>•Set meeting with supplier</p>
                                        <div class="taskButtonWrapper">
                                            <i class="fa fa-check taskButton" onclick="removeTaskCheck(this)"></i>
                                            <i class="fa fa-remove taskButton2" onclick="removeTaskCross(this)"></i>
                                        </div>
                                    </div>
                                    <div class="taskNormal">
                                        <p>•Site visit</p>
                                        <div class="taskButtonWrapper">
                                            <i class="fa fa-check taskButton" onclick="removeTaskCheck(this)"></i>
                                            <i class="fa fa-remove taskButton2" onclick="removeTaskCross(this)"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="dashboardMeetingsContainer">
                                <p id="meetingsTitle">Meetings</p>
                                <div id="meetingsContents">
                                    <div id="meetingsPlaceholder">no meetings.</div>
                                   
                                    @foreach($meetings->where('caller_id', Auth::user()->id)->sortByDesc('id') as $meeting)
                                        <div id="meetingsContent">•{{$meeting->meetingdate}} - {{$meeting->receiver_name}}</div>
                                    @endforeach

                                    @foreach($meetings->where('receiver_id', Auth::user()->id)->sortByDesc('id') as $meeting)
                                        <div id="meetingsContent">•{{$meeting->meetingdate}} - {{$meeting->caller_name}}</div>
                                    @endforeach
                             
                                </div>
                            </div>
                            <div id="dashboardContractsContainer">
                                <p id="contractsTitle">Ongoing Contracts</p>
                                <div id="contractsContents">
                                    <div id="contractsPlaceholder">no contracts yet.</div>
                                    <!-- <div id="contractsContent">•archi1 - project contract</div> -->
                                    <!-- <div id="contractsContent">•supplier1 - product contract</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="dashboardWrapperFiller2"></div>
            </div>
        </div>
        <div id="dashboardFiller1"></div>
        <div id="dashboardFiller2">
            <div id="filterWrapperB">
                <div id="filterWrapperFiller2"></div>
                <div id="filterWrapperC">
                    <div id="filterWindowFiller"></div>
                    <div id="filterWindowFiller2"></div>
                    <div id="filterWindow">
                        <div id="filterTitle">
                            <p>Sort</p>
                            <div id="filterMinimize">
                                <div class="fa fa-eye" style="pointer-events: all" onclick="hideFilter()"></div>
                                <div class="fa fa-eye-slash" style="pointer-events: all; display: none;" onclick="unhideFilter()"></div>
                            </div>
                        </div>
                        <div class="magic-hover magic-hover__square filterButtons filterButtonsSelected" id="filterLatest" onclick="sortByDate()">Latest</div>
                        <div class="magic-hover magic-hover__square filterButtons" id="filterLikes" onclick="sortByLikes()">Most likes</div>
                        <div class="magic-hover magic-hover__square filterButtons" id="filterComments" onclick="sortByComments()">Most commented</div>
                        <div class="magic-hover magic-hover__square filterButtons" id="filterStars" onclick="sortByRating()">Highest Rated</div>
                    </div>
                </div>
                <div id="filterWrapperFiller1"></div>
            </div>
        </div>
    </div>

    <div id="info"></div>
    
    <div id="spacer"></div>

    <div id="controls">
        <div id="searchBar">
            <h3 id="searchBarLabel">Search all:</h3>
            <div id="searchBarWrapper">
                <button class="fa fa-search" id="searchButton"></button>
                <input type="text" id="searchBarInput" class="magic-hover magic-hover__square" placeholder="  here" onkeyup="searchFunction()">
            </div>
        </div>
        <div id="jobsProjectsSuppliers">
            <h4 class="magic-hover magic-hover__square jps jpsSelect" id="jpsAll">All</h4>
            <h4 class="magic-hover magic-hover__square jps jpsSelect" id="jpsJobs">Jobs</h4>
            <h4 class="magic-hover magic-hover__square jps jpsSelect" id="jpsProjects">Projects</h4>
            <h4 class="magic-hover magic-hover__square jps jpsSelect" id="jpsSuppliers">Suppliers</h4>
        </div>
    </div>
    <div id="spacer"></div>
    @if(Auth::user()->role_id === 1)
        <div onclick="createJob()" id="createJob" class="createPost fa fa fa-pencil-square-o">Post a job</div>
    @elseif(Auth::user()->role_id === 2)
        <div onclick="showcaseyourproject()" id="createProject" class="createPost fa fa fa-pencil-square-o">Showcase your project!</div>
    @else
        <div onclick="createProduct()" id="createProduct" class="createPost fa fa fa-pencil-square-o">Post a product.</div>
    @endif
    <div id="spacer"></div>

<!-- CONTENT (ALL)--------------------------------------------------------------------------------------------------------------- -->

    <div id="contentAll">

        <!-- <div class="newPostBox magic-hover magic-hover__square"><a href="/timeline">Post created! View your post here.</a></div>
        <div class="spacer2"></div> -->

        @foreach($posts->sortByDesc('created_at') as $post)

<!-- PROJECT ----------------------------------------------------------------------------------------------------------------- -->

            @if($post->post_type_id === 1)
            @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)
            <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                <p>Hidden Post</p>
                <div class="hamburgerContainer">
                    <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <div class="hamburgerMenuContainer">
                        <div class="hamburgerMenu" style="height: 50px !important;">
                            <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display: none;" class="contentBoxProject" data-postType="projectAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">

            @else

            <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                <p>Hidden Post</p>
                <div class="hamburgerContainer">
                    <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <div class="hamburgerMenuContainer">
                        <div class="hamburgerMenu" style="height: 50px !important;">
                            <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-id="{{$post->id}}" class="contentBoxProject" data-postType="projectAll" data-comments="{{$post->commentCount}}" data-title="{{$post->posttitle}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">

            @endif
            
                <div class="contentTitle magic-hover magic-hover__square">
                    <div class="projectTitle">
                        <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="projectBadge">project</span></h3>
                        <div class="hamburgerContainer">
                            <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            <div class="hamburgerMenuContainer">
                                <div class="hamburgerMenu">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" data-photo1="{{$post->photo1}}" data-photo2="{{$post->photo2}}" data-photo3="{{$post->photo3}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                        <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                    @else
                                        <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                        <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="psubtitle">
                        <div class="posterDetails">
                            @foreach($post->users as $user)
                                @if($user->id === Auth::user()->id)
                                    <h6 class="posterName">by: You</h6>
                                @else
                                    <h6 class="posterName">by: {{$user->name}}</h6>
                                @endif
                                <h6 class="posterRating">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h6>
                            @endforeach
                        </div>
                        <!-- <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6> -->
                        <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                    </div>
                </div>

                <div class="contentBoxContainer">
                    <div class="projectInfo">
                        <div class="pInfo">
                            <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="projectBadge">project</span></h1>
                            <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                            <div class="statWrap">
                                <div>
                                    <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                </div>
                                <div>
                                    <p>&#xf06e 0</p>
                                </div>
                                <div>
                                    <p>&#xf075 {{$post->commentCount}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPic(this)" onmouseover="picHover(this)" onmouseout="picOut(this)" class="contentPic" data-coverPic="{{$post->coverPhoto}}" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'></div>
                    <div class="architecInfo">
                        <div class="aInfo">
                        @foreach($post->users as $user)
                            <h1 class="aInfoName">{{$user->name}}<span class="projectBadge">architect</span></h1>
                            <div class="recommendWrap">
                                <h3 class="recommendRating fa">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h3>
                            </div>
                        @endforeach
                            <div class="contactWrap">
                                <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="mainContentBoxJob"></div>
                </div>

                <div class="contentPicSpacer"></div>

                <div class="contentPicSmall">
                    <div data-id='{{$post->id}}' data-thisPhoto1='a'  onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo1}}" class="contentPicSmalls1 magic-hover magic-hover__square" style='background: url("{{$post->photo1}}") no-repeat; background-size: cover; background-position:center;'></div>
                    <div data-id='{{$post->id}}' data-thisPhoto2='a'  onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo2}}" class="contentPicSmalls2 magic-hover magic-hover__square" style='background: url("{{$post->photo2}}") no-repeat; background-size: cover; background-position:center;'></div>
                    <div data-id='{{$post->id}}' data-thisPhoto3='a' onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo3}}" class="contentPicSmalls3 magic-hover magic-hover__square" style='background: url("{{$post->photo3}}") no-repeat; background-size: cover; background-position:center;'></div>
                </div>

                <div class="contentJobComments">
                    <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                    <div class="commentsPlaceholder">no comments yet.</div>

                        @foreach($post->comments->sortByDesc('created_at') as $comment)
                            @foreach($users as $user)
                                @if($comment->user_id === $user->id)
                                   
                                    <div class="contentJobCommentsWindowCommentWrapper">
                                        <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                      
                                        <div class="contentJobCommentsWindowComment">
                                            <div class="commentName">
                                                <strong>
                                                    @if($user->id === Auth::user()->id)
                                                    You
                                                    @else
                                                    {{$user->name}}
                                                    @endif
                                                </strong>: 
                                            </div>
                                       
                                            <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                            <div class="commentButtons">
                                                @if($user->id === Auth::user()->id)
                                                    <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                @endif
                                                @foreach($post->users as $postuser)
                                                    @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                        <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                  
                                @endif
                            @endforeach 
                        @endforeach
                    </div>
                    
                    <div class="contentJobCommentsInput magic-hover magic-hover__square">
                        <p class="commentWord">comment:</p>
                        <input class="contentJobCommentsInputMain" placeholder="say something.">
                        <div class="contentJobCommentsInputSend">
                            <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                        </div>
                    </div>
                </div>

                <div class="contentButtonsJob">
                    <div class="loveWrapJob magic-hover magic-hover__square">
                        @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                        @else
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                        @endif
                        <span>{{$post->likeCount}}</span>
                    </div>
                    <div class="commentWrapJob magic-hover magic-hover__square">
                        <i class="comment fa fa-comment-o"></i>
                        <span>{{$post->commentCount}}</span> 
                    </div>  
                    <div class="callWrapJob magic-hover magic-hover__square">
                        @foreach($post->users as $user)
                            @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callProject fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                            @else
                                <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                            @endif
                            </div>
                    <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapProject magic-hover magic-hover__square">
                            @endforeach
                    <i class="messageIcon fa fa-envelope-o"></i>
                    </div>
                </div>
            </div>
            <div class="spacer2" data-postType="projectAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            "></div>

<!-- JOB----------------------------------------------------------------------------------------------------------------- -->

        @elseif($post->post_type_id === 2)

            @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)

            <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                <p>Hidden Post</p>
                <div class="hamburgerContainer">
                    <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <div class="hamburgerMenuContainer">
                        <div class="hamburgerMenu" style="height: 50px !important;">
                            <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: none;" class="contentBoxJob" data-postType="jobAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">

            @else

            <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                <p>Hidden Post</p>
                <div class="hamburgerContainer">
                    <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <div class="hamburgerMenuContainer">
                        <div class="hamburgerMenu" style="height: 50px !important;">
                            <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-id="{{$post->id}}" class="contentBoxJob" data-postType="jobAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
            @endif

                <div class="contentTitle magic-hover magic-hover__square">
                    <div class="projectTitle">
                        <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="jobBadge">job</span></h3>
                        <div class="hamburgerContainer">
                            <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            <div class="hamburgerMenuContainer">
                                <div class="hamburgerMenu">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                        <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                    @else
                                        <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                        <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="psubtitle">
                        <div class="posterDetails">
                            @foreach($post->users as $user)
                                @if($user->id === Auth::user()->id)
                                    <h6 class="posterName">by: You</h6>
                                @else
                                    <h6 class="posterName">by: {{$user->name}}</h6>
                                @endif
                                <h6 class="posterRating">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h6>
                            @endforeach
                        </div>
                        <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                    </div>
                </div>

                <div class="contentBoxContainerJob">
                    <div class="projectInfo">
                        <div class="pInfo" style="height: 200px;">
                            <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="jobBadge">job</span></h1>
                            <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                            <div class="statWrap">
                                <div>
                                    <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                </div>
                                <div>
                                    <p>&#xf06e 0</p>
                                </div>
                                <div>
                                    <p>&#xf075 {{$post->commentCount}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPicJob(this)" onmouseover="picHoverJob(this)" onmouseout="picOutJob(this)" class="contentJobFind" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'>
                        <div class="jobText">
                            <p>{{$post->summary}}</p>
                        </div>
                    </div>

                    <div class="architecInfo">
                        <div class="aInfo" style="height: 200px;">
                        @foreach($post->users as $user)
                            <h1 class="aInfoName">{{$user->name}}<span class="jobBadge">client</span></h1>
                            <div class="recommendWrap">
                                <h3 class="recommendRating fa">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h3>
                            </div>
                        @endforeach
                            <div class="contactWrap">
                                <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="mainContentBoxJob"></div>
                </div>

                <div class="contentPicSpacer"></div>

                <div class="contentJobComments">
                    <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                    <div class="commentsPlaceholder">no comments yet.</div>

                        @foreach($post->comments->sortByDesc('created_at') as $comment)
                            @foreach($users as $user)
                                @if($comment->user_id === $user->id)
                                   
                                    <div class="contentJobCommentsWindowCommentWrapper">
                                        <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                      
                                        <div class="contentJobCommentsWindowComment">
                                            <div class="commentName">
                                                <strong>
                                                    @if($user->id === Auth::user()->id)
                                                    You
                                                    @else
                                                    {{$user->name}}
                                                    @endif
                                                </strong>: 
                                            </div>
                                       
                                            <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                            <div class="commentButtons">
                                                @if($user->id === Auth::user()->id)
                                                    <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                @endif
                                                @foreach($post->users as $postuser)
                                                    @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                        <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                  
                                @endif
                            @endforeach 
                        @endforeach
                    </div>
                    
                    <div class="contentJobCommentsInput magic-hover magic-hover__square">
                        <p class="commentWord">comment:</p>
                        <input class="contentJobCommentsInputMain" placeholder="say something.">
                        <div class="contentJobCommentsInputSend">
                            <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                        </div>
                    </div>
                </div>

                <div class="contentButtonsJob">
                    <div class="loveWrapJob magic-hover magic-hover__square">
                        @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                        @else
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                        @endif
                        <span>{{$post->likeCount}}</span>
                    </div>
                    <div class="commentWrapJob magic-hover magic-hover__square">
                        <i class="comment fa fa-comment-o"></i>
                        <span>{{$post->commentCount}}</span> 
                    </div>  
                    <div class="callWrapJob magic-hover magic-hover__square">
                        @foreach($post->users as $user)
                            @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callProject fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                            @else
                                <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                            @endif
                            </div>
                    <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapProject magic-hover magic-hover__square">
                            @endforeach
                    <i class="messageIcon fa fa-envelope-o"></i>
                    </div>
                </div>
            </div>
            <div class="spacer2" data-postType="jobAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            "></div>

<!-- PRODUCT----------------------------------------------------------------------------------------------------------------- -->
                
        @elseif($post->post_type_id === 3)
            @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)
                <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: none;" class="contentBoxJob" data-postType="productAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @else

                <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contentBoxJob" data-id="{{$post->id}}" data-postType="productAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @endif

                <div class="contentTitle magic-hover magic-hover__square">
                    <div class="projectTitle">
                        <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="productBadge">product</span></h3>
                        <div class="hamburgerContainer">
                            <div data-id='{{$post->id}}' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            <div class="hamburgerMenuContainer">
                                <div class="hamburgerMenu">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                        <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                    @else
                                        <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                        <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="psubtitle">
                        <div class="posterDetails">
                            @foreach($post->users as $user)
                                @if($user->id === Auth::user()->id)
                                    <h6 class="posterName">by: You</h6>
                                @else
                                    <h6 class="posterName">by: {{$user->name}}</h6>
                                @endif
                                <h6 class="posterRating">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h6>
                            @endforeach
                        </div>
                        <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                    </div>
                </div>

                <div class="contentBoxContainerProduct">
                    <div class="projectInfo">
                        <div class="pInfo">
                            <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="productBadge">product</span></h1>
                            <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                            <div class="statWrap">
                                <div>
                                    <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                </div>
                                <div>
                                    <p>&#xf06e 0</p>
                                </div>
                                <div>
                                    <p>&#xf075 {{$post->commentCount}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPicProduct(this)" onmouseover="picHoverProduct(this)" onmouseout="picOutProduct(this)" class="contentProductFind" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'>
                        <div class="productText">
                            <p>{{$post->summary}}</p>
                        </div>
                    </div>

                    <div class="architecInfo">
                        <div class="aInfo">
                        @foreach($post->users as $user)
                            <h1 class="aInfoName">{{$user->name}}<span class="productBadge">suppier</span></h1>
                            <div class="recommendWrap">
                                <h3 class="recommendRating fa">
                                @if($user->rating === '5')
                                    &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '4')
                                    &#xf005 &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '3')
                                    &#xf005 &#xf005 &#xf005
                                @elseif($user->rating === '2')
                                    &#xf005 &#xf005
                                @elseif($user->rating === '1')
                                    &#xf005
                                @else
                                    &#xf006
                                @endif
                                </h3>
                            </div>
                        @endforeach
                            <div class="contactWrap">
                                <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="mainContentBoxProduct"></div>
                </div>

                <div class="contentPicSpacer"></div>

                <div class="contentJobComments">
                    <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                    <div class="commentsPlaceholder">no comments yet.</div>

                        @foreach($post->comments->sortByDesc('updated_at') as $comment)
                            @foreach($users as $user)
                                @if($comment->user_id === $user->id)
                                   
                                    <div class="contentJobCommentsWindowCommentWrapper">
                                        <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                      
                                        <div class="contentJobCommentsWindowComment">
                                            <div class="commentName">
                                                <strong>
                                                    @if($user->id === Auth::user()->id)
                                                    You
                                                    @else
                                                    {{$user->name}}
                                                    @endif
                                                </strong>: 
                                            </div>
                                       
                                            <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                            <div class="commentButtons">
                                                @if($user->id === Auth::user()->id)
                                                    <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                @endif
                                                @foreach($post->users as $postuser)
                                                    @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                        <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                  
                                @endif
                            @endforeach 
                        @endforeach
                    </div>
                    
                    <div class="contentJobCommentsInput magic-hover magic-hover__square">
                        <p class="commentWord">comment:</p>
                        <input class="contentJobCommentsInputMain" placeholder="say something.">
                        <div class="contentJobCommentsInputSend">
                            <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                        </div>
                    </div>
                </div>

                <div class="contentButtonsJob">
                    <div class="loveWrapJob magic-hover magic-hover__square">
                        @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                        @else
                            <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                        @endif
                        <span>{{$post->likeCount}}</span>
                    </div>
                    <div class="commentWrapJob magic-hover magic-hover__square">
                        <i class="comment fa fa-comment-o"></i>
                        <span>{{$post->commentCount}}</span> 
                    </div>  
                    <div class="callWrapJob magic-hover magic-hover__square">
                        @foreach($post->users as $user)
                            @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callProject fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                            @else
                                <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                            @endif
                            </div>
                    <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapProject magic-hover magic-hover__square">
                            @endforeach
                    <i class="messageIcon fa fa-envelope-o"></i>
                    </div>
                </div>
            </div>
            <div class="spacer2" data-postType="productAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}"  data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            "></div>

        @endif
    @endforeach

    </div>

<!-- END OF CONTENT (ALL)---------------------------------------------------------------------------------------------------- -->


<!-- CONTENT (JOBS) ----------------------------------------------------------------------------------------------------------------- -->

    <div id="contentJobs" style="display: none;" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">

        @foreach($posts as $post)
            @if($post->post_type_id === 2)

            @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)

                <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: none;" class="contentBoxJob" data-postType="jobAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @else

                <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contentBoxJob" data-id="{{$post->id}}" data-postType="jobAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">
                @endif

                    <div class="contentTitle magic-hover magic-hover__square">
                        <div class="projectTitle">
                            <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="jobBadge">job</span></h3>
                            <div class="hamburgerContainer">
                                <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                <div class="hamburgerMenuContainer">
                                    <div class="hamburgerMenu">
                                    @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                        <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                    @else
                                        <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                        <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                    @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="psubtitle">
                            <div class="posterDetails">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <h6 class="posterName">by: You</h6>
                                    @else
                                        <h6 class="posterName">by: {{$user->name}}</h6>
                                    @endif
                                    <h6 class="posterRating">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h6>
                                @endforeach
                            </div>
                            <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                        </div>
                    </div>

                    <div class="contentBoxContainerJob">
                        <div class="projectInfo">
                            <div class="pInfo" style="height: 200px;">
                                <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="jobBadge">Job</span></h1>
                                <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                                <div class="statWrap">
                                    <div>
                                        <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                    </div>
                                    <div>
                                        <p>&#xf06e 0</p>
                                    </div>
                                    <div>
                                        <p>&#xf075 {{$post->commentCount}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPicJob(this)" onmouseover="picHoverJob(this)" onmouseout="picOutJob(this)" class="contentJobFind" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'>
                            <div class="jobText">
                                <p>{{$post->summary}}</p>
                            </div>
                        </div>

                        <div class="architecInfo">
                            <div class="aInfo" style="height: 200px;">
                            @foreach($post->users as $user)
                                <h1 class="aInfoName">{{$user->name}}<span class="jobBadge">client</span></h1>
                                <div class="recommendWrap">
                                    <h3 class="recommendRating fa">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h3>
                                </div>
                            @endforeach
                                <div class="contactWrap">
                                    <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mainContentBoxJob"></div>
                    </div>

                    <div class="contentPicSpacer"></div>

                    <div class="contentJobComments">
                        <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                        <div class="commentsPlaceholder">no comments yet.</div>

                            @foreach($post->comments->sortByDesc('created_at') as $comment)
                                @foreach($users as $user)
                                    @if($comment->user_id === $user->id)
                                    
                                        <div class="contentJobCommentsWindowCommentWrapper">
                                            <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                        
                                            <div class="contentJobCommentsWindowComment">
                                                <div class="commentName">
                                                    <strong>
                                                        @if($user->id === Auth::user()->id)
                                                        You
                                                        @else
                                                        {{$user->name}}
                                                        @endif
                                                    </strong>: 
                                                </div>
                                        
                                                <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                                <div class="commentButtons">
                                                    @if($user->id === Auth::user()->id)
                                                        <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                    @endif
                                                    @foreach($post->users as $postuser)
                                                        @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                            <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    
                                    @endif
                                @endforeach 
                            @endforeach

                        </div>
                        <div class="contentJobCommentsInput magic-hover magic-hover__square">
                            <p class="commentWord">comment:</p>
                            <input class="contentJobCommentsInputMain" placeholder="say something.">
                            <div class="contentJobCommentsInputSend">
                                <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                            </div>
                        </div>
                    </div>

                    <div class="contentButtonsJob">
                        <div class="loveWrapJob magic-hover magic-hover__square">
                            @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                            @else
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                            @endif
                            <span>{{$post->likeCount}}</span>
                        </div>
                        <div class="commentWrapJob magic-hover magic-hover__square">
                            <i class="comment fa fa-comment-o"></i>
                            <span>{{$post->commentCount}}</span> 
                        </div>
                        <div class="callWrapJob magic-hover magic-hover__square">
                        @foreach($post->users as $user)
                            @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callButton callIcon fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                            @else
                                <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                            @endif
                        </div>
                        <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapJob magic-hover magic-hover__square">
                        @endforeach
                            <i class="messageIcon fa fa-envelope-o"></i>
                        </div>
                    </div>
                </div>
                <div class="spacer2" data-postType="jobAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                "></div>

            @endif
        @endforeach
    </div>


<!-- END OF CONTENT (JOBS)------------------------------------------------------------------------------------------------- -->


<!-- START OF CONTENT (PROJECTS)---------------------------------------------------------------------------------------------- -->

    <div id="contentProjects" style="display: none;" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
        @foreach($posts as $post)
            @if($post->post_type_id === 1)

                @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)
                <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="display: none;" class="contentBoxProject" data-postType="projectAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @else

                <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contentBoxProject" data-id="{{$post->id}}" data-postType="projectAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @endif

                    <div class="contentTitle magic-hover magic-hover__square">
                        <div class="projectTitle">
                            <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="projectBadge">project</span></h3>
                            <div class="hamburgerContainer">
                                <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                <div class="hamburgerMenuContainer">
                                    <div class="hamburgerMenu">
                                    @foreach($post->users as $user)
                                        @if($user->id === Auth::user()->id)
                                            <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" data-photo1="{{$post->photo1}}" data-photo2="{{$post->photo2}}" data-photo3="{{$post->photo3}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                            <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                        @else
                                            <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                            <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="psubtitle">
                            <div class="posterDetails">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <h6 class="posterName">by: You</h6>
                                    @else
                                        <h6 class="posterName">by: {{$user->name}}</h6>
                                    @endif
                                    <h6 class="posterRating">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h6>
                                @endforeach
                            </div>
                            <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                        </div>
                    </div>

                    <div class="contentBoxContainer">
                        <div class="projectInfo">
                            <div class="pInfo">
                                <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="projectBadge">project</span></h1>
                                <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                                <div class="statWrap">
                                    <div>
                                        <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                    </div>
                                    <div>
                                        <p>&#xf06e 0</p>
                                    </div>
                                    <div>
                                        <p>&#xf075 {{$post->commentCount}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPic(this)" onmouseover="picHover(this)" onmouseout="picOut(this)" class="contentPic" data-coverPic="{{$post->coverPhoto}}" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'></div>
                        <div class="architecInfo">
                            <div class="aInfo">
                            @foreach($post->users as $user)
                                <h1 class="aInfoName">{{$user->name}}<span class="projectBadge">architect</span></h1>
                                <div class="recommendWrap">
                                    <h3 class="recommendRating fa">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h3>
                                </div>
                            @endforeach
                                <div class="contactWrap">
                                    <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mainContentBox"></div>
                    </div>

                    <div class="contentPicSpacer"></div>

                    <div class="contentPicSmall">
                        <div data-id='{{$post->id}}' data-thisPhoto1='a' onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo1}}" class="contentPicSmalls1 magic-hover magic-hover__square" style='background: url("{{$post->photo1}}") no-repeat; background-size: cover; background-position:center;'></div>
                        <div data-id='{{$post->id}}' data-thisPhoto2='a'  onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo2}}" class="contentPicSmalls2 magic-hover magic-hover__square" style='background: url("{{$post->photo2}}") no-repeat; background-size: cover; background-position:center;'></div>
                        <div data-id='{{$post->id}}' data-thisPhoto3='a'  onmouseover="smallPicHover(this)" onmouseout="smallPicOut(this)" data-photo="{{$post->photo3}}" class="contentPicSmalls3 magic-hover magic-hover__square" style='background: url("{{$post->photo3}}") no-repeat; background-size: cover; background-position:center;'></div>
                    </div>

                    <div class="contentJobComments">
                        <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                        <div class="commentsPlaceholder">no comments yet.</div>

                            @foreach($post->comments->sortByDesc('created_at') as $comment)
                                @foreach($users as $user)
                                    @if($comment->user_id === $user->id)
                                    
                                        <div class="contentJobCommentsWindowCommentWrapper">
                                            <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                        
                                            <div class="contentJobCommentsWindowComment">
                                                <div class="commentName">
                                                    <strong>
                                                        @if($user->id === Auth::user()->id)
                                                        You
                                                        @else
                                                        {{$user->name}}
                                                        @endif
                                                    </strong>: 
                                                </div>
                                        
                                                <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                                <div class="commentButtons">
                                                    @if($user->id === Auth::user()->id)
                                                        <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                    @endif
                                                    @foreach($post->users as $postuser)
                                                        @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                            <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    
                                    @endif
                                @endforeach 
                            @endforeach
                        </div>
                        
                        <div class="contentJobCommentsInput magic-hover magic-hover__square">
                            <p class="commentWord">comment:</p>
                            <input class="contentJobCommentsInputMain" placeholder="say something.">
                            <div class="contentJobCommentsInputSend">
                                <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                            </div>
                        </div>
                    </div>

                    <div class="contentButtonsJob">
                        <div class="loveWrapJob magic-hover magic-hover__square">
                            @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                            @else
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                            @endif
                            <span>{{$post->likeCount}}</span>
                        </div>
                        <div class="commentWrapJob magic-hover magic-hover__square">
                            <i class="comment fa fa-comment-o"></i>
                            <span>{{$post->commentCount}}</span> 
                        </div>  
                        <div class="callWrapJob magic-hover magic-hover__square">
                            @foreach($post->users as $user)
                                @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                    <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callProject fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                                @else
                                    <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                                @endif
                                </div>
                        <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapProject magic-hover magic-hover__square">
                                @endforeach
                        <i class="messageIcon fa fa-envelope-o"></i>
                        </div>
                    </div>
                </div>
                <div class="spacer2" data-postType="projectAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                "></div>
            @endif
        @endforeach
    </div>

    
<!-- END OF CONTENT (PROJECTS)------------------------------------------------------------------------------------------------- -->


<!-- START OF CONTENT (PRODUCTS)------------------------------------------------------------------------------------------------- -->
    <div id="contentProducts" style="display: none;">

    @foreach($posts as $post)
            @if($post->post_type_id === 3)

                @if(\App\Hide::where(['post_id' => $post->id])->pluck('user_id')->first() === Auth::user()->id)
                <div class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: none;" class="contentBoxJob" data-postType="productAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @else

                <div style="display: none;" class="hiddenContentBox" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                @foreach($post->users as $user)
                    {{$user->rating}}
                @endforeach
            ">
                    <p>Hidden Post</p>
                    <div class="hamburgerContainer">
                        <div data-id='post1' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="hamburgerMenuContainer">
                            <div class="hamburgerMenu" style="height: 50px !important;">
                                <div data-id="{{$post->id}}" onclick="unhidePost(this)" class="hidePost magic-hover magic-hover__square" style="height: 100% !important;"><i class="fa fa-check hidePostIcon"></i>Unhide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contentBoxJob" data-id="{{$post->id}}" data-postType="productAll" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}" data-datee="{{$post->updated_at->timestamp}}" data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                ">

                @endif
                
                    <div class="contentTitle magic-hover magic-hover__square">
                        <div class="projectTitle">
                            <h3 class="ptitle" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="productBadge">product</span></h3>
                            <div class="hamburgerContainer">
                                <div data-id='{{$post->id}}' id="hamburger" class="hamburger hamburger--spin magic-hover__square" onclick="hamburgerOpen(this)">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                <div class="hamburgerMenuContainer">
                                    <div class="hamburgerMenu">
                                    @foreach($post->users as $user)
                                        @if($user->id === Auth::user()->id)
                                            <div onclick="updatePost(this)" data-id="{{$post->id}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-posttitle="{{$post->posttitle}}" data-summary="{{$post->summary}}" data-coverPhoto="{{$post->coverPhoto}}" class="editPost magic-hover magic-hover__square"><i class="fa fa fa-edit editPostIcon"></i>Edit</div>
                                            <div class="deletePost magic-hover magic-hover__square" onclick="deletePost(this)"  data-id="{{$post->id}}"><i class="fa fa-remove deletePostIcon"></i>Delete</div>
                                        @else
                                            <div onclick="hideThisPost(this)" data-id="{{$post->id}}" class="hidePost magic-hover magic-hover__square"><i class="fa fa-close hidePostIcon"></i>Hide</div>
                                            <div class="reportPost magic-hover magic-hover__square"><i class="fa fa-exclamation-triangle reportPostIcon"></i>Report</div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="psubtitle">
                            <div class="posterDetails">
                                @foreach($post->users as $user)
                                    @if($user->id === Auth::user()->id)
                                        <h6 class="posterName">by: You</h6>
                                    @else
                                        <h6 class="posterName">by: {{$user->name}}</h6>
                                    @endif
                                    <h6 class="posterRating">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h6>
                                @endforeach
                            </div>
                            <h6 class="postedDate">{{$post->updated_at->diffForHumans(['options' => 0])}}</h6>
                        </div>
                    </div>

                    <div class="contentBoxContainerProduct">
                        <div class="projectInfo">
                            <div class="pInfo">
                                <h1 class="pInfoName" data-id='{{$post->id}}' data-thisTitle='a'>{{$post->posttitle}}<span class="productBadge">product</span></h1>
                                <p class="pInfoBrief" data-id='{{$post->id}}' data-thisSummary='a'>{{$post->summary}}</p>
                                <div class="statWrap">
                                    <div>
                                        <p class="statHeart">&#xf004 {{$post->likeCount}}</p>
                                    </div>
                                    <div>
                                        <p>&#xf06e 0</p>
                                    </div>
                                    <div>
                                        <p>&#xf075 {{$post->commentCount}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div data-id='{{$post->id}}' data-thisCoverPhoto='a' onclick="clickPicProduct(this)" onmouseover="picHoverProduct(this)" onmouseout="picOutProduct(this)" class="contentProductFind" style='background: url("{{$post->coverPhoto}}") no-repeat; background-size: cover; background-position:center;'>
                            <div class="productText">
                                <p>{{$post->summary}}</p>
                            </div>
                        </div>

                        <div class="architecInfo">
                            <div class="aInfo">
                            @foreach($post->users as $user)
                                <h1 class="aInfoName">{{$user->name}}<span class="productBadge">supplier</span></h1>
                                <div class="recommendWrap">
                                    <h3 class="recommendRating fa">
                                    @if($user->rating === '5')
                                        &#xf005 &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '4')
                                        &#xf005 &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '3')
                                        &#xf005 &#xf005 &#xf005
                                    @elseif($user->rating === '2')
                                        &#xf005 &#xf005
                                    @elseif($user->rating === '1')
                                        &#xf005
                                    @else
                                        &#xf006
                                    @endif
                                    </h3>
                                </div>
                            @endforeach
                                <div class="contactWrap">
                                    <h3 class="hireButton">&#xf2b5 View Portfolio</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mainContentBoxProduct"></div>
                    </div>

                    <div class="contentPicSpacer"></div>

                    <div class="contentJobComments">
                        <div class="contentJobCommentsWindow magic-hover magic-hover__square" data-id="{{$post->id}}">
                        <div class="commentsPlaceholder">no comments yet.</div>

                            @foreach($post->comments->sortByDesc('created_at') as $comment)
                                @foreach($users as $user)
                                    @if($comment->user_id === $user->id)
                                    
                                        <div class="contentJobCommentsWindowCommentWrapper">
                                            <div class="contentJobCommentsWindowPic" style='background: url("{{$user->avatar}}") no-repeat; background-size: cover; background-position:center;'></div>
                                        
                                            <div class="contentJobCommentsWindowComment">
                                                <div class="commentName">
                                                    <strong>
                                                        @if($user->id === Auth::user()->id)
                                                        You
                                                        @else
                                                        {{$user->name}}
                                                        @endif
                                                    </strong>: 
                                                </div>
                                        
                                                <input disabled class="commentBody" value="{{$comment->commentbody}}" data-commentBody="{{$comment->commentbody}}"></input>

                                                <div class="commentButtons">
                                                    @if($user->id === Auth::user()->id)
                                                        <i onclick="editComment(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>
                                                    @endif
                                                    @foreach($post->users as $postuser)
                                                        @if($user->id === Auth::user()->id || $postuser->id === Auth::user()->id)
                                                            <i onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" data-id="{{$post->id}}" data-commentid="{{$comment->id}}" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    
                                    @endif
                                @endforeach 
                            @endforeach
                        </div>
                        
                        <div class="contentJobCommentsInput magic-hover magic-hover__square">
                            <p class="commentWord">comment:</p>
                            <input class="contentJobCommentsInputMain" placeholder="say something.">
                            <div class="contentJobCommentsInputSend">
                                <span onclick="sendComment(this)" data-id="{{$post->id}}" class="fa fa-send-o commentSendButton"></span>
                            </div>
                        </div>
                    </div>

                    <div class="contentButtonsJob">
                        <div class="loveWrapJob magic-hover magic-hover__square">
                            @if(\App\Like::where(['postid' => $post->id])->pluck('user_id')->first() !== Auth::user()->id)
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart-o" onclick="heartButtonClick(this)"></button>
                            @else
                                <button data-id="{{$post->id}}" class="heartButton fa fa-heart" onclick="heartButtonClick(this)"></button>
                            @endif
                            <span>{{$post->likeCount}}</span>
                        </div>
                        <div class="commentWrapJob magic-hover magic-hover__square">
                            <i class="comment fa fa-comment-o"></i>
                            <span>{{$post->commentCount}}</span> 
                        </div>  
                        <div class="callWrapJob magic-hover magic-hover__square">
                            @foreach($post->users as $user)
                                @if($user->active_status === 1 && $user->id !== Auth::user()->id)
                                    <i onclick="setCall(this)" style="margin-left: 10px; color: lightgreen; margin-left: 10px;" class="callProject fa fa-phone" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-id="{{$user->id}}" data-name="{{$user->name}}" data-userAvatar="{{$user->avatar}}" data-myAvatar="{{Auth::user()->avatar}}"></i>
                                @else
                                    <i style="color: lightgrey; opacity: .5;" class="callIcon fa fa-phone"></i>
                                @endif
                                </div>
                        <div data-id="{{$user->id}}" data-name="{{$user->name}}" onclick="openMessaging(this)" class="messageWrapProject magic-hover magic-hover__square">
                                @endforeach
                        <i class="messageIcon fa fa-envelope-o"></i>
                        </div>
                    </div>
                </div>
                <div class="spacer2" data-postType="productAll" data-id="{{$post->id}}" data-title="{{$post->posttitle}}" data-comments="{{$post->commentCount}}" data-likes="{{$post->likeCount}}"  data-datee="{{$post->updated_at->timestamp}}"  data-rating="
                    @foreach($post->users as $user)
                        {{$user->rating}}
                    @endforeach
                "></div>

            @endif
        @endforeach

    </div>

<!-- END OF CONTENT (PRODUCTS)------------------------------------------------------------------------------------------------- -->
   
    <div id="contentBoxPlaceholder" class="contentBoxPlaceholder" style="display = none;">Nothing to see here.</div>

    <div id="spacer"></div>
    <div id="spacer3"></div>

    <div id="footer">

        <div id="footerImageContainer">
            <div id="footerimage"><img width="100%" src="{{secure_asset('/images/footerimage.png')}}" alt=""></div>
        </div>

        <div id="backToTopWrapper">
            <div id="backToTopContainer">
                <div class="circular-text">
                    <span id="rotated">back to top>• agoratekton • marketplace • artisan • timeline •<</span>
                </div>

                <div class="backToTopArrow">
                    <ion-icon name="arrow-up" id="backToTopArrow" onclick="backToTop()"></ion-icon>
                </div>
            </div>
            <div id="backToTopContainer2"></div>
        </div>

        <div id="footNotesContainer">
            <div id="footerLearn">
                <p class="footerNotesTitles">Learn</p>
                <p>About</p>
                <p>Privacy Policy</p>
                <p>Terms & Conditions</p>
            </div>
            <div id="footerHelp">
                <p class="footerNotesTitles">Help</p>
                <p>FAQs</p>
                <p>Customer Support:</p>
                <p>&#xf098 (02) 7773 2500</p>
                <p>&#xf2b7 support@agoratekton.com</p>
            </div>
            <div id="footerSubscribe">
                <p class="footerNotesTitles">Newsletter</p>
                <p>Subscribe to our updates!</p>
                <input type="text" placeholder="dominicmartincruz@gmail.com"  class = "magic-hover magic-hover__square">
                <p id="footerSubscribeConfirm">&#xf2b5 confirm</p>
            </div>
        </div>
    </div>

    <script>
        var myId = "{{Auth::user()->id}}"
        var myAvatar = "{{Auth::user()->avatar}}"
        var myRoleId = "{{Auth::user()->role_id}}"
        let receiverId = '{{Auth::user()->id}}';
    </script>

<script>
    flatpickr("#dateInput", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        inline: true
    });
</script>

    <!-- TIPPY JS -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <script src="{{secure_asset('/js/circletype.min.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/magic_mouse.js')}}"></script>

    <script type="text/javascript" src="{{secure_asset('/js/domModalsProduction.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/timelineCallScript2.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/timeline3.js')}}"></script>
   
</body>
</html>