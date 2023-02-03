<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <slot name="page_header"></slot>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <slot name="card_body"></slot>
                            <slot name="card_footer"></slot>
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
import SuccessModal from "../modals/SuccessModal";
import ErrorModal from "../modals/ErrorModal";

export default {
    name: "DefaultFormLayout",
    components: {
        SuccessModal,
        ErrorModal
    }
}
</script>
