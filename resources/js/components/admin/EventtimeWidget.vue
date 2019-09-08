<template>
    <div class="card card-item mb-2" v-if="eventtime">
        <div class="card-body">
            {{eventtime.id}}
        </div>
    </div>
    <div class="card card-plus bg-light mb-2" v-else>
        <div class="card-body">
            <i class="el-icon-plus mr-2"></i>افزودن
        </div>
    </div>
</template>

<script>
export default {
    props: {
        eventtime: Object
    }

}
</script>

<style>
.card-item:hover {
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.27);
}

.card-plus {
    border: dashed 1px #0000004d;
    color: #8a8a8a;
}

.card-plus:hover {
    border: dashed 1px #0012ff4d;
}
</style>