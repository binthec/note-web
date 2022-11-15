<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <slot name="page_header"></slot>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body p-0">
                                <slot name="card_body"></slot>
                            </div><!-- /.card-body -->

                            <div class="card-footer clearfix">
                                <slot name="card_footer"></slot>
                            </div><!-- /.card-footer -->

                        </div><!-- /.card -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

        </section><!-- /.content -->

        <slot name="modal"></slot>
    </div><!-- /.content-wrapper -->
</template>

<script>
export default {
    name: "DefaultLayout"
}
</script>
