<template>
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="email" class="form-control" id="title" v-model="title" placeholder="عنوان ایونت">
            </div>
            
            <div class="form-group">
                <label for="content">متن</label>
                <editor api-key="c8awb39krnfag8kp0ctjl22i754gglo3lewlvjbh92nd0e5z" id="content" v-model="content" :init="{
                    selector: 'textarea',  // change this value according to your HTML
                    directionality : 'rtl',
                    language : 'fa_IR',
                    language_url : '/js/fa_IR.js'}"></editor>
            </div>

            <div class="form-group">
                <label for="summery">خلاصه</label>
                <textarea class="form-control" id="summery" v-model="summery" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="pictures">عکس‌ها</label>
                <div class="card">
                    <div class="card-body">
                        <el-upload
                            action="/api/event/image-upload"
                            list-type="picture-card"
                            :on-preview="handlePictureCardPreview"
                            :on-remove="handleRemove">
                            <i class="el-icon-plus"></i>
                        </el-upload>
                        <el-dialog :visible.sync="dialogVisible">
                            <img width="100%" :src="dialogImageUrl" alt="">
                        </el-dialog>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pictures">وضعیت</label>
                <div class="card">
                    <div class="card-body">
                        <p>
                        منتشر نشده.
                        ساخته شده در {{created_at}}
                        آپدیت شده در {{updated_at}}
                        </p>
                        <el-button type="primary" v-on:click="sendEvent()">ذخیره</el-button>
                        <el-button type="success" v-on:click="sendEvent()" v-if="!id">ذخیره و انتشار</el-button>
                        <el-button type="success" v-if="id">انتشار</el-button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pictures">پوستر</label>
                <div class="card">
                    <div class="card-body">
                        <el-upload
                            class="avatar-uploader"
                            action="/api/event/image-upload"
                            :headers="{Authorization: token}"
                            :show-file-list="false"
                            :on-success="handleAvatarSuccess"
                            :before-upload="beforeAvatarUpload">
                            <img v-if="imageUrl" :src="imageUrl" class="avatar">
                            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                        </el-upload>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="eventtimes">زمان‌ها</label>
                <div class="card">
                    <div class="card-body" v-if="!id">
                        <small class="text-muted">برای ثبت زمان برای ایونت اول باید ذخیره سازی کنید</small>
                    </div>
                    <div class="card-body" v-else>
                        <eventtime v-for="eventtime in eventtimes" v-bind:key="eventtime.id" :eventtime="eventtime"></eventtime>
                        <eventtime></eventtime>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const moment = require('jalali-moment');
import shared from '../../shared';
import eventtime from './EventtimeWidget';

export default {
    components: {
        eventtime
    },
    computed: {
        token : function(){ return this.$store.state.token }
    },
    props: {
        id: Number,
    },
    data: function() {
        return {
            title: '',
            content: '',
            summery: '',
            created_at: '',
            updated_at: '',
            dialogImageUrl: '',
            dialogVisible: false,
            eventtimes: [],
            imageUrl: ''
        }
    },
    mounted: function() {
        if (this.id != 0) {
            axios({url: `/api/event/${this.id}`, method: 'GET' })
            .then(resp => {
                this.title = resp.data.title;
                this.content = resp.data.content;
                this.summery = resp.data.summery;
                this.eventtimes = resp.data.eventtime;
                this.created_at = this.constructor(moment(resp.data.created_at).locale('fa').format('YYYY/M/D H:m'));
                this.updated_at = this.constructor(moment(resp.data.updated_at).locale('fa').format('YYYY/M/D H:m'));
            })
            .catch(err => {
                console.log('Error: can\'t make a new event!', err)
            })
        }
    },
    methods: {
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        handleAvatarSuccess(res, file) {
            this.imageUrl = `/images/${res.image}`;
        },
        beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
                this.$message.error('فایل عکس باید JPG باشد!');
            }
            if (!isLt2M) {
                this.$message.error('اندازه عکس بیشتر از 2MB نمیتواند باشد!');
            }
            return isJPG && isLt2M;
        },
        sendEvent() {
            if (!this.id) {
                const {title, content, summery} = this;
                axios({url: '/api/event/new', data: {title, content, summery}, method: 'POST' })
                .then(resp => {
                    window.location.href = `/admin/event/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t make a new event!', err)
                })                
            }
            else
            {
                const {id, title, content, summery} = this
                axios({url: '/api/event/update', data: {id, title, content, summery}, method: 'PUT' })
                .then(resp => {
                    window.location.href = `/admin/event/${resp.data.id}`;
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