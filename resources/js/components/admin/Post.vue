<template>
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" v-model="title" placeholder="عنوان پست">
            </div>
            
            <div class="form-group">
                <label for="content">متن</label>
                <editor api-key="c8awb39krnfag8kp0ctjl22i754gglo3lewlvjbh92nd0e5z" id="content" v-model="content" :init="{
                    selector: 'textarea',  // change this value according to your HTML
                    paste_data_images: true,
                    file_picker_types: 'image',
                    images_upload_handler: image_upload,
                    file_picker_callback: function(callback, value, meta) {
                        // Provide image and alt text for the image dialog
                        if (meta.filetype == 'image') {
                            callback('myimage.jpg', {alt: 'My alt text'});
                        }
                    },
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern'
                    ],
                    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    toolbar2: 'print preview media | forecolor backcolor emoticons',
                    image_advtab: true,
                    directionality : 'rtl',
                    language : 'fa_IR',
                    language_url : '/js/fa_IR.js'}"></editor>
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
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pictures">تصویر بندانگشتی</label>
                <div class="card">
                    <div class="card-body">
                        <el-upload
                            class="avatar-uploader"
                            action="/api/media/image-upload"
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
                <label for="pictures">دسته بندی</label>
                <div class="card">
                    <div class="card-body">
                        <el-tree
                            :data="data"
                            ref="cats"
                            show-checkbox
                            node-key="id"
                            :props="defaultProps">
                        </el-tree>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const moment = require('jalali-moment');
import shared from '../../shared';
import eventtimeWidget from './EventtimeWidget';
import Editor from '@tinymce/tinymce-vue';

export default {
    components: {
        eventtimeWidget,
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
            thumbnailId: 0,
            data: [{
                id: 1,
                label: 'استودیو',
                }, {
                id: 2,
                label: 'پلاتو',
                }, {
                id: 3,
                label: 'متفرقه',
            }],
            defaultProps: {
                children: 'children',
                label: 'label'
            }
        }
    },
    mounted: function() {
        if (this.id != 0) {
            axios({url: `/api/post/${this.id}`, method: 'GET' })
            .then(resp => {
                this.name = resp.data.name;
                this.nameFa = resp.data.name_fa;
                this.title = resp.data.title;
                this.content = resp.data.content;
                this.visiable = resp.data.visiable;
                if (resp.data.thumbnail_model != null) {
                    this.imageUrl = `/media/${resp.data.thumbnail_model.address}`;
                    this.thumbnailId = resp.data.thumbnail_model.id;                    
                }
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
            this.imageUrl = `/media/${res.address}`;
            this.thumbnailId = res.id;
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
                const {title, content, summery, visiable, thumbnailId} = this;
                const cats = this.$refs.cats.getCheckedKeys();
                axios({url: '/api/post/new', data: {title, content, summery, visiable, thumbnail_id: thumbnailId, cats}, method: 'POST' })
                .then(resp => {
                    window.location.href = `/admin/post/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t make a new event!', err)
                })                
            }
            else
            {
                const {id, title, content, summery, visiable, thumbnailId} = this
                const cats = this.$refs.cats.getCheckedKeys();
                axios({url: '/api/post/update', data: {id, title, content, summery, visiable, thumbnail_id: thumbnailId, cats}, method: 'PUT' })
                .then(resp => {
                    window.location.href = `/admin/post/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t update the event!', err)
                })                
            }
        },
        constructor: shared.constructor,
        farsiDatetime: function(date) {
            return this.constructor(date);
        },
        image_upload: function (blobInfo, success, failure) {
            var formData;
            formData = new FormData();
            formData.append('file', blobInfo.blob());
            axios.post('/api/media/image-upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': this.token
                }
            }).then(resp => {
                console.log('done');
                success(`${window.location.origin}/media/${resp.data.address}`);
            })
            .catch(err => {
                failure("HTTP Error: " + err);
                console.log('Error: can\'t upload image!', err);
            })
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