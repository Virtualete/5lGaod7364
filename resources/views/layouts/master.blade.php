<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>QBT | @yield('title')</title>
  
  <!-- Orbitron FONT -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron:400,700" rel="stylesheet"> 
  <!-- APP.CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- BOOTSTRAP CSS v4.1.1 -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2"><span class="navbar-toggler-icon"></span></button>
    
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <!--
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <button 
            onclick="
            

            
            
            "
            type="button" class="btn btn-outline-primary"
          >Juegos</button>
        </li>
      </ul>
      -->
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar2">
      <div class="mx-auto order-0">
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item" id="items-header">
            <a class="nav-link" href="/pellets">Pellets</a>
          </li>
          <li class="nav-item" id="items-header">
            <a class="nav-link" href="/contact">Contact
              <span class="sr-only">Home</span>
            </a>
          </li>
          <li class="nav-item" id="items-header">
            <a class="navbar-brand" href="/">
              <img class="logo-quantum" src="{{ asset('storage/logo_quantum.png') }}" alt="">
            </a>
          </li>
          <li class="nav-item" id="items-header">
                  <a class="nav-link" href="/about_us">About</a>
          </li>
          <li class="nav-item" id="items-header">
                  <a class="nav-link" href="/shop">Shop</a>
          </li>
        </ul>
      </div>
    </div>
    @guest
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('register') }}" class="btn btn-outline-primary">{{ __('Register') }}</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-outline-primary">{{ __('Login') }}</a>
        </li>
      </ul>
    </div>
    @else
    <!--<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-outline-primary">{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>-->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <div id="notification_bell" v-cloak>
          <li class="nav-item">
            <div class="dropdown"><div class="dropdown-toggle" class="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div v-if="new_notifications!==0||new_friend_requests!==0" id="notif-bell"><div v-if="new_notifications+new_friend_requests<10" id="notif-number-under-ten">@{{ new_notifications+new_friend_requests }}</div><div v-if="new_notifications+new_friend_requests>=10&&new_notifications+new_friend_requests<100" id="notif-number-under-one-hundred">@{{ new_notifications+new_friend_requests }}</div><div v-if="new_notifications+new_friend_requests>=100" id="notif-number-under-ten">∞</div></div>
            <img src="{{ asset('storage/bell.png') }}" id="bell"></div>
            <div style="margin-left:-500%" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a @click="setModalTitle('Notifications')" data-toggle="modal" data-target="#basicModal" class="dropdown-item d-flex justify-content-between">Notifications<div class="ml-5" id="dropdown-notif-number">@{{ new_notifications }}</div></a>
              <a @click="setModalTitle('Friend Requests')" data-toggle="modal" data-target="#basicModal" class="dropdown-item d-flex justify-content-between">Friend Requests<div class="ml-5" id="dropdown-notif-number">@{{ new_friend_requests }}</div></a>
            </div>
          </li>
          
          <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">@{{ modal_title }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div v-if="modal_title==='Notifications'">
                    <ul>
                      <li v-for="notification in notifications">
                        <div><!-- logo quantum --></div>
                        <div>@{{ notification.text }}</div>
                        <div>@{{ notification.created_at }}</div>
                        <hr>
                      </li>
                    </ul>
                  </div>
                  <div v-if="modal_title==='Friend Requests'">
                    <ul>
                      <li v-for="request in friend_requests">
                        <img src="{{ asset('storage/1.png') }}" class="chat-avatar">
                        <div>@{{ (_.find(users, ['id', request.transmitter_id])).username }} wants to be friends with you.</div>
                        <div>@{{ request.created_at }}</div>
                        <button @click="acceptFriendRequest(request.id)" class="btn btn-outline-primary">Accept</button>
                        <button @click="declineFriendRequest(request.id)" class="btn btn-outline-primary">Decline</button>
                        <hr>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <li class="nav-item">
          <img src="{{ asset('storage/6.png') }}" id="avatar">
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-outline-primary">{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
    @endguest
  </nav>
  
  <style>
  

