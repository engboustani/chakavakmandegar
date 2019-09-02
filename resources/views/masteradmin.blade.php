<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گیشه چکاوک ماندگار - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
</head>
<body dir="rtl">
        <div class="be-wrapper" id="app">
                <!-- As a link -->
                <nav class="navbar navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="#">مدیریت گیشه</a>
                </nav>
                <div class="be-left-sidebar">
                    <el-menu
                        default-active="2"
                        class="el-menu-vertical-demo"
                        @open="handleOpen"
                        @close="handleClose">
                        <el-menu-item index="1">
                            <i class="el-icon-menu"></i>
                            <span>داشبورد</span>
                        </el-menu-item>
                        <el-menu-item index="2">
                            <i class="el-icon-document"></i>
                            <span>ایونت‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="3">
                            <i class="el-icon-user-solid"></i>
                            <span>کاربران</span>
                        </el-menu-item>
                        <el-menu-item index="4">
                            <i class="el-icon-s-ticket"></i>
                            <span>تیکت‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="5">
                            <i class="el-icon-s-management"></i>
                            <span>فاکتور‌ها</span>
                        </el-menu-item>
                        <el-menu-item index="6">
                            <i class="el-icon-setting"></i>
                            <span>تنظیمات</span>
                        </el-menu-item>
                      </el-menu>
                </div>
                <div class="be-content">
                  @yield('content')
                </div>
                <nav class="be-right-sidebar">
                  <div class="sb-content">
                    <div class="tab-navigation">
                      <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
                        <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                        <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
                      </ul>
                    </div>
                    <div class="tab-panel">
                      <div class="tab-content">
                        <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                          <div class="chat-contacts">
                            <div class="chat-sections">
                              <div class="be-scroller">
                                <div class="content">
                                  <h2>Recent</h2>
                                  <div class="contact-list contact-list-recent">
                                    <div class="user"><a href="#"><img src="assets/img/avatar1.png" alt="Avatar">
                                        <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div></a></div>
                                    <div class="user"><a href="#"><img src="assets/img/avatar2.png" alt="Avatar">
                                        <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div></a></div>
                                    <div class="user"><a href="#"><img src="assets/img/avatar3.png" alt="Avatar">
                                        <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div></a></div>
                                  </div>
                                  <h2>Contacts</h2>
                                  <div class="contact-list">
                                    <div class="user"><a href="#"><img src="assets/img/avatar4.png" alt="Avatar">
                                        <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div></a></div>
                                    <div class="user"><a href="#"><img src="assets/img/avatar5.png" alt="Avatar">
                                        <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div></a></div>
                                    <div class="user"><a href="#"><img src="assets/img/avatar6.png" alt="Avatar">
                                        <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div></a></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="bottom-input">
                              <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                            </div>
                          </div>
                          <div class="chat-window">
                            <div class="title">
                              <div class="user"><img src="assets/img/avatar2.png" alt="Avatar">
                                <h2>Maggie jackson</h2><span>Active 1h ago</span>
                              </div><span class="icon return mdi mdi-chevron-left"></span>
                            </div>
                            <div class="chat-messages">
                              <div class="be-scroller">
                                <div class="content">
                                  <ul>
                                    <li class="friend">
                                      <div class="msg">Hello</div>
                                    </li>
                                    <li class="self">
                                      <div class="msg">Hi, how are you?</div>
                                    </li>
                                    <li class="friend">
                                      <div class="msg">Good, I'll need support with my pc</div>
                                    </li>
                                    <li class="self">
                                      <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                    </li>
                                    <li class="friend">
                                      <div class="msg">I don't know it just turns off suddenly</div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="chat-input">
                              <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                          <div class="todo-container">
                            <div class="todo-wrapper">
                              <div class="be-scroller">
                                <div class="todo-content"><span class="category-title">Today</span>
                                  <ul class="todo-list">
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo1" type="checkbox" checked="">
                                        <label for="todo1">Initialize the project</label>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo2" type="checkbox">
                                        <label for="todo2">Create the main structure</label>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo3" type="checkbox">
                                        <label for="todo3">Updates changes to GitHub</label>
                                      </div>
                                    </li>
                                  </ul><span class="category-title">Tomorrow</span>
                                  <ul class="todo-list">
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo4" type="checkbox">
                                        <label for="todo4">Initialize the project</label>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo5" type="checkbox">
                                        <label for="todo5">Create the main structure</label>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo6" type="checkbox">
                                        <label for="todo6">Updates changes to GitHub</label>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                        <input id="todo7" type="checkbox">
                                        <label for="todo7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!</label>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="bottom-input">
                              <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                            </div>
                          </div>
                        </div>
                        <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                          <div class="settings-wrapper">
                            <div class="be-scroller"><span class="category-title">General</span>
                              <ul class="settings-list">
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" name="st1" id="st1"><span>
                                      <label for="st1"></label></span>
                                  </div><span class="name">Available</span>
                                </li>
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" name="st2" id="st2"><span>
                                      <label for="st2"></label></span>
                                  </div><span class="name">Enable notifications</span>
                                </li>
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" name="st3" id="st3"><span>
                                      <label for="st3"></label></span>
                                  </div><span class="name">Login with Facebook</span>
                                </li>
                              </ul><span class="category-title">Notifications</span>
                              <ul class="settings-list">
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" name="st4" id="st4"><span>
                                      <label for="st4"></label></span>
                                  </div><span class="name">Email notifications</span>
                                </li>
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" name="st5" id="st5"><span>
                                      <label for="st5"></label></span>
                                  </div><span class="name">Project updates</span>
                                </li>
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" name="st6" id="st6"><span>
                                      <label for="st6"></label></span>
                                  </div><span class="name">New comments</span>
                                </li>
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" name="st7" id="st7"><span>
                                      <label for="st7"></label></span>
                                  </div><span class="name">Chat messages</span>
                                </li>
                              </ul><span class="category-title">Workflow</span>
                              <ul class="settings-list">
                                <li>
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" name="st8" id="st8"><span>
                                      <label for="st8"></label></span>
                                  </div><span class="name">Deploy on commit</span>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>    
    <script src="/js/app.js" lang="text/javascript"></script>
  </body>
  <!--- [It's Hossein the hacker bitches] --->
</html>