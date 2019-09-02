<template>
    <el-menu
        default-active="2"
        class="el-menu-vertical-demo">
        <el-menu-item index="1">
            <i class="el-icon-menu"></i>
            <span>داشبورد</span>
        </el-menu-item>
        <el-submenu index="2">
            <template slot="title">
                <i class="el-icon-location"></i>
                <span>ایونت‌ها</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="2-1">ایونت جدید</el-menu-item>
                <el-menu-item index="2-2" v-on:click="eventsList()">لیست ایونت‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="3">
            <template slot="title">
                <i class="el-icon-time"></i>
                <span>زمان ایونت‌ها</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="3-1">زمان جدید</el-menu-item>
                <el-menu-item index="3-2">لیست زمان‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="4">
            <template slot="title">
                <i class="el-icon-s-management"></i>
                <span>حسابداری</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="4-1">فاکتورها</el-menu-item>
                <el-menu-item index="4-2">تیکت‌ها</el-menu-item>
                <el-menu-item index="4-3">پرداختی‌ها</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="5">
            <template slot="title">
                <i class="el-icon-message"></i>
                <span>پیامک‌ها</span>
            </template>
            <el-menu-item-group>
                <el-menu-item index="5-1">پیامک جدید</el-menu-item>
                <el-menu-item index="5-2">پیامک گروهی</el-menu-item>
                <el-menu-item index="5-3">پیامک‌های ارسال شده</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
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
                <el-menu-item index="7-2">سالن</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
    </el-menu>
</template>

<script>
export default {
    methods: {
        eventsList() {window.location.href = '/admin/events';},
        usersList() {window.location.href = '/admin/users';},
    }
}
</script>

<style>

</style>