*, *:before, *:after {

box-sizing: border-box;

margin: 0;

padding: 0;

}



html, body {


}



#menu-left {

z-index:2001;

position: fixed;

top: 0;

left: 0;

width: 3.5rem;

height: 100%;

background-color: rgba(25,255,185,0.5);

transition: all 300ms ease;

overflow: hidden;

z-index: 1;

box-shadow: 0px 0px 10px #333;

}

#menu-left:hover {

width: 14rem;

}

#menu-left * {

user-select: none;

}

#menu-left > ul {

display: table;

width: 14rem;

}

#menu-left > ul > li {

display: table-row;

background-color: rgba(55,55,55,0.5);

cursor: pointer;

}

#menu-left > ul > li:hover {

background: #569cf6;

}

#menu-left > ul > li:active {

background: #87b9f8;

}

#menu-left > ul > li > div {

height: 3.5rem;

line-height: 3.5rem;

display: table-cell;
color: black;

}

#menu-left > ul > li > div:nth-child(1) {

width: 3.5rem;

text-align: center;

}

#menu-left > ul > li > div:nth-child(2) {

width: 10.5rem;

text-align: left;

padding-left: 0.7rem;

}

.desktop {

position: absolute;

top: 0;

left: -100%;

width: 100%;

height: 100%;

padding: 1rem 1rem 1rem 4.5rem;

transition: all 500ms ease;

overflow: auto;

}

.desktop h1 {

margin: 1rem 0;

font-weight: 300;

}

.desktop h1:nth-child(1) {

margin-top: 0;

}

.desktop p {

font-weight: 300;

text-align: justify;

margin: 0 0 1rem 0;

}

#one {

background: radial-gradient(ellipse at bottom left, rgba(104, 128, 138, 0.4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25), rgba(42, 60, 87, 0.4)), linear-gradient(135deg, #670d10, #092756);

}

#two {

background: linear-gradient(135deg, #723362, #9d223c);

}

#three {

background: linear-gradient(135deg, #2c539e, #63967d);

}

#four {

background: linear-gradient(135deg, rgba(244, 226, 156, 0) 0%, rgba(59, 41, 58, 1) 100%), linear-gradient(to right, rgba(244, 226, 156, 1) 0%, rgba(130, 96, 87, 1) 100%);

}

#five {

background: linear-gradient(45deg, rgba(194, 233, 221, 0.5) 1%, rgba(104, 119, 132, 0.5) 100%), linear-gradient(-45deg, #494d71 0%, rgba(217, 230, 185, 0.5) 80%);

} 

/*
*/
</style>
  <nav id="menu-left">
    
    <ul>




<li id="link-two">

<div> 2 </div>

<div> Two</div>

</li>

<li id="link-one">

<div> <img style="width:65%;" src="{{ asset('storage/little-pellets-icon.png') }}"> </div> 

<div> Pellets.io </div>

</li>


<li id ="link-three">

<div> 2 </div>

<div> Two </div>

</li>

<li id ="link-four">

<div> 3 </div>

<div> Three </div>

</li>

<li id ="link-five">

<div> 4 </div>

<div> Four </div>

</li>

</ul>
    
    
  </nav>
  
  <script>
  
  
  
  var desktops = document.querySelectorAll('.desktop');


function hide(element) {

element.style.setProperty('left', '-100%', element.style.getPropertyPriority('left'));

}


function hideAll() {

for (var i = 0; i < desktops.length; i++) {

hide(desktops[i]);

}

}


function show(element) {

element.style.setProperty('left', '0', element.style.getPropertyPriority('left'));

}


document.getElementById('link-one').addEventListener('click', function () {

hideAll();

show(document.getElementById('one'));

}, false);


document.getElementById('link-two').addEventListener('click', function () {

hideAll();

show(document.getElementById('two'));

}, false);


