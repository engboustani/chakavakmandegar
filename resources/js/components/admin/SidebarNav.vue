<template>
    <el-menu
        default-active="2"
        class="el-menu-vertical-demo">
        <el-menu-item index="1" v-on:click="dashboard()">
            <i class="el-icon-menu"></i>
            <span>داشبورد</span>
        </el-menu-item>
        <el-submenu index="2">
            <template slot="title">
                <i class="el-icon-location"></i>
                <span>ایونت‌ها</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="2-1" v-on:click="newEvent()">ایونت جدید</el-menu-item>
                <el-menu-item index="2-2" v-on:click="eventsList()">لیست ایونت‌ها</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="2-3">
                <template slot="title">
                    <i class="el-icon-time"></i>
                    <span>زمان ایونت‌ها</span>
                </template>
                <el-menu-item index="2-3-1" v-on:click="eventtimesList()">لیست زمان‌ها</el-menu-item>
            </el-submenu>
        </el-submenu>
        <el-submenu index="8">
            <template slot="title">
                <i class="el-icon-video-camera-solid"></i>
                <span>ورک‌شاپ</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="8-1" v-on:click="newCourse()">ورک‌شاپ جدید</el-menu-item>
                <el-menu-item index="8-2" v-on:click="coursesList()">لیست ورک‌شاپ‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="3">
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>مطالب</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="3-1" v-on:click="postsList()">پست‌ها</el-menu-item>
                <el-menu-item index="3-2">صفحه‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="4">
            <template slot="title">
                <i class="el-icon-s-management"></i>
                <span>حسابداری</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="4-2" v-on:click="ticketsList()">تیکت‌ها</el-menu-item>
                <el-menu-item index="4-3" v-on:click="paymentsList()">پرداختی‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <!-- <el-submenu index="5">
            <template slot="title">
                <i class="el-icon-message"></i>
                <span>پیامک‌ها</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="5-1">پیامک جدید</el-menu-item>
                <el-menu-item index="5-2">پیامک گروهی</el-menu-item>
                <el-menu-item index="5-3">پیامک‌های ارسال شده</el-menu-item>
            </el-menu-item-group>
        </el-submenu> -->
        <el-menu-item v-on:click="usersList()" index="6">
            <i class="el-icon-user-solid"></i>
            <span>کاربران</span>
        </el-menu-item>
        <el-submenu index="7">
            <template slot="title">
                <i class="el-icon-s-operation"></i>
                <span>تنظیمات</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="7-1">عمومی</el-menu-item>
                <el-menu-item v-on:click="settingSalon()" index="7-2">سالن</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
    </el-menu>
</template>

<script>
export default {
    methods: {
        dashboard() {window.location.href = '/admin';},
        eventsList() {window.location.href = '/admin/events';},
        eventtimesList() {window.location.href = '/admin/eventtimes';},
        usersList() {window.location.href = '/admin/users';},
        newEvent() {window.location.href = '/admin/event/new';},
        postsList() {window.location.href = '/admin/posts';},
        paymentsList() {window.location.href = '/admin/payments';},
        ticketsList() {window.location.href = '/admin/tickets';},
        coursesList() {window.location.href = '/admin/courses';},
        newCourse() {window.location.href = '/admin/course/new';},
        settingSalon() {window.location.href = '/admin/setting/salon';}
    },
    mounted: function() {
        if(!this.$store.getters.isAuthenticated)
        {
            window.location.href = '/userlogin';
        }
    }
}
</script>

<style>

</style>