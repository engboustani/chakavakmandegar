<template>
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="mb-3"><i class="el-icon-s-ticket mr-2"></i>تیکت صندلی شماره {{ticket.id}}</h5>
                    <form>
                        <div class="form-row">
                            <div class="col-md-4">
                            <label for="firstname">نام</label>
                            <input type="text" class="form-control" id="firstname" placeholder="First name" required>
                            </div>
                            <div class="col-md-4">
                            <label for="lastname">نام خانوادگی</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Last name" required>
                            </div>
                            <div class="col-md-4">
                            <label for="identification">شماره ملی</label>
                            <input type="text" class="form-control" id="identification" placeholder="xxxxxxxxxx" required>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="card-footer text-muted">
                {{constructor(5000)}} تومان
            </div>
        </div>
    </div>  
</template>

<script>
import shared from '../shared';

export default {
    props: {
        ticket: SVGRectElement
    },
    methods: {
        constructor: shared.constructor
    }
}
</script>

<style>

</style>