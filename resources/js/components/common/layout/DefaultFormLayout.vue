<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <slot name="page_header"></slot>
                <slot name="search_area"></slot>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <!-- loader -->
                            <vue-loading
                                v-show="is_loading"
                                type="spiningDubbles"
                                color="#76ABAE"
                            ></vue-loading>

                            <!-- main content -->
                            <form class="form-horizontal" autocomplete="off" v-show="!is_loading">
                                <slot name="card_body"></slot>
                                <slot name="card_footer"></slot>
                            </form>
                        </div><!-- /.card -->

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
        </section><!-- /.content -->

        <div>
            <success-modal :click-to-close="false"></success-modal>
            <error-modal :click-to-close="false"></error-modal>
            <slot name="modal"></slot>
        </div>

    </div><!-- /.content-wrapper -->
</template>

<script>
import {layout} from "../../../mixins/layout";

export default {
    name: "DefaultFormLayout",
    mixins: [layout],
}
</script>