document.getElementById('link-three').addEventListener('click', function () {

hideAll();})
  
   </script>
  
  
  <div id="content">
  @yield('content')
  </div>
  <footer class="footer">
    <div class="container">
      <span class="text-muted" id="footer-text">Place sticky footer content here.</span>
    </div>
  </footer>
  @auth
  <div id="messages" v-cloak>
    <div id="messages-button" @click="showHideChat">
      <img src="{{ asset('storage/chat_icon.png') }}" id="chat_icon">
    </div>
    <div id="messages-frame" v-if="visible">
      <div v-if="!conversation_visible">  
        <input type="text" placeholder="Search user..." v-model="user_search" style="width:100%;" maxlength="16">
        <hr>
        <ul>
          <li v-for="chat in chats" v-if="user_search===''" class="chat-container">
            <div class="chat-img">
              <a v-bind:href="'/profile/'+ (_.find(users, ['id', chat[0]])).username"><img src="{{ asset('storage/1.png') }}" class="chat-avatar"></a>
            </div>
            <div class="chat-content" @click="showConversation(chat[0])">
              <div>
                <strong>@{{ (_.find(users, ['id', chat[0]])).username }}</strong>
              </div>
              <div>
                @{{ chat[1] }}
              </div>
            </div>
          </li>
          <span v-if="user_search!==''">Friends</span>
          <li v-for="friend in friends_filtered" v-if="user_search!==''" class="chat-container">
            <div class="chat-img">
               <a v-bind:href="'/profile/'+ (_.find(users, ['id', friend.friend_id])).username"><img src="{{ asset('storage/1.png') }}" class="chat-avatar"></a>
            </div>
            <div class="chat-content" @click="showConversation(friend.friend_id)">
              <div style="margin-top:12px;">
                <strong>@{{ (_.find(users, ['id', friend.friend_id])).username }}</strong>
              </div>
            </div>
          </li>
          <hr>
          <span v-if="user_search!==''">Users</span>
          <li v-for="user in users_filtered" v-if="user_search!==''" class="chat-container">
            <div>
              <div class="chat-img">
                 <a v-bind:href="'/profile/'+ (_.find(users, ['id', user.id])).username"><img src="{{ asset('storage/1.png') }}" class="chat-avatar"></a>
              </div>
              <div class="chat-content">
                <div>
                  <strong>@{{ (_.find(users, ['id', user.id])).username }}</strong>
                </div>
                <div>
                  <button @click="sendFriendRequest(user.id)">Add Friend</button>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div v-if="conversation_visible">
        <button @click="hideConversation">Back</button>
        <hr>
        <ul>
          <li v-for="message in conversation_messages">
            <div v-if="!message[1]" id="speech-bubble-received">
              <div class="text-bubble">@{{ (_.find(messages.messages, ['id', message[0]])).text }}</div>
            </div>
            <div v-if="message[1]" id="speech-bubble-transmitted">
              <div class="text-bubble">@{{ (_.find(messages.messages, ['id', message[0]])).text }}</div>
            </div>
          </li>
        </ul>
        <hr>
        <input type="text" v-on:keyup.enter="sendMessage" placeholder="Send Message..." v-model="message_typed" style="width:100%;" maxlength="1024">
      </div>
    </div>
  </div>
  @endauth
  <!-------------------------------------------------------------------------->

  <!-- APP.JS -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Moment.js v2.22.2 -->
  <script src="{{ asset('js/moment.js') }}"></script>
  <!-- Lodash v4.17.10 -->
  <script src="{{ asset('js/lodash.min.js') }}"></script>
  <!-- Axios v0.18.0 -->
  <script src="{{ asset('js/axios.min.js') }}"></script>
  <!-- Vue.js v2.5.16 Development -->
  <script src="{{ asset('js/vue.js') }}"></script>
  <!-- jQuery v3.3.1 -->
  <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
  <!-- Popper.js v1.14.3 -->
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <!-- Bootstrap JS v4.1.1 -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  
  <!-------------------------------------------------------------------------->
  
  <script>
    var notification_bell = new Vue({
      el: '#notification_bell',
      data: function() {
        return {
          modal_title: '',
          new_notifications: 0, // Si no es cero bolita roja y onclick habrir frame modal hecho con bootstrap!!
          new_friend_requests: 0,
          users: [],
          notifications: [], // Add method
          friend_requests: [] // Add method
        }
      },
      mounted() {
        this.getUsers();
        this.getNewNotifications();
        this.getNewFriendRequests();
        this.getNotifications();
        this.getFriendRequests();
      },
      methods: {
        getUsers: function() {
          let that=this;
          setInterval(function() {
            axios.get('/users').then(response => {
              that.$data.users = response.data;
            });
          },1000);
        },
        setModalTitle: function(title) {
          let that=this;
          that.$data.modal_title=title;
        },
        getNewNotifications: function() {
          let that=this;
          axios.get('/new_notifications').then(response => {
            that.$data.new_notifications = response.data.newNotifications;
          });
          setInterval(function() {
            axios.get('/new_notifications').then(response => {
              that.$data.new_notifications = response.data.newNotifications;
            });
          },1000);
        },
        getNewFriendRequests: function() {
          let that=this;
          axios.get('/new_friend_requests').then(response => {
            that.$data.new_friend_requests = response.data.newFriendRequests;
          });
          setInterval(function() {
            axios.get('/new_friend_requests').then(response => {
              that.$data.new_friend_requests = response.data.newFriendRequests;
            });
          },1000);
        },
        getNotifications: function() {
          let that=this;
          setInterval(function() {
            axios.get('/notifications').then(response => {
              that.$data.notifications = response.data.notifications;
              _.reverse(that.$data.notifications);
            });
          },1000);
        },
        getFriendRequests: function() {
          let that=this;
          setInterval(function() {
            axios.get('/friend_requests').then(response => {
              that.$data.friend_requests = response.data.friendRequests;
            });
          },1000);
        },
        diffForHumans: function(date) {
            let that=this;
        },
        checkNotifications: function() {
          let that=this;
          if (that.$data.new_notifications!==0) {
            axios.put('/check_notifications')
            .then(response => {
              
            })
            .catch(error => {
              console.log(error.message);
            });
          }
        },
        checkFriendRequests: function() {
          let that=this;
          if (that.$data.new_notifications!==0) {
            axios.put('/check_notifications')
            .then(response => {
              
            })
            .catch(error => {
              console.log(error.message);
            });
          }
        },
        acceptFriendRequest: function(id_request) {
          let that=this;
          axios.post('/accept_friend_request', {
            id: id_request
          })
          .then(response => {
            if (response.data.status_code===200) {
                console.log('OK: Accept Friend'); // Change this
              } else if (response.data.status_code===400) {
                console.log('Warning: Accept Friend'); // Change this
              } else {
                console.log('Error: Accept Friend'); // Change this
              }
          })
          .catch(error => {
            console.log(error.message);
          });
        },
        declineFriendRequest: function(id_request) {
          let that=this;
          /*axios.post('/decline_friend_request'), {
            id: id_request
          }
          .then(response => {
            if (response.data.status_code===200) {
                console.log('OK: Accept Friend'); // Change this
              } else if (response.data.status_code===400) {
                console.log('Warning: Accept Friend'); // Change this
              } else {
                console.log('Error: Accept Friend'); // Change this
              }
          })
          .catch(error => {
            console.log(error.message);
          });*/
        }
      }
    });
    var messages = new Vue({
      el: '#messages',
      data: function() {
        return {
          visible: false,
          conversation_visible: false,
          user_search: '',
          message_typed: '',
          send_to_id: 0,
          users: [],
          friends: [],
          messages: []
        }
      },
      mounted() {
        this.getUsers();
        this.getFriends();
        this.getMessages();
      },
      computed: {
        users_filtered: function() {
          return this.findUsers();
        },
        friends_filtered: function() {
          return this.findFriends();
        },
        conversation_messages: function() {
          return this.getConversationMessages();
        },
        chats: function() {
          return this.getChats();
        }
      },
      methods: {
        getUsers: function() {
          let that=this;
          setInterval(function() {
            axios.get('/users').then(response => {
              that.$data.users = response.data;
            });
          },1000);
        },
        getFriends: function() {
          let that=this;
          setInterval(function() {
            axios.get('/friends').then(response => {
              that.$data.friends = response.data;
            });
          },1000);
        },
        getMessages: function() {
          let that=this;
          setInterval(function() {
            axios.get('/messages').then(response => {
              that.$data.messages = response.data;
            });
          },1000);
        },
        showHideChat: function() {
          let that=this;
          if (that.$data.visible===false) {
            that.$data.visible=true;
          } else {
            that.$data.visible=false;
          }
        },
        showConversation: function(user_id) {
          let that=this;
          that.$data.send_to_id=user_id;
          that.$data.conversation_visible=true;
        },
        hideConversation: function() {
          let that=this;
          that.$data.send_to_id=0;
          that.$data.conversation_visible=false;
        },
        findUsers: function() {
          let that=this;
          let array=[];
          _.forEach(that.$data.users, function(value) {
            if (_.includes(value.username,that.$data.user_search)) {
              array.push(value);
            }
          });
          return array;
        },
        findFriends: function() {
          let that=this;
          let array=[];
          _.forEach(that.$data.friends, function(value) {
            if (_.includes((_.find(that.$data.users, ['id', value.friend_id])).username,that.$data.user_search)) {
              array.push(value);
            }
          });
          return array;
        },
        getConversationMessages: function() {
          let that=this;
          let aux=_.filter(that.$data.messages.messages, ['user_id', that.$data.send_to_id]);
          let array=[];
          _.forEach(aux,function(value) {
            if (_.find(that.$data.messages.transmitted, ['id', value.id])===undefined) {
              array.push([value.id,false]);
            } else {
              array.push([value.id,true]);
            }
          });
          return array;
        },
        getChats: function() {
          let that=this;
          let aux=[];
          let blacklist=[];
          _.forEach(_.reverse(that.$data.messages.messages),function(value) {
            if (!(_.includes(blacklist,value.user_id))) {
              if (value.text.length>20) {
                aux.push([value.user_id,value.text.substring(0,20).concat('...')]);
              } else {
                aux.push([value.user_id,value.text]);
              }
              blacklist.push(value.user_id);
            }
          });
          _.reverse(that.$data.messages.messages);
          return aux;
        },
        sendFriendRequest: function(user_id) {
          let that=this;
          if (_.find(that.$data.users, ['id', user_id]).id!==undefined && _.find(that.$data.friends, ['friend_id', user_id])===undefined) {
            axios.post('/friend_requests', {
              user_id: user_id
            })
            .then(response => {
              if (response.data.status_code===200) {
                console.log('OK: Friend Request'); // Change this
              } else if (response.data.status_code===400) {
                console.log('Warning: Friend Request'); // Change this
              } else {
                console.log('Error: Friend Request'); // Change this
              }
            })
            .catch(error => {
              console.log(error.message);
            });
          }
        },
        sendMessage: function() {
          let that=this;
          if (that.$data.message_typed!=='') {
            axios.post('/messages', {
              send_to_id: that.$data.send_to_id,
              text: that.$data.message_typed
            })
            .then(response => {
              if (response.data.status_code===200) {
                that.$data.message_typed='';
                console.log('OK: Message'); // Change this
              } else if (response.data.status_code===400) {
                console.log('Warning: Message'); // Change this
              } else {
                console.log('Error: Message'); // Change this
              }
            })
            .catch(error => {
              console.log(error.message);
            });
          }
        }
      }
    });
  </script>
  @yield('vue')
</body>
</html>
