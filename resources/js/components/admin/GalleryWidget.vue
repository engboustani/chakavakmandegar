<template>
    <div class="card bg-light mt-3" style="max-width: 18rem;">
        <div class="card-body">
            <el-upload
                :headers="{Authorization: token}"
                action="/api/media/image-upload"
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
</template>

<script>
export default {
    computed: {
        token : function(){ return this.$store.state.token }
    },
    data: function() {
        return {
            dialogImageUrl: '',
            dialogVisible: false,
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
    },
}
</script>

<style>

</style>