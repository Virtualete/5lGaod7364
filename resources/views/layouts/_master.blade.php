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
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @guest
    <link href="{{ asset('css/no_registered/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/no_registered/footer.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/registered/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registered/footer.css') }}" rel="stylesheet">
    @endguest
    
    <!-- FONTS -->
    <style>@import url('https://fonts.googleapis.com/css?family=Orbitron');</style>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>
  <body>
    <div style="margin-left:50px;" id="app_master" v-cloak>
      <!-- NAVBAR -->
      @guest
      <div id="overlay"></div>
      <nav class="navbar fixed-top  navbar-light navbar-expand-md bg-dark justify-content-center">
        <button type="button" class="btn btn-outline-primary">Juegos</button>
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link
                <span class="sr-only">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#">
                <img src="img/logo-bungie.png" alt="">
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>
          <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
            <a href="{{ route('register') }}"><p id="sing">{{ __('Register') }}</p></a>
            <a href="{{ route('login') }}"><p id="login">{{ __('Login') }}</p></a>
          </ul>
        </div>
        </nav>
        <div class="menu-left">
          <img src="img/logowow.png" alt="">
        </div>
      <!-- <a href="{{ route('register') }}">{{ __('Register') }}</a> <a href="{{ route('login') }}">{{ __('Login') }}</a><hr> -->
      @else
      <div id="overlay"></div>
        <nav class="navbar fixed-top navbar-light navbar-expand-md bg-dark justify-content-center">
          <button type="button" class="btn btn-outline-primary">Juegos</button>
          <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                  <span class="navbar-toggler-icon"></span>
          </button>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
              <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link
                    <span class="sr-only">Home</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="navbar-brand" href="">
                    <img src="img/logo-bungie.png" alt="">
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                <img src="img/Bell.png" alt="" id="bell">
                <div id="notif-bell">
                  <p>+99</p>
                </div>
                <img src="img/avatar.png" alt="" id="avatar">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </ul>
            </div>
        </nav>
        <div class="menu-left">
                <img src="img/logowow.png" alt="">
        </div>
      <!-- Logged as: {{ Auth::user()->username }} <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a><hr>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form> -->
      @endguest 
      <!-- END NAVBAR -->
      <!-- Content -->
      
      <!-- END Content -->
      <!-- Missatges -->
      @guest
      <div class="footer-copyright py-3 text-center">
        <div class="text-footer">
          © 2018 Copyright:
          <a href="https://mdbootstrap.com/material-design-for-bootstrap/">
          <strong> MDBootstrap.com</strong></a>
        </div>
      </div>
      @else
      
      
      
      <!------------------------------------------------------------->
      <div style="width:100%; height:100%;">
        <div id="alcontainer" >
          <a id="al" onclick="codeTag(this)" href=#>
            <span style="transform: rotate(-45deg);"></span>
            <span style="background-color:rgba(0,0,0,0)!important;"></span>
            <span style="transform: rotate(45deg);"></span>
          </a>
          <div id="navSocialContainer">
            <nav id="navSocial">
              <div style="width:100%; height:100%; z-index:2;">
                <!-- TODO SOCIAL AQUÍ -->
                <div v-if="!conversation_opened">
                  <input type="text" placeholder="Search friend..." maxlength="16" v-model="friend_search">
                </div>
                <div v-if="friend_search===''">
                  <h4>CHATS</h4>
                  <ul>
                    <li v-for="chat in chats">
                      <!-- AVATAR -->
                      @{{ (_.find(users, ['id', chat[0]])).username }} <button class="btn btn-primary" @click="openChat(chat[0])">Send Message</button> <br>
                      @{{ chat[1] }} <!-- CHECKPOINT -->
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <div style="overflow-y: scroll; height:80vh;" onresize="resizeContenedor(this)">
          <!-- TODO CONTENIDO AQUÍ -->
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <!------------------------------------------------------------->
      @endguest
    </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- Lodash -->
  <script src="{{ asset('js/lodash.min.js') }}"></script>

  <!-- Axios -->
  <script src="{{ asset('js/axios.min.js') }}"></script>

  <!-- Vue.js Development -->
  <script src="{{ asset('js/vue.js') }}"></script>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  
  <script>
    var app_master = new Vue({
      el: '#app_master',
      data: function() {
        return {
          chat_visible: false,
          conversation_opened: false,
          search_users_visible: false,
          user_search: '',
          friend_search: '',
          message_typed: '',
          send_to_id: 0,
          users: [],
          friends: [],
          messages: []
        }
      },
      mounted() {
        setInterval(this.getUsers(),2000);
        setInterval(this.getFriends(),2000);
        setInterval(this.getMessages(),2000);
      },
      computed: {
        users_filtered: function() {
          return this.findUsers();
        },
        friends_filtered: function() {
          return this.findFriends();
        },
        messages_opened: function() {
          return this.getMessagesOpened();
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
        getMessagesOpened: function() {
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
        showHideChat: function() {
          let that=this;
          if (that.$data.chat_visible===false) {
            that.$data.chat_visible=true;
          } else {
            that.$data.chat_visible=false;
          }
        },
        open_close_search_users: function() {
          let that=this;
          if (!that.$data.search_users_visible) {
            that.$data.search_users_visible=true;
          } else {
            that.$data.search_users_visible=false;
          }
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
            if (_.includes((_.find(that.$data.users, ['id', value.friend_id])).username,that.$data.friend_search)) {
              array.push(value);
            }
          });
          return array;
        },
        openChat: function(user_id) {
          let that=this;
          that.$data.send_to_id=user_id;
          that.$data.conversation_opened=true;
        },
        closeChat: function() {
          let that=this;
          that.$data.send_to_id=0;
          that.$data.conversation_opened=false;
        },
        addFriend: function(friend_id) {
          console.log(friend_id); // FALTA COMPLETAR
        },
        sendMessage: function() {
          let that=this;
          if (that.$data.message_typed!=='') {
            axios.post('/messages', {
              send_to_id: that.$data.send_to_id,
              text: that.$data.message_typed
            })
            .then(response => {
              console.log(response);
            })
            .catch(error => {
              console.log(error.message);
            });
          }
        },
        getChats: function() {
          let that=this;
          let aux=[];
          let blacklist=[];
          _.forEach(_.reverse(that.$data.messages.messages),function(value) {
            if (!(_.includes(blacklist,value.user_id))) {
              if (value.text.length>27) {
                aux.push([value.user_id,value.text.substring(0,27).concat('...')]);
              } else {
                aux.push([value.user_id,value.text]);
              }
              blacklist.push(value.user_id);
            }
          });
          _.reverse(that.$data.messages.messages);
          return aux;
        }
      }
    })
  </script>
  @yield('vue')
  </body>
</html>
