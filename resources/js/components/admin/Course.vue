<template>
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" v-model="title" placeholder="عنوان ورک‌شاپ">
            </div>
            
            <div class="form-group">
                <label for="content">متن</label>
                <editor api-key="c8awb39krnfag8kp0ctjl22i754gglo3lewlvjbh92nd0e5z" id="content" v-model="description" :init="{
                    selector: 'textarea',  // change this value according to your HTML
                    directionality : 'rtl',
                    language : 'fa_IR',
                    language_url : '/js/fa_IR.js'}"></editor>
            </div>

            <div class="form-group" v-if="id != 0">
                <label for="pictures">ثبت‌نامی‌ها</label>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 form-inline">
                                <div class="form-group">
                                    <label for="filter" class="sr-only">فیلتر</label>
                                    <input type="text" class="form-control" v-model="filter" placeholder="فیلتر">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="table" class="col-xs-12 table-responsive">
                                <datatable :columns="columns" :data="getData" :filter-by="filter"></datatable>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-inline">
                                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                            </div>
                        </div>

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
                        <el-button type="primary" v-on:click="sendCourse()">ذخیره</el-button>
                        <el-button type="success" v-on:click="sendCourse()" v-if="!id">ذخیره و انتشار</el-button>
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
                <label for="pictures">تنظیمات</label>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label for="limitTime">آخرین مهلت ثبت‌نام</label>
                            <date-picker type="datetime" id="limitTime" input-format="YYYY/MM/DD HH:mm" format="jYYYY/jMM/jDD HH:mm" :min="moment().locale('fa').format('YYYY/MM/DD HH:mm')" v-model="limitTimeModel" />
                        </div>
                        <div class="row">
                            <label for="limitTime">تعداد ثبت‌نامی‌ها</label>
                            <input class="form-control" type="number" name="limitCount" id="limitCount" v-model="limitCount">
                        </div>
                        <div class="row">
                            <label for="teacher">مدرس</label>
                            <input class="form-control" type="text" name="teacher" id="teacher" v-model="teacher">
                        </div>
                        <div class="row">
                            <label for="price">هزینه ثبت‌نام</label>
                            <input class="form-control" type="text" name="price" id="price" v-model="price">
                            <small>صفر به منزله رایگان است</small>
                        </div>
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
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

export default {
    components: {
        eventtimeWidget,
        Editor,
        datePicker: VuePersianDatetimePicker
    },
    computed: {
        token : function(){ return this.$store.state.token },
        limitTimeModel: {
            set: function(val) {
                this.limitTime = moment.from(val, 'fa', 'YYYY/MM/DD HH:mm');
            },
            get: function() {
                return this.limitTime.locale('en').format('YYYY/MM/DD HH:mm');
            }
        },

    },
    props: {
        id: {
            type: Number,
            default: 0,
            required: false
        },
    },
    data: function() {
        return {
            title: '',
            description: '',
            teacher: '',
            price: 0,
            indexed: true,
            limitCount: 0,
            limitTime: moment(),
            created_at: '',
            updated_at: '',
            imageUrl: '',
            columns: [
                {label: 'شناسه', field: 'id', align: 'right', sortable: true, filterable: false},
                {label: 'ایمیل', field: 'email', headerClass: 'class-in-header second-class', align: 'right'},
                {label: 'نام', field: 'firstname', align: 'right'},
                {label: 'نام خانوادگی', field: 'lastname', align: 'right'},
                {label: 'شماره همراه', representedAs: this.farsiPhone, align: 'right'},
                {label: 'اعتبار', representedAs: this.credit, align: 'right'},
            ],
            rows: window.rows,
            page: 1,
            per_page: 10,
            filter: '',
            usersList: [],
            posterId: 0
        }
    },
    mounted: function() {
        if (this.id != 0) {
            axios({url: `/api/course/${this.id}`, method: 'GET' })
            .then(resp => {
                this.title = resp.data.title;
                this.description = resp.data.description;
                this.teacher = resp.data.teacher;
                this.price = resp.data.price;
                this.indexed = resp.data.indexed;
                this.usersList = resp.data.users;
                this.limitCount = resp.data.limit_count;
                this.limitTime = moment(resp.data.limit_time);
                this.created_at = this.constructor(moment(resp.data.created_at).locale('fa').format('YYYY/M/D H:m'));
                this.updated_at = this.constructor(moment(resp.data.updated_at).locale('fa').format('YYYY/M/D H:m'));
                this.imageUrl = `/media/${resp.data.poster_model.address}`;
                this.posterId = resp.data.poster_model.id;
            })
            .catch(err => {
                console.log('Error: can\'t get course information!', err)
            })
        }
    },
    methods: {
        getData: function(params, setRowData){
            var start_index = (params.page_number - 1) * params.page_length;
            var end_index = start_index + params.page_length;

            setRowData(
                this.usersList.slice(start_index, end_index),
                this.usersList.length
            );
        },        
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        handleAvatarSuccess(res, file) {
            this.imageUrl = `/media/${res.address}`;
            this.posterId = res.id;
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
        sendCourse() {
            if (!this.id) {
                const {title, description, teacher, price, posterId, indexed, limitCount, limitTimeModel} = this;
                axios({url: '/api/course/new', data: {title, description, teacher, price, poster: posterId, indexed, limit_count: limitCount, limit_time: limitTimeModel}, method: 'POST' })
                .then(resp => {
                    window.location.href = `/admin/course/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t make a new course!', err)
                })                
            }
            else
            {
                const {id, title, description, teacher, price, posterId, indexed, limitCount, limitTimeModel} = this
                axios({url: '/api/course/update', data: {id, title, description, teacher, price, poster: posterId, indexed, limit_count: limitCount, limit_time: limitTimeModel}, method: 'PUT' })
                .then(resp => {
                    window.location.href = `/admin/course/${resp.data.id}`;
                })
                .catch(err => {
                    console.log('Error: can\'t update the course!', err)
                })                
            }
        },
        constructor: shared.constructor,
        moment: moment,
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