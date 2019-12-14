<template>
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" v-model="title" placeholder="عنوان صفحه">
            </div>
            
            <div class="form-group">
                <label for="content">متن</label>
                <div class="card">
                    <div class="card-body">
                        <editor autofocus
                            holder-id="codex-editor"
                            save-button-id="save-button"
                            :init-data="initData"></editor>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pictures">وضعیت</label>
                <div class="card">
                    <div class="card-body">
                        <p><el-checkbox v-model="visiable">فعال</el-checkbox></p>
                        <p>نام پیوند <input type="text" class="form-control" id="name" placeholder="Name" v-model="name"></p>
                        <p>
                        منتشر نشده.
                        ساخته شده در {{created_at}}
                        آپدیت شده در {{updated_at}}
                        </p>
                        <el-button type="primary" v-on:click="sendPage()">ذخیره</el-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const moment = require('jalali-moment');
import shared from '../../shared';
import { Editor } from 'vue-editor-js';

export default {
    components: {
        Editor
    },
    computed: {
        token : function(){ return this.$store.state.token }
    },
    props: {
        id: Number,
    },
    data: function() {
        return {
            name: '',
            nameFa: '',
            title: '',
            content: '',
            visiable: true,
            created_at: '',
            updated_at: '',
            dialogImageUrl: '',
            dialogVisible: false,
            imageUrl: '',
            initData: () => {}
        }
    },
    mounted: function() {
        if (this.id != 0) {
            axios({url: `/api/page/${this.id}`, method: 'GET' })
            .then(resp => {
                this.name = resp.data.name;
                this.nameFa = resp.data.name_fa;
                this.title = resp.data.title;
                this.content = resp.data.content;
                this.visiable = resp.data.visiable;
                this.created_at = this.constructor(moment(resp.data.created_at).locale('fa').format('YYYY/M/D H:m'));
                this.updated_at = this.constructor(moment(resp.data.updated_at).locale('fa').format('YYYY/M/D H:m'));
            })
            .catch(err => {
                console.log('Error: can\'t make a new event!', err)
            })
        }
    },
    methods: {
        sendPage() {
            if (!this.id) {
                const {name, nameFa, visiable} = this;
                axios({url: '/api/page/new', data: {name, name_fa: nameFa, content: this.initData(), visiable}, method: 'POST' })
                .then(resp => {
                    window.location.href = `/admin/page/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t make a new event!', err)
                })                
            }
            else
            {
                const {id, title, content, summery, visiable} = this
                axios({url: '/api/page/update', data: {id, title, content, summery, visiable}, method: 'PUT' })
                .then(resp => {
                    window.location.href = `/admin/page/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t update the event!', err)
                })                
            }
        },
        constructor: shared.constructor,
        farsiDatetime: function(date) {
            return this.constructor(date);
        }

    }    
}
</script>

<style>
.tox-tinymce {
    border-radius: 0.25rem;
}

  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
</style>